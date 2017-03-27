<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id','order_number', 'email', 'billing_name', 'billing_address', 'billing_city', 'billing_zip', 'billing_country', 'shipping_name', 'shipping_address', 'shipping_city', 'shipping_zip', 'shipping_country', 'updated_at', 'created_at'];

    /**
     * Relationship
     *
     * Orders belongs to a product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
