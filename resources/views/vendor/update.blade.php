@extends('layouts.vendor')

@section('content')


<div class="content">
    <div class="container-fluid">
<form method="POST" action="{{ route('vendor.update')}}">
                    @csrf
                    @method('PUT')
<button type="submit" class="btn btn-info btn-fill pull-right"> Update </button>
    </div>
<br>
</div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">

                                <h4 class="text-info">Contractor Details</h4>  
                            </div>



        <div class="content">  
                     <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>{{ __('Contractor Name') }}</label>
                            <input id="contractor_name" type="text" class="form-control @error('contractor_name') is-invalid @enderror" name="contractor_name" value="{{ old('contractor_name', $contractors->contractor_name  )}}" placeholder="Contractor Name">
                                @error('contractor_name')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Contact Person') }}</label>
                            <input id="Name_primarycontact" type="text" class="form-control @error('Name_primarycontact') is-invalid @enderror" name="Name_primarycontact" value="{{ old('Name_primarycontact', $contractors->Name_primarycontact  )}}" placeholder="Full Name">
                                @error('Name_primarycontact')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                      


                        <div class="col-md-3"> <label>{{ __('Contact Number') }}</label>
                            <div class="form-group">
                            

                            <div class="col-md-3">
                            <input id="phone_primary_countrycode" type="text" class="form-control @error('phone_primary_countrycode') is-invalid @enderror" name="phone_primary_countrycode" value="{{ old('countrycode', $contractors->countrycode  )}}" maxlength="3"> <small><small><small class="text-info small">Country Code</small></small></small>  </div>
                            <div class="col-md-7">
                            <input id="phone_primary" type="text" class="form-control @error('phone_primary') is-invalid @enderror" name="phone_primary" value="{{ old('phone_primary', $contractors->phone_primary  )}}" maxlength="12">
                            <small><small><small class="text-info small">Phone Number</small></small></small> <br>
                                @error('phone_primary')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                                </div>
                            </div>
                            </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label>{{ __('Contact Email') }}</label>
                            <input id="email_primary" type="email" class="form-control @error('email_primary') is-invalid @enderror" name="email_primary" placeholder="{{$passemailfromusers->email}}" disabled>
                                @error('email_primary')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>                            
                        </div>


                    

                    <div class="row">
                     <div class="col-md-3">
                            <div class="form-group">
                            <label>{{ __('Street Name') }}</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $contractors->address  )}}" placeholder="Street Name">
                                @error('address')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Country') }} </label>
                            <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">             
                                       @foreach($countries as $key =>$country)  @if($key > 0) 
                                    <option value="{{ $country->id }}" > {{ $country->id}} </option>  @endif
                                        @endforeach         
                            </select> 
                            <span id="loadercountry"><i class="fa fa-spinner fa-3x fa-spin"></i></span>
                                @error('country')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2" id="state">
                            <div class="form-group">
                            <label>{{ __('State') }}  </label>
                            <select name="state" id="state" class="form-control @error('state') is-invalid @enderror">  
                                        @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->id }}</option>
                                        @endforeach 
                            </select> 
                            <span id="loaderstate"><i class="fa fa-spinner fa-3x fa-spin"></i></span>
                                @error('state')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2" id="city">
                            <div class="form-group">
                            <label>{{ __('City') }}  </label>
                            <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->id }}</option>
                                    @endforeach 
                                    </select> 
                                @error('city')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('POST CODE') }}</label>
                                    <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode', $contractors->postcode  )}}">
                                @error('postcode')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>{{ __('Alt. Contact Person') }}</label>
                                    <input id="Name_secondarycontact" type="text" class="form-control @error('Name_secondarycontact') is-invalid @enderror" name="Name_secondarycontact" value="{{ old('Name_secondarycontact', $contractors->Name_secondarycontact  )}}" placeholder="Alternate Contact Person(Full Name)">
                                @error('Name_secondarycontact')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3"> <label>{{ __('Alternate Contact Number') }}</label>
                            <div class="form-group">
                            

                            <div class="col-md-3">
                            <input type="text" class="form-control @error('countrycodesecondary') is-invalid @enderror" name="countrycodesecondary" value="{{ old('countrycodesecondary', $contractors->countrycodesecondary  )}}" maxlength="3"> <small><small><small class="text-info small">Country Code</small></small></small>  </div>
                            <div class="col-md-7">
                            <input id="phone_secondary" type="text" class="form-control @error('phone_secondary') is-invalid @enderror" name="phone_secondary" value="{{ old('phone_secondary', $contractors->phone_secondary  )}}" maxlength="12">
                            <small><small><small class="text-info small">Phone Number</small></small></small> <br>
                                @error('phone_secondary')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                                </div>
                            </div>
                            </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Alternate Email') }}</label>
                                <input id="email_secondary" type="email" class="form-control @error('email_secondary') is-invalid @enderror" name="email_secondary" value="{{ old('email_secondary', $contractors->email_secondary  )}}" placeholder="Alternate Email Address">
                                @error('email_secondary')
                                    <small class="text-danger small">
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

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">Financial Details</h4>  
                            </div>
         <div class="content">  

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('ABN') }}</label>
                               <input id="abn" type="text" class="form-control @error('abn') is-invalid @enderror" name="abn" value="{{ old('abn', $contractors->abn  )}}" placeholder="ABN">
                                @error('abn')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Payment Terms') }}</label>
                                <select name="terms" class="form-control @error('terms') is-invalid @enderror">                 
                                        <option value="" disabled selected>--Select--</option> 
                                        <option value="7 Days" {{ '7 Days' == old('terms', $contractors->terms) ? 'selected' : '' }}> 7 Days </option>
                                        <option value="15 Days" {{ '15 Days' == old('terms', $contractors->terms) ? 'selected' : '' }}>  15 Days </option>
                                        <option value="30 Days" {{ '30 Days' == old('terms', $contractors->terms) ? 'selected' : '' }}>  30 Days </option>
                                 </select> 
                                @error('terms')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Currency') }}</label>
                                <select name="currency" class="form-control @error('currency') is-invalid @enderror">
                                      
                                        <option value="" disabled selected>--Select--</option> 

                                        <option value="CAD" {{ 'CAD' == old('currency', $contractors->currency) ? 'selected' : '' }}> CND </option>
                                        <option value="NZD" {{ 'NZD' == old('currency', $contractors->currency) ? 'selected' : '' }}>  NZD </option>
                                        <option value="AUD" {{ 'AUD' == old('currency', $contractors->currency) ? 'selected' : '' }}>  AUD </option>
                                        <option value="USD" {{ 'USD' == old('currency', $contractors->currency) ? 'selected' : '' }}>  USD </option>                                      
                                 </select> 
                                @error('currency')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Bank Name') }}</label>
                                <input id="bankname" type="text" class="form-control @error('bankname') is-invalid @enderror" name="bankname" value="{{ old('bankname', $contractors->bankname  )}}">
                                @error('bankname')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Branch') }}</label>
                                <input id="branch" type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch', $contractors->branch  )}}">
                                @error('branch')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('BSB') }}</label>
                                <input id="bsb" type="text" class="form-control @error('bsb') is-invalid @enderror" name="bsb" value="{{ old('bsb', $contractors->bsb  )}}">
                                @error('bsb')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Account Number') }}</label>
                                <input id="accountnumber" type="text" class="form-control @error('accountnumber') is-invalid @enderror" name="accountnumber" value="{{ old('accountnumber', $contractors->accountnumber  )}}">
                                @error('accountnumber')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>{{ __('Account Name') }}</label>
                                <input id="accountname" type="text" class="form-control @error('accountname') is-invalid @enderror" name="accountname" value="{{ old('accountname', $contractors->accountname  )}}">
                                @error('accountname')
                                    <small class="text-danger small">
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
          


</div>
<a href="{{ route('vendor.index')}} " type="submit" class="btn btn-outline-info pull-right"> <i class="pe-7s-left-arrow"> </i>  Back </a>
</div>






@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
 <script type="text/javascript">
    $('#loadercountry').hide();
    $('#loaderstate').hide();
    $('div[id="state"]').hide();
    $('div[id="city"]').hide();
    $(document).ready(function() {
    $('select[name="country"]').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/vendor/update/'+countryId,
                type:"GET",
                dataType:"json",


                success:function(data) {

                    $('select[name="state"]').empty();
                    $('div[id="state"]').fadeIn();

                    $.each(data, function(key, value){

                        $('select[name="state"]').append('<option value="'+ key +'">' + key + '</option>');

                    });
                },
                complete: function(){
                    $('#loadercountry').show().delay(300).fadeOut();

                }
            });
        } else {
            $('select[name="state"]').empty();
        }

    });

});


     $(document).ready(function() {
    
    $('select[name="state"]').on('click', function(){
        var stateId = $(this).val();
        if(stateId) {
            $.ajax({
                url: '/vendor/update/states/'+stateId,
                type:"GET",
                dataType:"json",

                success:function(data) {

                    $('select[name="city"]').empty();
                    $('div[id="city"]').fadeIn();

                    $.each(data, function(key, value){
                   
                        $('select[name="city"]').append('<option value="'+ key +'">' + key + '</option>');

                    });
                },
                complete: function(){
                    $('#loaderstate').show().delay(300).fadeOut();
                }
            });
        } else {
            $('select[name="city"]').empty();
        }

    });

});

 </script>
 
@endsection