<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="@yield('meta_description', 'The smartest games on the web.')">
    <meta property="product:payment_method" content="ApplePay" />
    <meta name="payment-country-code" content="GB" />
    <meta name="payment-currency-code" content="GBP" />
    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
    <title>Gamesstation | @yield('meta-title', 'The Gamesstation')</title>
    <link rel="alternate" type="application/rss+xml" title="Gamesstation" href="{{ url('feed') }}" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <!-- SweetAlert CSS file -->
    <link rel="stylesheet" type="text/css" href="/css/libs.css"/>
    <link rel="stylesheet" type="text/css" href="/css/normalize.css"/>
    <link href='https://fonts.googleapis.com/css?family=Orbitron:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}"/>

    <link rel="apple-touch-icon" href="/touch-icon-120.png" />
    <link rel="apple-touch-icon" href="/touch-icon-152.png" />
    <link rel="apple-touch-icon" href="/touch-icon-180.png" />
    <!-- bxSlider CSS file -->
    <link href="/lib/jquery.bxslider.css" rel="stylesheet" type="text/css"/>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>



@include('partials.navigation')


    <div class="big-container">

        @yield('content')

    </div><!-- /.container -->


@include('partials.analyticstracking')
@include('partials.footer')

@yield('javascript')

<script src="/js/jquery.js"></script>
<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
</script>

<script type="application/javascript" src="/js/bootstrap.js"></script>

<!-- bxSlider Javascript file -->
<script src="/js/jquery.bxslider.min.js"></script>

<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            mode: 'fade',
            captions: true,
            adaptiveHeight: true
        });

    });
</script>

<script type="text/javascript">
    if (window.location.hash == '#_=_')window.location.hash = '';
</script>

<script type="text/javascript">
    if (window.location.hash == '#!')window.location.hash = '';
</script>

<script>
    $(function() {
        $("a[href=#menuExpand]").click(function(e) {
            $(".menu").toggleClass("menuOpen");
            e.preventDefault();
        });
    });
</script>

@yield('scripts')

<script>
    // Google Analytics
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-93137682-1', 'auto');
    ga('send', 'pageview');

</script>


<!-- SweetAlert js file -->
<script src="/js/libs.js"></script>



<!-- SweetAlert flash file -->
@include('flash')

<!-- Select js for tags -->
@yield('footer_js')


</body>

</html>
