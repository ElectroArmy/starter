<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Initialise the User object and the alias within the
     * parental constructor method.
     *
     */
    public function __construct()
    {

        parent::__construct();

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = Order::orderBy('created_at', 'desc')->paginate(15);

        } catch (\Exception $e) {

            throw new OrderNotFoundException($e->getMessage());
        }


        return view('admin.orders.index', compact('orders'));

    }
}
