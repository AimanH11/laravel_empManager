@extends('layouts.app')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div> @endif
<div class="form4 top">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="form-bg">
                    <form class="form" action="{{route('employees.update', [$employeeArr->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required placeholder="Your Name"
                                value='{{$employeeArr->name}}'>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Email Address"
                                value='{{$employeeArr->email}}'>
                            <div class="form-group col-md-4">
                                <label for="example-date-input">Date of Joining</label>
                                <input data-provide="datepicker" data-date-format="yyyy-mm-dd " name="date_of_joining"
                                    class="form-control datepicker" value="{{$employeeArr->date_of_joining}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea class="form-control" required name="bio">{{$employeeArr->bio}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-center btn-blue">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
