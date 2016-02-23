@extends('dashboardLayout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <h1>Submit General Query to Support</h1>
        <form action="/general-query" method="POST" class="form login-form">
            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" name="subject">
            </div>
            <div class="form-group">
                <label>Subject</label>
                <textarea name="description" rows="10" class="form-control"></textarea>
                {{ csrf_field() }}
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection