<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Events\CheckoutWasCompleted;
use App\Order;
use App\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * CartController constructor.
     * Instantiate Auth Middleware.
     */

    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

    }

    /**
     * Show the cart
     */

    public function index()
    {
        try {

            $user = auth()->user();

            $cart = $user->cart;

        } catch (\Exception $e) {

            throw new CartNotFoundException($e->getMessage());

        }
        return view('cart.index', compact('cart'));

    }





    /**
     * Remove an item from the cart
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function remove($id)
    {
        $user = auth()->user();

        $user->cart()
            ->where('id', $id)->firstOrFail()->delete();
        return redirect('/cart');
    }

    /**
     * Add an item to the cart
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(Request $request)
    {

        $user = auth()->user();

        $product = Product::find($request->get('product_id'));

        $cart = new Cart([
            'product_id' => $product->id,
            'qty' => $request->get('qty', 1),
            'price' => $product->price,
        ]);

        $user->cart()->save($cart);

        return redirect('/cart');

    }

    /**
     * Complete the orders
     *
     * @param Request $request
     *
     * @return $this|\Illuminate\View\View
     */
    public function complete(Request $request)
    {
        $user = auth()->user();

        $total = $user->cart->sum(function($item){
            return $item->product->priceToCents();
        });


        $charge = $user->charge($total, [
            'source' => $request->get('stripe_token'),
            'receipt_email' => $user->email,
            'currency' => 'gbp',
            'description' => 'Payment for keys',

            // enter customer details in here
            'metadata' => [
                'name' => $user->name,
                'address' => $user->address,
                'city' => $user->city,
                'zip' => $user->zip,
            ],
        ]);

        if (! $charge) {
            return back()->withErrors('Charge Failed');
        }

        $product_id = 1;

        // Add the orders
        $orders = new Order();
        $orders->order_number = $charge->id;
        $orders->product_id = $product_id;
        $orders->email = $user->email;
        $orders->billing_name = $request->input('card_name');
        $orders->billing_address = $request->input('address');
        $orders->billing_city = $request->input('city');
        $orders->billing_zip = $request->input('zip');
        $orders->billing_country = $request->input('country');
        $orders->shipping_name = $request->input('shipping_name');
        $orders->shipping_address = $request->input('shipping_address');
        $orders->shipping_city = $request->input('shipping_city');
        $orders->shipping_zip = $request->input('shipping_zip');
        $orders->shipping_country = $request->input('shipping_country');
        $orders->save();

        // Update the old cart
        foreach ($user->cart as $cart) {
            $cart->order_id = $orders->id;
            $cart->complete = 1;
            $cart->save();
        }

        event(new CheckoutWasCompleted($user));

        return view('checkout.thankyou', compact('orders', 'charge'));

    }

}
