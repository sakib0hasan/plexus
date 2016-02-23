@extends('mainLayout')

@section('title')
    Homepage
@endsection

@section('content')
    <div id="login-wraper">
        <form class="form login-form">
            <legend>Welcome to <span class="blue">Plexus</span></legend>

            <div class="body">
                Register to access the member's dashboard <a href="/register" type="submit" class="btn btn-success btn-large">Register</a>
            </div>

            <div class="footer">
                Already have an account? <a href="/login" type="submit" class="btn btn-success btn-large">Login</a>
            </div>
        </form>
    </div>
@endsection