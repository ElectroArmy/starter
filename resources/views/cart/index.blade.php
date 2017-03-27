@extends('layouts.format')

@section('meta-title', 'Cart')

@section('content')

    <div class="main-container">


        <div class="header">
            <h4 class="cart--title">Cart</h4>
        </div><!-- /.header -->

            @if (count($cart) == 0)
                <p class="offline">Your cart is currently empty</p>
            @else

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cart as $item)
                            <tr>
                                <td><a href="/cart/remove/{!!  $item->id !!}" id="cart-links">x</a></td>
                                <td>{!!  $item->qty !!}</td>
                                <td>£{!!  $item->price !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            <div class="row">
                {!! Form::open(['url' => '/cart/complete', 'class' => 'form', 'id' => 'purchase-form']) !!}

                <div class="billing-container">
                        <div class="form-group form-group-lg">
                            <h1 class="cart-heading">Billing Information</h1>
                                <div class="col-xl">
                                    <label for="card_name" class="control-label">Name on card</label>
                                    <input type="text"
                                           class="form-control"
                                           name="card_name"
                                           id="card_name" value="{{ Auth::user()->name }}">
                                </div><!-- /.col-xl -->
                        </div><!-- /.form-group -->

                        <div class="form-group form-group-lg">
                            <div class="col-xl">
                                <label for="address" class="control-label">Address</label>
                                <input type="text"
                                       class="form-control"
                                       id="address"
                                       name="address"
                                       placeholder="Address">
                            </div><!-- /.col-xl -->
                        </div><!-- /.form-group -->

                        <div class="form-group form-group-lg">
                            <div class="col-xs">
                                <label for="city" class="control-label">City</label>
                                <input type="text"
                                       class="form-control"
                                       id="city"
                                       name="city"
                                       placeholder="City">
                            </div><!-- /.col-xs -->
                        </div><!-- /.form-group -->

                        <div class="form-group form-group-lg">
                            <div class="col-xs">
                                <label for="zip" class="control-label">PostCode</label>
                                <input type="text"
                                       class="form-control"
                                       name="zip"
                                       id="zip"
                                       placeholder="Postcode">
                            </div><!-- /.col-xs -->
                        </div><!-- /.form-group -->

                        <div class="form-group form-group-lg">
                           <div class="col-xb">
                                <label for="country" class="control-label">Country</label>
                               <input type="text"
                                      class="form-control"
                                      name="country"
                                      id="country"
                                      placeholder="Country">
                            </div><!-- /.col-xb -->
                        </div><!-- /.form-group -->
                </div><!-- /.billing-Container -->


                <div class="shipping-container">
                    <div class="form-group form-group-lg">
                        <h1 class="cart-heading">Shipping Information</h1>
                        <div class="col-xl">
                            <label for="shipping_name" class="control-label">Shipping Name</label>
                            <input type="text"
                                  class="form-control"
                                  name="shipping_name"
                                  id="shipping_name" value="{{ Auth::user()->name }}">

                        </div><!-- /.col-xl -->
                    </div><!-- /.form-group -->

                    <div class="form-group form-group-lg">
                        <div class="col-xl">
                            <label for="shipping_address" class="control-label">Address</label>
                            <input type="text"
                                   class="form-control"
                                   id="shipping_address" value="{{ Auth::user()->address }}"
                                   name="shipping_address"
                                   placeholder="Address">
                        </div><!-- /.col-xl -->
                    </div><!-- /.form-group -->

                    <div class="form-group form-group-lg">
                        <div class="col-xb">
                            <label for="shipping_city" class="control-label">City</label>
                            <input type="text"
                                   class="form-control"
                                   id="shipping_city" value="{{ Auth::user()->city }}"
                                   name="shipping_city"
                                   placeholder="City">
                        </div><!-- /.col-xl -->
                    </div><!-- /.form-group -->

                    <div class="form-group form-group-lg">
                      <div class="col-xb">
                            <label for="shipping_zip" class="control-label">Postcode</label>
                          <input type="text"
                                 class="form-control"
                                 name="shipping_zip"
                                 placeholder="Postcode"
                                 id="zip" value="{{ Auth::user()->zip }}">
                        </div><!-- /.col-xl -->
                    </div><!-- /.form-group -->

                    <div class="form-group form-group-lg">
                      <div class="col-xb">
                            <label for="shipping_country" class="control-label">Country</label>
                            <input type="text"
                                 class="form-control"
                                 name="shipping_country"
                                 value="UK"
                                 id="shipping_country">
                        </div><!-- /.col-xl -->
                    </div><!-- /.form-group -->
                </div><!-- /.shipping-container -->

                <div class="expiration">

                    <h1 class="cart-heading">Card Expiration </h1>

                    <div class="card-details">
                        <label for="card-number" class="control-label">Credit Card Number</label>
                        <div class="col-xb">

                            <input type="text"
                                   class="form-control"
                                   id="card-number"
                                   placeholder="Valid Card Number" required autofocus
                                   data-stripe="number"
                                   value="{{ App::environment() == 'local' ? '4242424242424242' : '' }}">
                        </div><!-- /.col-xl -->
                    </div><!-- /.form-group -->

                    <div class="card-details">
                        <label for="card-month" class="control-label">Expiration Date</label>
                        <div class="col-xs-p">

                                <input type="text" size="3"
                                       class="form-control"
                                       name="exp_month"
                                       data-stripe="exp-month"
                                       placeholder="MM"
                                       id="card-month"
                                       value="{{ App::environment() == 'local' ? '12' : '' }}"
                                       required>
                            </div>
                        </div>

                    <div class="card-details">

                        <div class="col-xs-p">
                            <input type="text" size="4"
                                class="form-control"
                                name="exp_year"
                                data-stripe="exp-year"
                                placeholder="YYYY"
                                id="card-year"
                                value="{{ App::environment() == 'local' ? '2016' : '' }}"
                                required>
                        </div><!-- /.col-xs-p -->

                    </div><!-- /.card-details -->

                    <div class="card-details">
                        <label for="card-cvc" class="control-label">Security Code</label>
                        <div class="col-xs-p">
                                <input type="text"
                                    class="form-control"
                                    id="card-cvc"
                                    placeholder=""
                                    size="6"
                                    value="{{ App::environment() == 'local' ? '123' : '' }}">
                        </div>

                        <div class="button-centre">
                            <button type="submit" class="submit-button btn btn-default btn-lg">Complete Order</button>
                        </div>
                    </div><!-- /.card-details -->
                </div><!-- /.expiration -->

                {!! Form::close() !!}
            </div><!-- /.row -->


    </div><!-- /.main-container -->

        @endif

@endsection


@section('footer_js')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey('{{ env('STRIPE_PUBLIC_KEY') }}');

        jQuery(function($) {
            $("#card-number").focusout(function() {
                var el = $(this);
                if ( ! Stripe.validateCardNumber(el.val())) {
                    el.closest(".form-group").addClass("has-error");
                } else {
                    el.closest(".form-group").removeClass("has-error");
                }
            });
            $("#card-cvc").focusout(function() {
                var el = $(this);
                if ( ! Stripe.validateCVC(el.val())) {
                    el.closest("div").addClass("has-error");
                } else {
                    el.closest("div").removeClass("has-error");
                }
            });
            $('#purchase-form').submit(function(e) {
                $('.submit-button').prop('disabled', true);
                var $form = $(this);
                $form.find('.payment-errors').hide()
                Stripe.card.createToken({
                    number: $form.find('#card-number').val(),
                    cvc: $form.find('#card-cvc').val(),
                    exp_month: $form.find('#card-month').val(),
                    exp_year: $form.find('#card-year').val()
                }, stripeResponseHandler);

                return false;
            });
        });

        var stripeResponseHandler = function(status, response) {
            var $form = $('#purchase-form');
            var $errors = $('.payment-errors');
            // Reset any errors
            $errors.text("");

            if (response.error) {
                $errors.text(response.error.message).show();
                $form.find('button').prop('disabled', false);
            } else {
                var token = response.id;
                $form.append($('<input type="hidden" name="stripe_token" />').val(token));
                $form.get(0).submit();
                $form.find('button').html('Processing...');
            }
        };
    </script>

@endsection


