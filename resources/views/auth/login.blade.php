@extends('layouts.format')

@section('meta-title', 'Sign In')

@section('content')

    <div class="main-container">


            <div class="login-fluid">
                <div class="header">
                    <h4 class="leader">Log In</h4>
                </div>
                <!-- /.header -->

                <div class="row">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include ('partials.errors')
                        <div class="form-group form-group-lg">
                            <label for="input1" class="control-label">E-Mail Address</label>
                            <input autofocus id="email" type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div><!-- /.form-group form-group-lg -->

                        <div class="form-group form-group-lg">
                            <ul>
                                <label for="input1 password"  class="col-sm-2 control-label past">Password</label>
                                <li> <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Password?</a>
                                </li>
                            </ul>
                            <input id="password"
                                   name="password"
                                   class="form-control"
                                   type="password"
                                   value="password"
                                   placeholder="password"
                                   autocomplete="off" >
                        </div><!-- /.form-group form-group-lg -->

                        <div class="checkbox">
                            <label for="checkbox"><input id="methods" type="checkbox"> Show password</label>
                            <label for="checkbox" id="check"><input type="checkbox" name="remember">Remember Me</label>

                        </div>
                        <!-- /.checkbox -->

                        <div class="button-group">
                            <button type="submit" class="btn-primary">Log In</button>
                        </div><!-- /.button-group -->

                        </form>
                </div><!-- /.row -->
            </div><!-- /.login-fluid -->
    </div>
    <!-- /.main-container -->
@endsection

@section('scripts')

    <script src="/js/password.js"></script>
    <script>
        $(function() {
            $('#password').password().on('show.bs.password', function(e) {
                $('#eventLog').text('On show event');
                $('#methods').prop('checked', true);
            }).on('hide.bs.password', function(e) {
                $('#eventLog').text('On hide event');
                $('#methods').prop('checked', false);
            });
            $('#methods').click(function() {
                $('#password').password('toggle');
            });
        });
    </script>

    <script>
        $(function() {
            $('#password_confirmation').password().on('show.bs.password', function(e) {
                $('#eventLog').text('On show event');
                $('#methods').prop('checked', true);
            }).on('hide.bs.password', function(e) {
                $('#eventLog').text('On hide event');
                $('#methods').prop('checked', false);
            });
            $('#methods').click(function() {
                $('#password_confirmation').password('toggle');
            });
        });
    </script>

@stop