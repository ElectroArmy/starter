<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CheckoutWasCompleted;
use App\Events\CheckoutWasIncomplete;
use App\Mail\DigitalDownload;
use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Mail;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Initialise the this user instance.
     *
     * CheckoutController constructor.
     */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Display a listing of the orders.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {

        $user = new User();

        $products = Product::find($request->input('product_id'));

        $stripeEmail = $request->input('stripeEmail');

        $stripeToken = $request->input('stripeToken');


        if($user->charge($products->priceToCents(),
            [
                'source' => $stripeToken,
                'receipt_email' => $stripeEmail
            ])
        ) {

            $orders = new Order();
            // Generate random orders number
            $orders->order_number = substr(md5(microtime()), rand(0, 20), 6) . time();

            $orders->product_id = $products->id;

            $orders->email = $request->input('stripeEmail');
            $orders->billing_name = $request->input('stripeBillingName');
            $orders->billing_address = $request->input('stripeBillingAddressLine1');
            $orders->billing_city = $request->input('stripeBillingAddressCity');
            $orders->billing_zip = $request->input('stripeBillingAddressZip');
            $orders->billing_country = $request->input('stripeBillingAddressCountry');

            $orders->shipping_name = $request->input('stripeShippingName');
            $orders->shipping_address = $request->input('stripeShippingAddressLine1');
            $orders->shipping_city = $request->input('stripeShippingAddressCity');
            $orders->shipping_zip = $request->input('stripeShippingAddressZip');
            $orders->shipping_country = $request->input('stripeShippingAddressCountry');

            $orders->save();

            //dd($orders);

            if ($orders->product->is_downloadable) {

                $orders->onetimeurl = md5(time() . $orders->email . $orders->order_number);

                $orders->save();

                $when = Carbon::now()->addMinutes(10);

                Mail::to($orders->email)->later($when, new DigitalDownload($orders));
            }

        } else {

            event(new CheckoutWasIncomplete($user));

            return redirect()->route('products.show', [$products->id]);
        }

        $user = User::first();


        event(new CheckoutWasCompleted($user));

        return redirect()->route('checkout.thankyou');


    }

    /**
     * Uses Apple Pay
     * Get the latest Product and retrieve the price for the product
     * set the stripe key and retrieve the token from the stripe server
     * use the token to create a charge for the amount.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function charges(Request $request)
    {


        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey("sk_test_mSiEUvaxNzMphi4gPsOcs8ez");



        // Token is created using Stripe.js or Checkout!
        // Get the payment token submitted by the form:
        //$token = $_POST['token'];

        //$price = $_POST['price'];
        $id = $_POST['id'];
        $raw_price = $request->get('price');
        $price = ($raw_price * 100);





        $user = new User();
        $product = Product::findOrFail($id);

        if($user->charge($product->priceToCents(),
            [
                'source' => $request->get('token'),
                'amount' => $price,
                'receipt_email' => $user->email
            ])
        ) {

            $orders = new Order();
            // Generate random orders number
            $orders->order_number = substr(md5(microtime()), rand(0, 20), 6) . time();

            $orders->product_id = $product->id;

            $user = auth()->user();

            $orders->email = $user->email;

            $orders->billing_name = $user->name;
            $orders->billing_address = '10 Apple Street';
            $orders->billing_city = 'Appleton';
            $orders->billing_zip = 'AP1 8YT';
            $orders->billing_country = 'United Kingdom';

            $orders->shipping_name = $user->name;
            $orders->shipping_address = '10 Apple Street';
            $orders->shipping_city = 'Appleton';
            $orders->shipping_zip = 'AP1 8YT';
            $orders->shipping_country = 'United Kingdom';

            $orders->save();

            if ($orders->product->is_downloadable) {

                $orders->onetimeurl = md5(time() . $orders->email . $orders->order_number);

                $orders->save();

                $when = Carbon::now()->addMinutes(10);

                Mail::to($orders->email)->later($when, new DigitalDownload($orders));

            } else {

                event(new CheckoutWasIncomplete($user));

                return redirect()->route('products.show', [$product->id]);
            }

            $user = User::first();


            event(new CheckoutWasCompleted($user));

            return redirect()->route('checkout.thankyou');
        }




    }

    /**
     * Thank the customer for purchase
     *
     * @return Response
     */
    public function thankyou()
    {
        return view('checkout.thankyou');
    }
}
