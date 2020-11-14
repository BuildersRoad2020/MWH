@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
<form method="POST" action="{{ route('admin.storecontractors')}}">
                    @csrf
<button type="submit" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-link"> </i> Add Contractor </button>
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
                                <h4 class="text-info ">Add Contractors</h4>  
                                </div>
                            </div>

        <div class="content">  
              <div class="col-md-offset-0">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>{{ __('Contractor Name') }}</label>
                            <input id="contractor_name" type="text" class="form-control @error('contractor_name') is-invalid @enderror" name="contractor_name"  placeholder="Contractor Name">
                                @error('contractor_name')
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
                            <label>{{ __('Select Account') }}</label>
                                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                        <option value="">--Select--</option> 
                                        @foreach($passuserstatus as $pass)
                                        <option value= "{{ $pass->id}}" >  <?= $pass['name'] ?>  </option>
                                         @endforeach
                                 </select> 
                                @error('user_id')
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

