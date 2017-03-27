
@include('partials.errors')

<!-- Title -->
<div class="form-group form-group-lg">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body -->
<div class="form-group form-group-lg">
    {!! Form::label('Body', 'Body:', ['class' => 'control-label']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Image -->
<div class="form-group form-group-lg">
    {!! Form::label('Product Image', 'Image:', ['class' => 'control-label'] ) !!}
    {!! Form::file('feat_image', null, ['class' => 'form-control']) !!}
</div><!-- /.form-group -->

<!-- Tag Pluck -->
<div class="form-group form-group-lg">
    {!! Form::label('tag_pluck', 'Tags:', ['class' => 'control-label']) !!}
    {!! Form::select('tag_pluck[]', $tags, null, ['id' => 'tag_pluck','class' => 'form-control', 'multiple']) !!}
</div><!-- /.form-group -->



<!-- Published_at -->
<div class="form-group form-group-lg">
    {!! Form::label('published_at', 'Publish On:', ['class' => 'control-label']) !!}
    {!! Form::input('date','published_at', $post->published_at, ['class' => 'form-control']) !!}
</div>


<!-- button-centre -->
<div class="button-centre">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary', 'data-confirm' => 'Are you sure about that?']) !!}
</div>

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


    <script type="text/javascript">
        $('#tag_pluck').select2();
    </script>

@endsection