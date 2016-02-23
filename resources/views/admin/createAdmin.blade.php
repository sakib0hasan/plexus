@extends('admin.adminDashboardLayout')

@section('title')
    Create Admin
@endsection

@section('content')
    {{Session::get('message')}}
    <form role="form" METHOD="POST" ACTION="/admin/create-admin">
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

        <label>Password</label>
        <input name="password" type="password">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">Create Admin</button>
    </form>
@endsection