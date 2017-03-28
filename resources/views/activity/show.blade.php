@extends ('layouts.format')

@section('meta-title', 'My Activity History')

@section('content')

        <div class="header">
            <h1 class="profile--title">Activity History</h1>

        </div><!-- /.header -->
        <div class="activity-container">
            <ul class="list-group">
                @include('activity.list')
            </ul>
        </div><!-- /.activity-container -->


@stop


