@extends('layouts.format')

@section('meta-title', 'Game Lists')

@section('content')

    <div class="main-container">
        <div class="hero">
            <div class="sidebar">
                <h4 class="is--beige">Featured</h4>
                <ul class="side-links">
                    <li><a href="http://us.battle.net/en/games/classic" class="sidebar-items">Battlefield Net Games</a></li>
                    <li><a href="http://www.apple.com/uk/itunes/" class="sidebar-items">Itunes</a></li>
                    <li><a href="https://www.nintendo.co.uk/index.html" class="sidebar-items">Nintendo</a></li>
                    <li><a href="https://www.playstation.com/en-gb/explore/playstation-network/" class="sidebar-items">Playstation Network</a></li>
                    <li><a href="https://www.playstation.com/en-gb/get-help/ps4-system-software/" class="sidebar-items">Software</a></li>
                    <li><a href="http://support.xbox.com/en-GB/xbox-one/console/system-update-operating-system" class="sidebar-items">Xbox Live</a></li>
                </ul><!-- /.side-links -->
            </div><!-- /.sidebar -->
            <div class="slider">
                <ul class="bxslider">
                    <li><img src="/imgs/products/FIFA.png" title="FIFA points from £9.99"/></li>
                    <li><img src="/imgs/products/UFC2.png" title="UFC points from £14.99" /></li>
                    <li><img src="/imgs/products/BATTLEFIELD.png" title="Battle points from £14.99" /></li>
                    <li><img src="/imgs/products/SIMCITY.png" title="Sim points from £10.99" /></li>
                </ul>
            </div><!-- /.slider -->

            <div class="splint-container">
                <img src="/images/splinterx2.png"
                     class="splinter"
                     alt="The Splinter Cell Franchise Weekend">
                <div class="special-container">
                    <div class="deal">
                        <h3>Weekend Deal</h3>
                        <p class="is--black">Offer ends Monday 10am GMT</p>
                    </div><!-- /.deal -->
                    <div class="percent">
                        <h2>75% off</h2>
                    </div><!-- /.percent -->
                </div><!-- /.special-container -->
            </div><!-- /.splint-container -->
        </div><!-- /.hero -->

        <div class="content">

            <p class="show--link" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" >Show more</p>
            <div class="collapse" id="collapseExample">
                <h1>PSN Game Keys</h1>
                <div class="black-container animated fadeInUp">
                    @for ($i = 0; $i < 4; $i++)
                        @forelse ($products as $product)
                            <div class="key animated flip">
                                <img class="product-img" src="/images/products/{{ $product->sku }}.png"/>
                                <div class="price-container">
                                    <div class="product-container">
                                        <p class="heading">{!! link_to_route('admin.products.show', $product->name, [$product->id]) !!}</p>

                                        <p class="price"><span style="text-decoration: line-through">£ 10.00</span>  £{{ $product->price }}</p>
                                    </div><!-- /.product-container -->
                                </div><!-- /.price-container -->
                            </div><!-- /.key -->
                        @empty
                            <p class="offline">The key catalogue is currently offline.</p>
                        @endforelse

                    @endfor
                </div><!-- /.black-container -->

            </div><!--end collapseExample-->



            <div class="content">

                <p class="show--link" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2" >Show more</p>
                <div class="collapse" id="collapseExample2">
                    <h1>PSN Game Keys</h1>
                    <div class="black-container animated fadeInUp">
                        @for ($i = 0; $i < 4; $i++)
                            @forelse ($products as $product)
                                <div class="key animated flip">
                                    <img class="product-img" src="/images/products/{{ $product->sku }}.png"/>
                                    <div class="price-container">
                                        <div class="product-container">
                                            <p class="heading">{!! link_to_route('admin.products.show', $product->name, [$product->id]) !!}</p>
                                            <p class="price"><span style="text-decoration: line-through">£ 10.00</span>  £{{ $product->price }}</p>
                                        </div><!-- /.product-container -->
                                    </div><!-- /.price-container -->
                                </div><!-- /.key -->
                            @empty
                                <p class="offline">The key catalogue is currently offline.</p>
                            @endforelse

                        @endfor
                    </div><!-- /.black-container -->

                </div><!--end collapseExample2-->

            </div><!-- /.content -->


            <div class="content">
                <p class="show--link" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3" >Show more</p>
                <div class="collapse" id="collapseExample3">
                    <h1>PSN Game Keys</h1>
                    <div class="black-container animated fadeInUp">
                        @for ($i = 0; $i < 4; $i++)
                            @forelse ($products as $product)
                                <div class="key animated flip">
                                    <img class="product-img" src="/images/products/{{ $product->sku }}.png"/>
                                    <div class="price-container">
                                        <div class="product-container">
                                            <p class="heading">{!! link_to_route('admin.products.show', $product->name, [$product->id]) !!}</p>
                                            <p class="price"><span style="text-decoration: line-through">£ 10.00</span>  £{{ $product->price }}</p>
                                        </div><!-- /.product-container -->
                                    </div><!-- /.price-container -->
                                </div><!-- /.key -->
                            @empty
                                <p class="offline">The key catalogue is currently offline.</p>
                            @endforelse

                        @endfor
                    </div><!-- /.black-container -->

                </div><!--end collapseExample3-->
            </div><!-- /.content -->
        </div>
    </div><!-- /.main_container -->




@endsection

