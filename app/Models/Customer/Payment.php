<?php

namespace App\Models\Customer;

use App\Models\Customer\Order;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasUuids;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
