<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="@yield('meta_description', 'The smartest games on the web.')">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <title>Gamesstation | @yield('meta-title', 'The Gamesstation')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/libs.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css')}}"/>
    <link href='https://fonts.googleapis.com/css?family=Orbitron:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}"/>
</head>


<body>



@include('partials.navigation')

<div class="container">

    @yield('content')

</div><!-- /.container -->



@include('partials.footer')




<script src="/js/vendor.js"></script>
<script src="/js/jquery.js"></script>




<script type="application/javascript" src="/js/bootstrap.js"></script>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1467878203533146";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));
</script>
<script>(function(t,e,n,o){var s,c,r;t.SMCX=t.SMCX||[],e.getElementById(o)||(s=e.getElementsByTagName(n),c=s[s.length-1],r=e.createElement(n),r.type="text/javascript",r.async=!0,r.id=o,r.src=["https:"===location.protocol?"https://":"http://","widget.surveymonkey.com/collect/website/js/y2yvvg3YthKveYSOaQCl2Dv6IR4opkNSE46MIsXTnn_2BrD4G4_2FqdkJzwkxJxr_2BTOD.js"].join(""),c.parentNode.insertBefore(r,c))})(window,document,"script","smcx-sdk");</script>


<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer>
    {lang: 'en-GB'}
</script>

<script async defer src="//assets.pinterest.com/js/pinit.js"></script>

<script>
    // Google Analytics
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-93137682-1', 'auto');
    ga('send', 'pageview');

</script>

<script src="/js/libs.js"></script>
@include('flash')

@yield('footer_js')




</body>

</html>

