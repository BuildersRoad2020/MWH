@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <form method="POST" action="{{ route('admin.storeusers')}}">
            @csrf
            <button type="submit" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-add-user"> </i> Add User </button>
        </div>
        <br>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="card">
                        <div class="header">
                            <div class="col-md-offset-5">
                                <h4 class="text-info"> Add Users</h4>  
                            </div>
                        </div>

                        <div class="content">  
                            <div class="col-md-offset-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Full Name') }}</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Full Name">
                                            @error('name')
                                            <span class="text-danger small" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Email') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Enter Email Address">
                                            @error('email')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Role') }}</label>
                                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                                <option value="">--Select--</option> 
                                                <option value="2">Vendor</option>
                                                <option value="1">Admin</option>
                                            </select> 
                                            @error('role')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>




@endsection
