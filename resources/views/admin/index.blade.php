@extends('layouts.format')

@section('content')

    <h1>GamesStation Administration Console</h1>

    <ul>
        <li>{!! link_to_route('order', 'Manage Orders') !!}</li>
        <li>{!! link_to_route('admin.products.index', 'Manage Games') !!}</li>
    </ul>

@endsection
