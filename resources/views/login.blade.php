@extends('mainLayout')

@section('title')
    Login
@endsection

@section('content')
    <div id="login-wraper">
        <form action="/login" method="POST" class="form login-form">
            <legend>Login to <span class="blue">Plexus</span></legend>

            <?php if(Session::get('RegisterSuccess')){
            ?>
            <div class="alert alert-success">
                <?php
                echo Session::get('RegisterSuccess');
                ?>
            </div>
            <?php
            }?>


            <?php if(Session::get('LoginError')){
                ?>
                <div class="alert alert-danger">
                <?php
                echo Session::get('LoginError');
                ?>
                </div>
                <?php
            }?>
            <div class="body">
                @if ($errors->has())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <label>Email</label>
                <input value="{{ old('email')}}" name="email" type="text">

                <label>Password</label>
                <input name="password" type="password">
                {{ csrf_field() }}
            </div>

            <div class="footer">
                <button type="submit" class="btn btn-success btn-large">Login</button>
            </div>

        </form>
    </div>
@endsection