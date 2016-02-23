@extends('mainLayout')

@section('title')
Registration
@endsection

@section('content')
    <div id="login-wraper">

        <form action="/register" method="POST" class="form login-form">
            <legend>Register to <span class="blue">Plexus</span></legend>

            <div class="body">
                <?php if(Session::get('serialError')){
                ?>
                <div class="alert alert-danger">
                    <?php
                    echo Session::get('serialError');
                    ?>
                </div>
                <?php
                }?>
                @if ($errors->has())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <label>First Name</label>
                <input value="{{ old('first_name')}}" name="first_name" type="text">

                <label>Middle Name</label>
                <input value="{{ old('middle_name')}}" name="middle_name" type="text">

                <label>Last Name</label>
                <input value="{{ old('last_name')}}" name="last_name" type="text">

                <label>Email</label>
                <input value="{{ old('email')}}" name="email" type="text">

                <label>Serial No of meter</label>
                <input value="{{ old('meter_serial')}}" name="meter_serial" type="text">

                <label>Password</label>
                <input name="password" type="password">
                {{ csrf_field() }}
            </div>

            <div class="footer">
                <button type="submit" class="btn btn-success btn-large">Register</button>
            </div>

        </form>
    </div>
@endsection