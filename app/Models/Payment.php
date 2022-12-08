<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'user_id',
        'order_number',
        'payment_id',
        'sub_total',
        'tax',
        'payment_currency',
        'platform_charge',
        'conversion_rate',
        'grand_total_with_conversation_rate',
        'deposit_by',
        'deposit_slip',
        'bank_id',
        'grand_total',
        'payment_method',
        'payment_details',
        'payment_status',
        'created_by_type',
        'created_by'
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
            $model->created_by =  auth()->id();
        });
    }
}
