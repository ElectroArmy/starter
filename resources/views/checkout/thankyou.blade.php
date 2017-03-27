@extends('thanks')

@section('meta-title', 'Goodbye, See you again soon')

@section('content')
    <div class="main-container">
          <div class="large-fluid">
                <div class="header">
                    <h4 class="leader"> - Tell Everybody about us! - </h4>
                </div><!-- /.header -->
                <p class="farewell">We would like to thank you for your purchase today.</p>
                <p class="farewell">We will forward your key to your designated email address shortly.</p>
                <p class="farewell">We hope you enjoyed your shopping experience today.</p>
                <p class="farewell">Share with social media.</p>
                <p class="farewell">And win an all inclusive ticket to an all inclusive to EGX.</p>


                <div class="social-area">
                    <!-- Pin Interest -->
                    <div class="social-button">
                        <a data-pin-do="buttonFollow" href="https://www.pinterest.com/pinterest/">Pinterest</a>
                    </div><!-- /.social-button -->


                    <!-- Google Plus -->
                    <div class="social-button">
                        <div class="g-follow" data-annotation="bubble" data-height="20" data-href="//plus.google.com/u/0/114107477030185999282" data-rel="author"></div>
                    </div><!-- /.social-button -->


                    <!-- Twitter -->
                    <div class="social-button">
                        <a class="twitter-follow-button"
                           href="https://twitter.com/ormrepo"
                           data-size="large">
                            Follow @TwitterDev</a>
                    </div><!-- /.social-button -->


                    <!-- Facebook -->
                    <div class="fb-follow" data-href="https://www.facebook.com/ormrepo" data-layout="standard" data-size="small" data-show-faces="true"></div>
                </div><!-- /.social-area -->
            </div><!-- /.large-fluid -->
    </div> <!-- /.main-container -->


@endsection

