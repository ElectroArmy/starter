@extends('layouts.format')


@section('meta-title', 'Create your Profile')


@section('content')

  <div class="main-container">
        <div class="register-fluid">

                @include('partials.errors')

                <div class="header">
                    <h4 class="form--title">Create your Profile</h4>
                </div><!-- /.header -->

            <div class="row">
                {!! Form::open(['method' => 'POST', 'route' => ['profile.store']]) !!}

                {{-- Address --}}
                <div class="form-group form-group-lg">
                    {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>


                {{-- City --}}
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
                    {!! Form::select('country', ['United Kingdom' => 'United Kingdom', 'United States' => 'United States', 'France' => 'France', 'Sweden' => 'Sweden', 'Norway' => 'Norway', 'Netherlands' => 'Netherlands', 'Germany' => 'Germany', 'Austria' => 'Austria'], 'S', ['class' => 'form-control']) !!}
                </div>

                {{-- Phone --}}
                <div class="form-group form-group-lg">
                    {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>


                {{-- Bio--}}
                <div class="form-group form-group-lg">
                    {!! Form::label('bio', 'Bio:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
                </div>

                {{-- Twitter_username--}}
                <div class="form-group form-group-lg">
                    {!! Form::label('twitter_username', 'Twitter Username:', ['class' => 'control-label']) !!}
                    {!! Form::text('twitter_username', null, ['class' => 'form-control']) !!}
                </div>


                {{-- github_username--}}
                <div class="form-group form-group-lg">
                    {!! Form::label('github_username', 'Github_username:', ['class' => 'control-label']) !!}
                    {!! Form::text('github_username', null, ['class' => 'form-control']) !!}

                </div>

                {{-- Submit Button --}}
                <div class="button-centre">
                    {!! Form::submit('Create Profile', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div><!-- /.row -->

        </div><!-- /.register-fluid -->
  </div><!-- /.main-container -->
@endsection