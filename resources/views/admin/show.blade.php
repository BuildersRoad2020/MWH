@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('admin.update', [$showdetailedcontractor]) }}">
                            @csrf
                            @method('PUT')
<div class="content">
    <div class="container-fluid">   
        <div class="row">
            <div class="col-md-2 pull-right">
                <select name="status" class="form-control @error('status') is-invalid @enderror col-md-6 offset-md-0" onchange="this.form.submit()">
                    <option value=""> --Select-- </option>
                    <option value="0" {{ '0' == old('status', $showdetailedcontractor->status) ? 'selected' : '' }}> <font class="badge badge-warning" style="font-size:90%"> On Hold </font> </option>
                    <option value="1" {{ '1' == old('status', $showdetailedcontractor->status) ? 'selected' : '' }}> <font class="badge badge-success" style="font-size:90%"> Approved </font> </option>                 
                </select>           
            </div>
        </div>
    </div>
</div>
<br />

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">Contractor Details
                                    <div class="pull-right">
                                        <i class="{{ $showdetailedcontractor->status == 1 ? 'fa fa-circle text-info'     : ''}} "> </i> {{ $showdetailedcontractor->status == 1 ? 'Active'  : ''}} 
                                        <i class="{{ $showdetailedcontractor->status == 0 ? 'fa fa-circle text-warning'  : ''}}">  </i> {{ $showdetailedcontractor->status == 0 ? 'onHold'  : ''}} 
                                    </div>
                                </h4>  
                            </div>

        <div class="content">  
                     <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Contractor Name') }}</label>
                            <input id="contractor_name" type="text" class="form-control" name="contractor_name" value="{{ old('contractor_name', $showdetailedcontractor->contractor_name  )}}" placeholder="{{ $showdetailedcontractor->contractor_name}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Contact Person') }}</label>
                            <input id="Name_primarycontact" type="text" class="form-control" name="Name_primarycontact" value="{{ old('Name_primarycontact', $showdetailedcontractor->Name_primarycontact  )}}" placeholder="{{ $showdetailedcontractor->Name_primarycontact}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Contact Number') }}</label>
                            <input id="phone_primary" type="text" class="form-control" name="phone_primary" value="{{ old('Name_primarycontact', $showdetailedcontractor->phone_primary  )}}" placeholder="{{ $showdetailedcontractor->phone_primary}}" disabled>
                            </div>
                        </div>
 
                         <div class="col-md-3">
                            <div class="form-group">
                            <label>{{ __('Contact Email') }}</label>
                            <input id="email_primary" type="text" class="form-control" name="email_primary" value="{{ old('email_primary', $showdetailedcontractor->email_primary  )}}" placeholder="{{ $showdetailedcontractor->email_primary}}" disabled>
                            </div>
                        </div>
                    </div>   

                     <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">   
                            <label>{{ __('Address') }}</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $showdetailedcontractor->address  )}}" placeholder="{{ $showdetailedcontractor->address}}" disabled>
                            </div>
                        </div>    

                        <div class="col-md-2">
                            <div class="form-group">   
                            <label>{{ __('City') }}</label>
                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $cityname->name  )}}" placeholder="{{ $cityname->name}}" disabled>
                            </div> 
                        </div>          

                        <div class="col-md-2">
                            <div class="form-group">   
                            <label>{{ __('State') }}</label>
                            <input id="state" type="text" class="form-control" name="state" value="{{ old('state', $statename->name  )}}" placeholder="{{ $statename->name}}" disabled>
                            </div> 
                        </div>  

                        <div class="col-md-2">
                            <div class="form-group">   
                            <label>{{ __('Country') }}</label>
                            <input id="country" type="text" class="form-control" name="country" value="{{ old('country', $countryname->country  )}}" placeholder="{{ $countryname->country}}" disabled>
                            </div> 
                        </div>  

                        <div class="col-md-1">
                            <div class="form-group">   
                            <label>{{ __('POST CODE') }}</label>
                            <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode', $showdetailedcontractor->postcode  )}}" placeholder="{{ $showdetailedcontractor->postcode}}" disabled>
                            </div> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">   
                            <label>{{ __('Alternate Contact') }}</label>
                            <input id="Name_secondarycontact" type="text" class="form-control" name="Name_secondarycontact" value="{{ old('Name_secondarycontact', $showdetailedcontractor->Name_secondarycontact  )}}" placeholder="{{ $showdetailedcontractor->Name_secondarycontact}}" disabled>
                            </div>
                        </div>   

                        <div class="col-md-2">
                            <div class="form-group">   
                            <label>{{ __('Alternate Contact Number') }}</label>
                            <input id="Name_secondarycontact" type="text" class="form-control" name="Name_secondarycontact" value="{{ old('Name_secondarycontact', $showdetailedcontractor->Name_secondarycontact  )}}" placeholder="{{ $showdetailedcontractor->Name_secondarycontact}}" disabled>
                            </div>
                        </div>  

                         <div class="col-md-3">
                            <div class="form-group">   
                            <label>{{ __('Alternate Email') }}</label>
                            <input id="email_secondary" type="text" class="form-control" name="email_secondary" value="{{ old('email_secondary', $showdetailedcontractor->email_secondary  )}}" placeholder="{{ $showdetailedcontractor->email_secondary}}" disabled>
                            </div>
                        </div>
                    </div> 
        </div>
    </div> <!--card end-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">Financial Details
                                </h4>  
                            </div>

       <div class="content">  
                     <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('ABN') }}</label>
                            <input id="abn" type="text" class="form-control" name="abn" value="{{ old('abn', $showdetailedcontractor->abn  )}}" placeholder="{{ $showdetailedcontractor->abn}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Bank') }}</label>
                            <input id="bankname" type="text" class="form-control" name="bankname" value="{{ old('bankname', $showdetailedcontractor->bankname  )}}" placeholder="{{ $showdetailedcontractor->bankname}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label>{{ __('Account Name') }}</label>
                            <input id="accountname" type="text" class="form-control" name="accountname" value="{{ old('accountname', $showdetailedcontractor->accountname  )}}" placeholder="{{ $showdetailedcontractor->accountname}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Account Number') }}</label>
                            <input id="accountnumber" type="text" class="form-control" name="accountnumber" value="{{ old('accountnumber', $showdetailedcontractor->accountnumber  )}}" placeholder="{{ $showdetailedcontractor->accountnumber}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Branch') }}</label>
                            <input id="branch" type="text" class="form-control" name="branch" value="{{ old('branch', $showdetailedcontractor->branch  )}}" placeholder="{{ $showdetailedcontractor->branch}}" disabled>
                            </div>
                        </div>
                    </div>


                     <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('BSB') }}</label>
                            <input id="bsb" type="text" class="form-control" name="bsb" value="{{ old('bsb', $showdetailedcontractor->bsb  )}}" placeholder="{{ $showdetailedcontractor->bsb}}" disabled>
                            </div>
                        </div>


                        <div class="col-md-1">
                            <div class="form-group">
                            <label>{{ __('Currency') }}</label>
                            <input id="currency" type="text" class="form-control" name="currency" value="{{ old('currency', $showdetailedcontractor->currency  )}}" placeholder="{{ $showdetailedcontractor->currency}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label>{{ __('Payment Terms') }}</label>
                            <input id="terms" type="text" class="form-control" name="terms" value="{{ old('terms', $showdetailedcontractor->terms  )}}" placeholder="{{ $showdetailedcontractor->terms}}" disabled>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div> <!--financial details end-->


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">Skill Set
                                </h4>  
                            </div>                               
                
                <table class="table table table-hover table-striped">
                    <tbody>
                         
                                <tr> 
                                        <td>    <div class="checkbox">
                                                <input type="hidden" value="0" name="MP"> <input type="checkbox" id="MP" name="MP" value="1" {{ '1' ==old('MP', $showskillset->MP  ) ? 'checked' : ' ' }} disabled> 
                                                <label for="MP"></label>
                                                </div>
                                        </td>
                                        <td> Media Player and Screen Installation</td>
                                </tr>
                                <tr> 
                                        <td>    <div class="checkbox">
                                                <input type="hidden" value="0" name="VW">  <input type="checkbox"  id="VW" name="VW" value="1" {{ '1' ==old('VW', $showskillset->VW  ) ? 'checked' : ' ' }} disabled> 
                                                <label for="VW"></label>
                                                </div>
                                         </td>
                                        <td> Videowall Installation</td>
                                </tr>
                                <tr> 
                                        <td>    <div class="checkbox">
                                                <input type="hidden" value="0" name="KIO"> <input type="checkbox"  id="KIO" name="KIO" value="1" {{ '1' ==old('KIO', $showskillset->KIO  ) ? 'checked' : ' ' }} disabled> 
                                                <label for="KIO"></label>
                                            </div></td>
                                        <td> Kiosk Installation</td>
                                </tr>
                                <tr> 
                                        <td>    <div class="checkbox">  
                                                <input type="hidden" value="0" name="LED">  <input type="checkbox"  id="LED" name="LED" value="1" {{ '1' ==old('LED', $showskillset->LED  ) ? 'checked' : ' ' }} disabled>  
                                                <label for="LED"></label>
                                            </div></td>
                                        <td> LED installation</td>
                                </tr>
                                <tr> 
                                        <td>    <div class="checkbox">  
                                                <input type="hidden" value="0" name="AUD"> <input type="checkbox"  id="AUD" name="AUD" value="1" {{ '1' ==old('AUD', $showskillset->AUD  ) ? 'checked' : ' ' }} disabled>  
                                                <label for="AUD"></label>
                                            </div></td>
                                        <td> Audio Equipment Installation</td>
                                </tr>
                                <tr> 
                                        <td>    <div class="checkbox"> 
                                                <input type="hidden" value="0" name="CAB"> <input type="checkbox"  id="CAB" name="CAB" value="1" {{ '1' ==old('CAB', $showskillset->CAB  ) ? 'checked' : ' ' }} disabled>  
                                                <label for="CAB"></label>
                                            </div></td>
                                        <td> Cabling (Non-Electrical)</td>
                                </tr>
                                <tr> 
                                        <td>     <div class="checkbox">  
                                                 <input type="hidden" value="0" name="NDIA"> <input type="checkbox" id="NDIA" name="NDIA" value="1" {{ '1' ==old('NDIA', $showskillset->NDIA  ) ? 'checked' : ' ' }} disabled>
                                                 <label for="NDIA"></label> </div></td>
                                        <td> Networking Device Installation and Administration</td>
                                </tr>
                                <tr> 
                                        <td>     <div class="checkbox">  
                                                 <input type="hidden" value="0" name="BPC"> <input type="checkbox"  id="BPC" name="BPC" value="1" {{ '1' ==old('BPC', $showskillset->BPC  ) ? 'checked' : ' ' }} disabled> 
                                                 <label for="BPC"></label>
                                             </div></td>
                                        <td> Basic PC Skills</td>
                                </tr>
                                <tr> 
                                         <td>    <div class="checkbox">  
                                                 <input type="hidden" value="0" name="APC"> <input type="checkbox"  id="APC" name="APC" value="1" {{ '1' ==old('APC', $showskillset->APC  ) ? 'checked' : ' ' }} disabled>  
                                                 <label for="APC"></label>
                                             </div></td>
                                        <td> Advanced PC Skills</td>
                                </tr>
                                <tr> 
                                         <td>    <div class="checkbox">  
                                                 <input type="hidden" value="0" name="DAR"> <input type="checkbox" id="DAR" name="DAR" value="1" {{ '1' ==old('DAR', $showskillset->DAR  ) ? 'checked' : ' ' }} disabled>  
                                                 <label for="DAR"></label>
                                             </div></td>
                                        <td> Decommissioning and Relocation</td>
                                </tr>
                                <tr> 
                                         <td>    <div class="checkbox">  
                                                 <input type="hidden" value="0" name="EW"> <input type="checkbox" id="EW" name="EW" value="1" {{ '1' ==old('EW', $showskillset->EW  ) ? 'checked' : ' ' }} disabled>  
                                                 <label for="EW"></label>
                                             </div></td>
                                        <td> Electrical Works</td>
                                </tr>
                                <tr> 
                                         <td>    <div class="checkbox">  
                                                 <input type="hidden" value="0" name="PROJ"> <input type="checkbox" id="PROJ" name="PROJ" value="1" {{ '1' ==old('PROJ', $showskillset->PROJ  ) ? 'checked' : ' ' }} disabled> 
                                                 <label for="PROJ"></label></div></td>
                                        <td> Projector/Lamp installation and Troubleshooting</td>
                                </tr>
                                <tr> 
                                         <td>    <div class="checkbox">  
                                                 <input type="hidden" value="0" name="STOR"> <input type="checkbox" id="STOR" name="STOR" value="1" {{ '1' ==old('STOR', $showskillset->STOR  ) ? 'checked' : ' ' }} disabled> 
                                                 <label for="STOR"></label></div></td>
                                        <td> Storage</td>
                                </tr>
                                <tr> 
                                         <td>     <div class="checkbox">  
                                                  <input type="hidden" value="0" name="DEL"> <input type="checkbox"  id="DEL" name="DEL" value="1" {{ '1' ==old('DEL', $showskillset->DEL  ) ? 'checked' : ' ' }} disabled> 
                                                  <label for="DEL"></label> 
                                              </div></td>
                                        <td> Delivery</td>
                                </tr>

                                <tr> 
                                         <td>    <div class="checkbox">  
                                                 <input type="hidden" value="0" name="RDIS"> <input type="checkbox"  id="RDIS" name="RDIS" value="1" {{ '1' ==old('RDIS', $showskillset->RDIS  ) ? 'checked' : ' ' }} disabled> <label for="RDIS"></label> </div></td>
                                        <td> Rubbish Disposal</td>
                                </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div> <!--Skill Set End-->
<div class="card">
<div class="content table-responsive table-full-width">
                    
            <table class="table table-hover table-striped">    
                            <thead>  

                                <th> Document Description</th>
                                <th> Type</th>                                
                                <th> Coverage</th>                                  
                                <th> Expiration</th>                                
                                <th> Status </th>
                            </thead>
                            <tbody>
                                @foreach($review as $Reviews)
                                <tr>
                             
                                    <td>   {{$Reviews->Doc_Desc }}</td>   
                                    <td>  {{$Reviews->Type }}</td>                                       
                                    <td>  {{$Reviews->Coverage }}</td>     
                                    <td>  {{$Reviews->Expiration }}</td>                                                                       
                                    <td>                               
                                        <i class=" {{ $Reviews->Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $Reviews->Status == 0 ? 'None'  : ''}}
                                        <a href="{{ asset('storage/app/documents/') . '/' . $Reviews->FileName}}" target="_blank"> 
                                        <i class=" {{ $Reviews->Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $Reviews->Status == 1 ? 'For Review'  : ''}} </a>

                                        <a href="{{ asset('storage/app/documents/') . '/' . $Reviews->FileName}}" target="_blank"> 
                                        <i class=" {{ $Reviews->Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $Reviews->Status == 2 ? 'Approved'  : ''}} </a>

                                        <a href="{{ asset('storage/app/documents/') . '/' . $Reviews->FileName}}" target="_blank"> 
                                        <i class=" {{ $Reviews->Status == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $Reviews->Status == 3 ? 'Rejected'  : ''}} </a>

                                        <a href="{{ asset('storage/app/documents/') . '/' . $Reviews->FileName}}" target="_blank"> 
                                        <i class=" {{ $Reviews->Status == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $Reviews->Status == 4 ? 'Expiring'  : ''}} </a>

                                        <a href="{{ asset('storage/app/documents/') . '/' . $Reviews->FileName}}" target="_blank"> 
                                        <i class=" {{ $Reviews->Status == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $Reviews->Status == 5 ? 'Expired'  : ''}} </a>   
                                        </td>                         

                                  
                        
 @endforeach
                            </tbody>
                    </table>
 {{ $review->links() }}            
    

</div>
</div>
</div>
</div>
</div>
</form>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.check').click(function() {
        $('.check').not(this).prop('checked', false);
    });
});

$(document).ready(function(){
    $('.check2').click(function() {
        $('.check2').not(this).prop('checked', false);
    });
});
</script>
@endsection

