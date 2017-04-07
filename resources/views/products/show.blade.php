@extends('layouts.format')

@section('meta-title', $product->title)

@section('content')

    <div class="product-fluid">

        <div class="left-pane">
            <div class="window">

                <img class="product-img" src="/images/products/{{ $product->sku }}.png"/>
            </div>
            <!-- /.window -->
            <div class="product-image">

            </div><!-- /.product-image -->
        </div><!-- /.left-pane -->

        <div class="right-pane">
            <div class="new">
                <h4 class="is--centered">New</h4>
            </div>
            <!-- /.new -->

            <div class="detail-panel">


                <div class="show-heading">
                    <h1>{{ $product->name }}</h1>
                    <h5>£{{ $product->price }}</h5>
                </div><!-- /.product-heading -->
                <hr/>

                <p class="--centre is--padded-bottom-ten">{{ $product->description }}</p>


                {!! Form::open(array('url' => '/checkout')) !!}
                {!! Form::hidden('product_id', $product->id) !!}
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ env('STRIPE_KEY') }}"
                        data-name="Gamestation Ltd"
                        data-billing-address=true
                        data-shipping-address=true
                        data-label="Buy £{{ $product->price }}"
                        data-description="{{ $product->name }}"
                        data-amount="{{ $product->price }}"
                        data-currency="gbp">
                </script>
                {!! Form::close() !!}
                <br>
                {!! Form::open(['url' => '/cart/store']) !!}
                <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                <button type="submit" class="btn btn-cart">Add to Cart</button>
                {!! Form::close() !!}

                <hr/>
                <style>
                    #apple-pay-button {
                        width: 280px;
                        height: 64px;
                        display: inline-block;
                        box-sizing: border-box;
                        background-image: url(/images/ApplePayBTN_32pt__white_logo_@2x.png);
                        background-size: 100%;
                        background-repeat: no-repeat;
                    }
                </style>

                <button id="apple-pay-button" style="display:none"></button>

                <div class="apple-pay-set-up-button apple-pay-setup-button-white-with-line" style="display:none">

                </div>
                <div id="attid" style="display:none;">Show/Hide this text</div>

                <div class="apple-link">
                    <li><a href="http://www.apple.com/uk/privacy/" class="terms-link">Apple Pay Terms and Conditions</a></li>
                </div><!-- /.apple-link -->

            </div><!-- /.detail-pane -->
        </div><!-- /.right-pane -->



    </div><!-- /.product-fluid -->


    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <script>

        Stripe.setPublishableKey('pk_test_yLcuuylHTzpKDXUa741edFUz');

        Stripe.applePay.checkAvailability(function(available) {
            if (available) {
                document.getElementById('apple-pay-button').style.display = 'block';

            } else {
                // Check for the existence of the openPaymentSetup method.
                if (ApplePaySession.openPaymentSetup) {
                    // Display the Set up Apple Pay Button here…
                    document.getElementById('apple-pay-setup-button-white-with-line').style.display = 'block';

                }
            }


        });

        document.getElementById('apple-pay-button').addEventListener('click', beginApplePay);


        var price ="{{ ($product->price/100) }}";



        function beginApplePay() {
            var paymentRequest = {
                requiredBillingContactFields: ['postalAddress'],
                requiredShippingContactFields: ['phone'],
                countryCode: 'GB',
                currencyCode: 'GBP',
                total: {
                    label: 'Ormrepo',
                    amount: price
                }
            };

            var session = Stripe.applePay.buildSession(paymentRequest,
                function(result, completion) {
                    console.log(result.token.card.address_line1); // 12 Main St
                    $.post('/admin/products/charges/{id}', { token: result.token.id }).done(function() {

                        completion(ApplePaySession.STATUS_SUCCESS);
                        // Prevent the form from submitting with the default action
                        return false;
                        // You can now redirect the user to a receipt page, etc.
                        //window.location.href = '/success.html';
                        location.assign("http://www.mozilla.org");
                    }).fail(function() {
                        completion(ApplePaySession.STATUS_FAILURE);
                        document.getElementById("attid").style.display = 'inline';

                    });

                }, function(error) {

                    console.log(error.message);
                });

            session.begin();


        }
    </script>
@endsection