@extends('layouts.app')

@section('header')
    <title>{{ Auth::user()->name }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Notes</div>
                    <div class="panel-body">

                        @foreach($user_data as $post)
                            <p>{{ $post->content }}
                                <a href="notes/{{ $post->id }}/delete" class="pull-right" style="margin-left: 10px">Delete</a>
                                <a href="notes/{{ $post->id }}/edit" class="pull-right"> Edit </a>
                            </p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->name }}</div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="post" action="/add">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Add New Post</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="content" required
                                           autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" name="AddPost" class="btn btn-primary">
                                        Add Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
