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
                    <form class="form" action="{{route('employees.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Email Address">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="example-date-input">Date of Joining</label>
                            <input class="form-control" type="date" name="date_of_joining" id="example-date-input">
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea class="form-control" required name="bio" placeholder="Write message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-center btn-blue">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
