<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\ProductNotFoundException;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Storage;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws ProductNotFoundException
     */
    public function index(Request $request)
    {

        try {

            $query = $request->input('q');

            if ($query) {

                $products = Product::search($query)->get();

                return view('products.search', compact('products'));

            } else {
                $products = Product::orderBy('name', 'asc')->get();

                return view('products.index', compact('products'));
            }
        } catch (\Exception $e) {

            throw new ProductNotFoundException($e->getMessage());

        }

        return view('products.index', compact('products'));
    }



    /**
     * Show the view listing the products.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }


    /**
     * Download electronic products
     *
     * @param  string $id one time URL key
     * @return Response
     */

    public function download($id)
    {

        $order = Order::where('onetimeurl', $id)->first();

        if ($order) {

            $product = $order->product;
            $order->onetimeurl = '';
            $order->save();


            return response()->download(storage_path('/downloads/keys.txt'). $product->download);


        } else {

            abort(401, 'Access denied');

        }

    }


}
