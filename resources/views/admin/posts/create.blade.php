@extends('layouts.format')

@section('meta-title', 'Create your Post')

@section('content')


        <div class="main-container">
            <div class="register-fluid">
                 <div class="header">
                    <h4 class="form--title">Create a Post</h4>
                    <h5 class="is--black">Remember to adjust media types</h5>
                </div><!-- /.header -->


                <div class="row">

                        {!! Form::model($post = new \App\Post,  ['files'=>true, 'url' => 'admin/posts']) !!}
                        @include('admin.posts.form', ['submitButtonText' => 'Publish Post'])
                        {!! Form::close() !!}



                </div><!-- /.row -->
            </div><!-- /.register-fluid -->
        </div><!-- /.sign-container -->



@endsection


