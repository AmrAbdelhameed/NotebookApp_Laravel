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

                        <p> ID : {{$notes->id}}</p>
                        <p> Content : {{$notes->content}}</p>
                        <p> User ID : {{$notes->user_id}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
