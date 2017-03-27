<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\ProductWasCreated;
use App\Events\ProductWasUpdated;
use App\Exceptions\ProductNotFoundException;
use App\Http\Requests\ProductRequest;
use App\Order;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Product;


class ProductsController extends Controller
{

    /**
     * Initialise the User object and the alias within the
     * parental constructor method.
     *
     */
    public function __construct()
    {

        //parent::__construct();

        $this->middleware('auth');

    }

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



                return view('admin.products.index', compact('products'));
            }

        } catch (\Exception $e) {

            throw new ProductNotFoundException($e->getMessage());

        }

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store the products and move to the specified
     * storage area.
     *
     * @param ProductRequest $request
     * @return mixed
     */

    public function store(ProductRequest $request)
    {
        $user = auth()->user();

        $product = $user->products()->create($request->all());


        // Process the uploaded image
        $imageName = $product->sku. '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(base_path() . '/public/images/products/', $imageName);

        // Process the electronic download
        if ($request->file('download')) {

            $downloadName = $product->sku. '.' . $request->file('download')->getClientOriginalExtension();

            $request->file('download')->move(storage_path() . '/downloads/', $downloadName);

            $product->download = $downloadName;
            $product->save();
        }

        $user->recordActivity('created', $product);

        event(new ProductWasCreated($user, $product));

        return redirect()->route('admin.products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
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

            return response()->download(storage_path().'/downloads/' . $product->download);

        } else {

            abort(401, 'Access denied');

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id)
    {

        $product = Product::findOrFail($id);

        $slug = Str::slug($product->name);

        return view('admin.products.edit', compact('product', 'slug'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param  int $id
     * @return Response
     */

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        $user = auth()->user();

        event(new ProductWasUpdated($user, $product));

        return redirect()->route('admin.products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        File::delete(base_path() . '/public/imgs/products/', $id . ".png");

        return redirect()->route('admin.products.index');

    }



}