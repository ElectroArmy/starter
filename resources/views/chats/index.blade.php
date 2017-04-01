@extends('layouts.format')

@section('content')

    <div class="header">
        <h1 class="form--title is--beige">Live Chat</h1>
        <h3 class="is--beige">Avaliable between 0900 AND 1700 Monday to Friday</h3>
    </div><!-- /.header -->

    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chatroom
                            <span class="badge pull-right">@{{ usersInRoom.length }}</span>
                        </div>

                        <chat-log :messages="messages"></chat-log>
                        <chat-composer v-on:messagesent="addMessage"></chat-composer>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}"></script>
@stop

