@extends('layouts.app')

@section('meta-title', 'Manage Orders')

@section('content')


        <div class="main-container">
            <div class="header">
                <h1 class="profile--title">Order Listing  <small> View your orders.</small></h1>
            </div><!-- /.header -->


            @if (count($orders) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Ordered On</th>
                            <th>Customer Name</th>
                            <th>Customer e-mail</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <a href="{{ URL::route('admin.orders.edit', $order->id) }}">{{ $order->order_number }}</a>
                                </td>
                                <td>
                                    {{ $order->created_at }}
                                </td>
                                <td>
                                    {{ $order->billing_name }}
                                </td>
                                <td>
                                    {{ $order->email }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>
                    You haven't created any orders. <a href="/admin/products/create">Create a Product</a>
                </p>

            @endif
        </div><!-- /.main-container -->
@endsection

