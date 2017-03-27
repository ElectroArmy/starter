@extends ('layouts.format')

@section('meta-title', 'Search Results')

@section ('content')

    <div class="form-blade">
        <div class="main-container">
            <div class="header">
                <h1 class="product--title">Search Results</h1>
            </div><!-- /.header -->

            <div class="posts-container">
                @if (count($products) === 0)
                        <p class="offline">Sorry, no keys were found within your search.</p>
                    @elseif (count($products) >= 1)

                        @foreach($products as $product)
                            <article>
                                <h2><a href="{{ url('products', $product->id) }}">{!!  $product->title !!}</a></h2>
                                <h3>{!! str_limit($product->body, $limit = 300, $end = '')!!}</h3>

                            </article>
                        @endforeach
                    @endif
            </div><!-- /.posts-container -->
        </div><!-- /.main-container -->
    </div><!-- /.form-page -->

@stop

