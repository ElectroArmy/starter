@extends('layouts.format')

@section('meta-title', 'Edit your profile')

@section('content')

<div class="main-container">


            <div class="register-fluid">

                @include('partials.errors')

                <div class="header">
                    <h4>Edit your Profile</h4>
                </div><!-- /.header -->

                <div class="row">
                    {!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['dashboard.update', $user->username]]) !!}

                    {{-- Address --}}
                    <div class="form-group form-group-lg">
                        {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
                        {!! Form::text('address', null, ['class' => 'form-control']) !!}

                    </div>

                    <!-- Location Field -->
                    <div class="form-group form-group-lg">
                        {!! Form::label('city', 'City:', ['class' => 'control-label']) !!}
                        {!! Form::text('city', null, ['class' => 'form-control']) !!}

                    </div>

                    {{-- Postcode --}}
                    <div class="form-group form-group-lg">
                        {!! Form::label('postcode', 'Postcode:', ['class' => 'control-label']) !!}
                        {!! Form::text('postcode', null, ['class' => 'form-control']) !!}

                    </div>

                    {{-- Country --}}
                    <div class="form-group form-group-lg">
                        {!! Form::label('country', 'Country:', ['class' => 'control-label']) !!}
                        {!! Form::text('country', null, ['class' => 'form-control']) !!}

                    </div>

                    {{-- Phone --}}
                    <div class="form-group form-group-lg">
                        {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Bio Field  -->
                    <div class="form-group">
                        {!! Form::label('bio', 'Bio:' , ['class' => 'control-label']) !!}
                        {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Twitter username -->
                    <div class="form-group form-group-lg">
                        {!! Form::label('twitter_username', 'Twitter_username:' , ['class' => 'control-label']) !!}
                        {!! Form::text('twitter_username', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Github username -->
                    <div class="form-group form-group-lg">
                        {!! Form::label('github_username', 'github_username:' , ['class' => 'control-label']) !!}
                        {!! Form::text('github_username', null, ['class' => 'form-control']) !!}

                    </div>

                    <div class="button-centre">
                        {!! Form::submit('Update Profile', ['class' => 'btn btn-primary']) !!}
                    </div><!-- /.button-centre -->

                    {!! Form::close() !!}
                </div><!-- /.row -->
            </div><!-- /.register-fluid -->

</div><!-- /.main-container -->
@endsection

