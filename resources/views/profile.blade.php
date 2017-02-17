@extends('layouts.app')

@section('header')
    <title>{{ Auth::user()->name }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Data</div>
                    <div class="panel-body">

                        @foreach($notes as $note)
                            <p> Your ID : {{$note->id}}</p>
                            <p> Your Name : {{$note->name}}</p>
                            <p> Your Email : {{$note->email}}</p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
