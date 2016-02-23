@extends('dashboardLayout')

@section('title')
    Submit Comment
@endsection

@section('content')
    <div class="row">
        <h1>Messages</h1>
        <ul id="comments">
            @foreach($comments as $comment)
                <li class="cmmnt">
                    <div class="avatar"><a href="javascript:void(0);"><img src="http://lorempixel.com/55/55/people" width="55" height="55" alt="DarkCubes photo avatar"></a></div>
                    <div class="cmmnt-content">
                        <header><a href="#" class="userlink">{{$comments->first()->user->first_name}} {{$comments->first()->user->middle_name}} {{$comments->first()->user->last_name}}</a> - <span class="pubdate">{{$comment->created_at->diffForHumans()}}</span></header>
                        <p>{{$comment->description}}</p>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>


    <div class="row">
        <h1>Write Comment</h1>
        <form action="/comment/{{$id}}"   method="POST" class="form login-form">
            <div class="form-group">
                <textarea name="description" rows="10" class="form-control"></textarea>
                {{ csrf_field() }}
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection