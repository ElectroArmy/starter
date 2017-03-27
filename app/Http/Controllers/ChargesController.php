<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use Stripe\Charge;
use Stripe\Stripe;

class ChargesController extends Controller
{
    /**
     *
     * @param Product $product
     */
    public function charges(Product $product)
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey("sk_test_mSiEUvaxNzMphi4gPsOcs8ez");



        // Token is created using Stripe.js or Checkout!
        // Get the payment token submitted by the form:
        $token = $_POST['token'];

        //dd($product);

        // Convert the float in to a number for Stripe Api
        $price = $product->price;
        //$price  = 2000;


        //$price = str_replace(',0', '', number_format($product->priceToCents(), 1, ',', ''));
        //dd($price);

        // Charge the user's card:
        $charge = Charge::create(array(
            "amount" => $price,
            "currency" => "gbp",
            "description" => "Gamesstation Limited",
            "source" => $token,
        ));



    }
}
