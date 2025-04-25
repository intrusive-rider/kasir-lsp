<?php

namespace App\Livewire;

use App\Models\Customer\Order;
use App\Models\Customer\Payment;
use App\Models\Inventory\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Cart extends Component
{
    #[Validate('required', message: 'Product is required.')]
    #[Validate('exists:products,id', message: 'Product is not found.')]
    public $item_id = '';

    #[Validate('required', message: 'Quantity is required.')]
    #[Validate('integer', message: 'Quantity must be an integer.')]
    #[Validate('min:1', message: 'Quantity must be at least 1.')]
    public $qty;

    public $cart = [];

    public function add()
    {
        $this->validate();

        $product = Product::find($this->item_id);

        if ($this->qty > $product->stock) {
            $this->addError('qty', 'Quantity is not permitted.');
            return;
        }

        foreach ($this->cart as &$item) {
            if ($item['id'] === $product->id) {
                $item['qty'] += $this->qty;
                $item['total'] = $product->price * $item['qty'];
                $this->reset('item_id', 'qty');
                return;
            }
        }

        $this->cart[] = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $this->qty,
            'total' => $product->price * $this->qty,
        ];

        $this->reset('item_id', 'qty');
    }

    public function updateQty($index, $value)
    {
        $this->resetErrorBag();

        $validator = Validator::make(
            ['qty' => $value],
            [
                'qty' => [
                    'required',
                    'integer',
                    'min:1',
                    function ($attribute, $value, $fail) use ($index) {
                        $product_id = $this->cart[$index]['id'];
                        $product = Product::find($product_id);

                        if (!$product) {
                            return $fail('Product not found.');
                        }

                        $other_qty = collect($this->cart)
                            ->except($index)
                            ->where('id', $product_id)
                            ->sum('qty');

                        if ($value + $other_qty > $product->stock) {
                            return $fail('Not enough stock available.');
                        }
                    },
                ],
            ],
            [
                'qty.required' => 'Quantity is required.',
            ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->get('qty') as $message) {
                $this->addError("cart.$index.qty", $message);
            }
            return;
        }

        $this->cart[$index]['qty'] = (int) $value;
        $this->cart[$index]['total'] = $this->cart[$index]['qty'] * Product::find($this->cart[$index]['id'])->price;
    }

    public function remove($product_id)
    {
        foreach ($this->cart as $key => $item) {
            if ($item['id'] === $product_id) {
                unset($this->cart[$key]);
            }
        }

        $this->cart = array_values($this->cart);
    }

    public function checkout()
    {
        $total = array_sum(array_column($this->cart, 'total'));

        $order = Order::create([
            'total' => $total,
        ]);

        Payment::create([
            'order_id' => $order->id,
        ]);

        foreach ($this->cart as $item) {
            $order->products()->attach($item['id'], [
                'quantity' => $item['qty'],
            ]);

            $product = Product::find($item['id']);
            if ($product) {
                $product->decrement('stock', $item['qty']);
            }
        }

        return redirect(route('order.checkout', $order));
    }


    public function render()
    {
        $items = Product::all()->map(function ($product) {
            $cart_qty = collect($this->cart)
                ->where('id', $product->id)
                ->sum('qty');

            $product->stock -= $cart_qty;

            return $product;
        });

        return view('livewire.cart', [
            'items' => $items,
        ]);
    }
}
