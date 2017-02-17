@extends('layouts.app')

@section('header')
    <title>{{ Auth::user()->name }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">This Note</div>
                    <div class="panel-body">

                        @foreach($notes as $note)
                            <p> ID : {{$note->id}}</p>
                            <p> Content : {{$note->content}}</p>
                            <p> User ID : {{$note->user_id}}</p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
