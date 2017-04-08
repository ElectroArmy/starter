@extends('layouts.format')

@section('meta-title', 'Edit your Post')

@section('content')

<div class="main-container">
    <div class="register-fluid">
        <div class="header">
            <h4 class="leader">Edit {{ $post->title }}</h4>
        </div>
        <div class="row">
                    @can('update', $post)
                        {!! Form::model($post, array('route' => array('admin.posts.update', $post->id), 'method' => 'PUT')) !!}
                        @include('admin.posts.form', ['submitButtonText' => 'Update'])
                        {!! Form::close() !!}
                    @endcan

                    @cannot('update', $post)
                            <h3 class="is--black is--centre">'You do not have the required permissions to update this blog'</h3>
                    @endcannot

        </div><!-- /.row -->
        <div class="row">
                @can('delete', $post)
                    <div class="button-center">
                        {!! delete_form(['admin.posts.destroy', $post->id]) !!}
                    </div><!-- /.button-center -->
                @endcan
        </div><!-- /.row -->

    </div><!-- /.register-fluid -->
</div><!-- /.main-container -->



@endsection

