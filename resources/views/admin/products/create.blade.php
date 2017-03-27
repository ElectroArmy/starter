@extends('layouts.format')

@section('meta-title', 'Create Game')

@section('content')

<div class="main-container">
        <div class="register-fluid">
                @include('partials.errors')
                <div class="header">
                    <h4 class="leader">Create a Key</h4>
                </div><!-- /.header -->

                <div class="row">
                    {!! Form::open(array('route' => 'admin.products.store', 'class' => 'form', 'novalidate' => 'novalidate', 'files' => true)) !!}



                    <div class="form-group form-group-lg">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Key Name')) !!}
                    </div>

                    <div class="form-group form-group-lg">
                        {!! Form::label('platform', 'Platform', ['class' => 'control-label']) !!}
                        {!! Form::text('platform', null, array('required', 'class'=>'form-control', 'placeholder'=>'Platform')) !!}
                    </div>

                    <div class="form-group form-group-lg">
                        {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Enter a very short description')) !!}
                    </div>

                    <div class="form-group form-group-lg">
                        {!! Form::label('sku', 'SKU', ['class' => 'control-label']) !!}
                        {!! Form::text('sku', null, array('required', 'class'=>'form-control', 'placeholder'=>'PSN-1234')) !!}
                    </div>


                    <div class="form-group form-group-lg">
                        {!! Form::label('price', 'Price in £', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            {!! Form::text('price', null, array('required', 'class'=>'form-control', 'placeholder'=>'9.99')) !!}
                        </div>
                    </div>


                    <div class="form-group form-group-lg">
                        {!! Form::label('image', 'Image (.png)', ['class' => 'control-label']) !!}
                        {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
                    </div>


                    <div class="button-centre">
                        <label for="is_downloadable" class="control-label">
                            {!! Form::checkbox('is_downloadable', true, null, array('id'=>'downloadable')) !!}
                            is Downloadable
                        </label>
                    </div><!-- /.button-centre -->



                    <div class="button-centre">
                        {!! Form::submit('Create Game', array('class'=>'btn btn-primary')) !!}
                    </div><!-- /.button-centre -->

                    {!! Form::close() !!}
                </div><!-- /.row -->
        </div><!-- /.register-fluid -->
    </div><!-- /.main-container -->

@endsection

