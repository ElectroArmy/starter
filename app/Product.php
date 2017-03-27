<?php

namespace App;

    //use App\RecordActivity;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;



class Product extends Model
{
    use SoftDeletes, Searchable, RecordActivity;

    protected static $recordEvents = ['created'];

    protected $dates = ['deleted_at'];

    /**
     * Fillable fields for a Post.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'platform',
        'description',
        'sku',
        'price',
        'is_downloadable'
    ];


    /**
     * Converts a products price in to pennies for use
     * by Stripe.
     *
     * @return mixed
     */
    public function priceToCents()
    {
        return $this->price * 100;
    }

    /**
     * Rounding the float on the way out of the db (Cause Dylan's db has downs)
     */
    public function setPriceFromCurrencyAttribute($value) {

        $this->attributes['price'] = $value*100;
    }



    /**
     * Relationship
     *
     * A product has many orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }


    /**
     * Relationship
     *
     *  Products belong to one user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }




    /**
     * Return a collection of search results.
     *
     * @param $query
     * @return array
     */
    public function scopeSearch($query)
    {
        return Product::search($query)->get()->all();
    }

}