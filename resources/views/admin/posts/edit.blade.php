@extends('layouts.format')

@section('meta-title', 'Edit your Post')

@section('content')


    <div class="main-container">
        <div class="register-fluid">
            <div class="header">
               <h4 class="leader">Edit {{ $post->title }}</h4>
            </div>

            @is('admin')
                <div class="row">
                    {!! Form::model($post, array('route' => array('admin.posts.update', $post->id), 'method' => 'PUT')) !!}
                    @include('admin.posts.form', ['submitButtonText' => 'Update'])
                    {!! Form::close() !!}
                </div>
                <div class="row">
                    <div class="button-center">
                        {!! delete_form(['admin.posts.destroy', $post->id]) !!}
                    </div><!-- /.button-center -->

                </div><!-- /.row -->
            @else
                <br>
                <h3 class="is--black is--centre">'You do not have the required permissions to edit this blog'</h3>
                <br>
            @endis
        </div><!-- /.register-fluid -->
    </div><!-- /.main-container -->



@endsection

