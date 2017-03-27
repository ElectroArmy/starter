@extends('layouts.format')


@section('meta-title', 'Support')


@section('content')

    <div class="main-container">


            <div class="register-fluid">

                @include('partials.errors')

                <div class="header">
                    <h4 class="form--title --centre">Support</h4>
                    <small> Problems ?</small>
                </div>

                <div class="row">
                    {!! Form::open(array('route' => 'support_store', 'class' => 'form', 'novalidate' => 'novalidate')) !!}
                    @include('partials.errors')

                    <div class="form-group form-group-lg">
                        {!! Form::label('Your Name', 'Name:', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, array('required', 'class' => 'form-control', 'placeholder' => 'Your Name')) !!}
                    </div><!-- /.form-group form-group-lg-->

                    <div class="form-group form-group-lg">
                        {!! Form::label('Your E-mail Address', 'E-mail Address:', ['class' => 'control-label']) !!}
                        {!! Form::text('email', null, array('required', 'class'=> 'form-control',
                                    'placeholder' => 'Your E-mail Address')) !!}
                    </div><!-- /.form-group form-group-lg-->

                    <div class="form-group form-group-lg">
                        {!! Form::label('Your Problem', 'Problem:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('problem', null, array('required', 'class' => 'form-control',
                                'placeholder' => 'Your Problem')) !!}
                    </div><!-- /.form-group form-group-lg-->

                    <div class="button-centre">
                        {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
                    </div><!-- /.form-group form-group-lg-->
                    {!! Form::close() !!}
                </div><!-- /.row -->
            </div><!-- /.register-fluid -->
    </div>
    <!-- /.main-container -->
@endsection


