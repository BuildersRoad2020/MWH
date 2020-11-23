@extends('layouts.vendor')

@section('content')<div class="content">
    <div class="container-fluid">
<form method="POST" action="{{ route('vendor.storetechnicians')}}">
                    @csrf
<button type="submit" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-add-user"> </i> Add Technician </button>
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
                                <h4 class="text-info"> Add Technician</h4>  
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
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>


                     <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>{{ __('Country Code') }}</label>
                            <input id="phone" type="text" class="form-control @error('countrycode') is-invalid @enderror" name="countrycode"  placeholder="Country Code" maxlength="3">
                                @error('countrycode')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                            <label>{{ __('Mobile Number') }}</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  placeholder="Enter Phone Number" maxlength="10">
                                @error('phone')
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

        </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>

@endsection
