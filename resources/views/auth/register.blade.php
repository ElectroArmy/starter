@extends('layouts.format')

@section('meta-title', 'Sign Up')

@section('content')

<div class="main-container">


		<div class="register-fluid">
			<div class="header">
				<h4 class="leader">Register</h4>
			</div><!-- /.header -->


			<div class="row">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group form-group-lg">
						<label for="input1" class="control-label">Username</label>
						<input autofocus id="username" type="text" name="username" class="form-control" value="{{ old('username') }}">
					</div><!-- /.form-group -->


					<div class="form-group form-group-lg">
						<label for="input1" class="control-label">Name</label>
						<input autofocus id="name" type="text" name="name" class="form-control" value="{{ old('name') }}">
					</div>

					<div class="form-group form-group-lg">
						<label for="input1" class="control-label">E-Mail Address</label>
						<input autofocus id="email" type="email
" name="email" class="form-control" value="{{ old('email') }}">
					</div>

					<div class="form-group form-group-lg">
						<label for="input1 password"  class="control-label">Password</label>

						<input id="password"
							   class="form-control"
							   type="password"
							   value="123"
							   name="password"
							   placeholder="password">

						<p><label><input id="methods" type="checkbox"> Show password</label></p>
					</div><!-- /.form-group -->

					<div class="form-group form-group-lg">
						<label for="input1 password_confirmation"  class="control-label">Confirm Password</label>
						<p>
							<input id="password_confirmation"
								   class="form-control"
								   type="password"
								   value="123"
								   name="password_confirmation"
								   placeholder="Confirm password">
						</p>
						<p><label><input id="methods" type="checkbox"> Show password</label></p>
					</div><!-- /.form-group -->

                    <div class="social-container">
                        <ul>
                            <div class="social__Icon">
                                <li><a class="btn btn-lg btn-social-icon btn-github" href="http://games.ormrepo.co.uk/github/authorize"><span class="fa fa-github"></span></a></li>
                            </div>
                            <!-- /.social__Icon -->
                            <div class="social__Icon">
                                <li><a class="btn btn-lg btn-social-icon btn-facebook" href="http://games.ormrepo.co.uk/facebook/authorize"><i class="fa fa-facebook"></i></a></li>
                            </div>
                            <!-- /.social__Icon -->

                            <div class="social__Icon">
                                <li><a class="btn btn-lg btn-social-icon btn-linkedin" href="http://games.ormrepo.co.uk/linkedin/authorize"><i class="fa fa-linkedin"></i></a></li>
                            </div>
                            <!-- /.social__Icon -->
                        </ul>
                    </div><!-- /.social-container -->
					<div class="button-group">
						<button type="submit" class="btn btn-primary">Register</button>
					</div><!-- /.button-group -->
				</form>

			</div><!-- /.row -->
		</div><!-- /.container-fluid -->


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