@extends('layouts.vendor')

@section('content')   
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">My Insurance Documents   </h4>
                                
                       

                            </div> 

                        <!-- Public Liability Insurance -->
            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped"> 
                        <thead> <th colspan="2"> <h5 class="text-info"> Public Liability Insurance </h5> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->PLI_Status == 1 || $contractors->PLI_Status == 2 ? 'Hidden'  : '' }}> 


                        <input id="PLI_Doc" type="file" class="form-control @error('PLI_Doc') is-invalid @enderror "  name="PLI_Doc"  >
                        <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('PLI_Doc')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                        <tr></tr>

                        <td> Expiration Date </td>
                        <td colspan="3">
                                <input id="PLI_Exp" type="date" class="form-control @error('PLI_Exp') is-invalid @enderror" name="PLI_Exp" value="{{ old('PLI_Exp', $contractors->PLI_Exp  )}}" {{ $contractors->PLI_Status == 1 || $contractors->PLI_Status == 2 ? 'Disabled'  : '' }}  >
                                @error('PLI_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror
                        <tr></tr>

                        <td> Public Liability Insurance Coverage(AUD) </td>
                        <td colspan="3"> 
                                <input id="PLI_Cover" type="text" class="form-control @error('PLI_Cover') is-invalid @enderror" name="PLI_Cover" value="{{ old('PLI_Cover', $contractors->PLI_Cover  )}}" {{ $contractors->PLI_Status == 1 || $contractors->PLI_Status == 2 ? 'Disabled'  : '' }}>
                                @error('PLI_Cover')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror
                        <tr></tr>

                        <td> Status </td>
                        <td colspan="3">  
                        
                           <i class=" {{ $contractors->PLI_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->PLI_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->PLI_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->PLI_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->PLI_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->PLI_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->PLI_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->PLI_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->PLI_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->PLI_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->PLI_Status == 3 ? 'Rejected'  : ''}}  </a>         

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->PLI_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->PLI_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->PLI_Status == 4 ? 'Expiring'  : ''}}  </a>      
                            
                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->PLI_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->PLI_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->PLI_Status == 5 ? 'Expired'  : ''}}  </a>                                                           

                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractors->PLI_Status == 1 || $contractors->PLI_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                        </td>
                        <tr></tr>
                    </td></td></th>
                    </table>
           </div></form>
       </div>
   </div>
</div>
</div>
           
                        <!-- Public Indemnity Insurance -->     
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
       
            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped"> 
                        <thead> <th colspan="2"> <h5 class="text-info"> <i class="pe-7s-plus" id="plus"></i> <i class="pe-7s-refresh" id="minus"></i> Public Indemnity Insurance </h5> </th> </thead>
                        <tr></tr>
                </table>
                <table class="table table-hover table-striped" id="PII_Table"> 
                        <th colspan="4" {{ $contractors->PII_Status == 1 || $contractors->PII_Status == 2 ? 'Hidden'  : '' }}> 


                        <input id="PII_Doc" type="file" class="form-control @error('PII_Doc') is-invalid @enderror "  name="PII_Doc"  >
                                @error('PII_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror
                        <tr></tr>

                        <td> Expiration Date </td>
                        <td colspan="3">
                                <input id="PII_Exp" type="date" class="form-control @error('PII_Exp') is-invalid @enderror" name="PII_Exp" value="{{ old('PII_Exp', $contractors->PII_Exp  )}}" {{ $contractors->PII_Status == 1 || $contractors->PII_Status == 2 ? 'Disabled'  : '' }}  >
                                @error('PII_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror
                        <tr></tr>

                        <td> Public Liability Insurance Coverage(AUD) </td>
                        <td colspan="3"> 
                                <input id="PII_Cover" type="text" class="form-control @error('PII_Cover') is-invalid @enderror" name="PII_Cover" value="{{ old('PII_Cover', $contractors->PII_Cover  )}}" {{ $contractors->PII_Status == 1 || $contractors->PII_Status == 2 ? 'Disabled'  : '' }}>
                                @error('PII_Cover')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror
                        <tr></tr>

                        <td> Status </td>
                        <td colspan="3">  
                        
                           <i class=" {{ $contractors->PII_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->PII_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->PII_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->PII_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->PII_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->PII_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->PII_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->PII_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->PII_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->PII_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->PII_Status == 3 ? 'Rejected'  : ''}}  </a>           

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->PII_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->PII_Status == 2 ? 'fa fa-circle text-warning'  : ''}}"> </i>  {{ $contractors->PII_Status == 4 ? 'Expiring'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->PII_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->PII_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->PII_Status == 5 ? 'Expired'  : ''}}  </a> 
                            <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->PII_Status == 1 || $contractors->PII_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                        </td>
                        <tr></tr>
                    </td></td></th>
                    </table>
           </div></form>
</div>
</div>
</div>
</div>


<!-- Work Coverage Registration -->      
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">             

                    <table class="table table-hover table-striped  table-bordered"> 
                        <thead> <th colspan="2"> <h5 class="text-info">  Work Area Coverage </h5> </th> </thead>
                    </table>
                         <table class="table table-hover"> 
                            <thead colspan="9">  </thead>

                                        <td>  
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')      <div class="checkbox">
                                                <input type="hidden" value="0" name="NSW_Area">
                                                <input type="checkbox" onchange="this.form.submit()" id="NSW_Area" name="NSW_Area" value="1" {{ '1' ==old('NSW_Area', $contractors->NSW_Area) ? 'checked' : '' }} > 
                                                <label for="NSW_Area"> NSW </label>
                                         </div>
                                     </td> 
                            </form> 

                                        <td>  
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                                <div class="checkbox">
                                                <input type="hidden" value="0" name="VIC_Area">
                                                <input type="checkbox" class="form-check-input" onchange="this.form.submit()" id="VIC_Area" name="VIC_Area" value="1" {{ '1' ==old('VIC_Area', $contractors->VIC_Area) ? 'checked' : '' }} > 
                                        <label for="VIC_Area">VIC </label></div></td>   
                            </form>

                                        <td> 
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                                <div class="checkbox">
                                                <input type="hidden" value="0" name="QLD_Area">
                                                <input type="checkbox" class="form-check-input" onchange="this.form.submit()" id="QLD_Area" name="QLD_Area" value="1" {{ '1' ==old('QLD_Area', $contractors->QLD_Area) ? 'checked' : '' }} > 
                                        <label for="QLD_Area"> QLD</label></div> 
                                        </td>   
                            </form>

                                        <td>  
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                                <div class="checkbox">
                                                <input type="hidden" value="0" name="TAS_Area">
                                                <input type="checkbox" class="form-check-input" onchange="this.form.submit()" id="TAS_Area" name="TAS_Area" value="1" {{ '1' ==old('TAS_Area', $contractors->TAS_Area) ? 'checked' : '' }} > 
                                     <label for="TAS_Area"> TAS </label></div> </td>   
                            </form>

                                        <td>  
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                                <div class="checkbox">
                                                <input type="hidden" value="0" name="WA_Area">
                                                <input type="checkbox" class="form-check-input" onchange="this.form.submit()" id="WA_Area" name="WA_Area" value="1" {{ '1' ==old('WA_Area', $contractors->WA_Area) ? 'checked' : '' }} > 
                                        <label for="WA_Area">WA</label></div> </td>   
                            </form>

                                        <td>  
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                                <div class="checkbox">
                                                <input type="hidden" value="0" name="SA_Area">
                                                <input type="checkbox" class="form-check-input" onchange="this.form.submit()" id="SA_Area" name="SA_Area" value="1" {{ '1' ==old('SA_Area', $contractors->SA_Area) ? 'checked' : '' }} >
                                       <label for="SA_Area">SA</label></div> </td>   
                            </form>

                                        <td> 
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                                <div class="checkbox">
                                                <input type="hidden" value="0" name="NT_Area">
                                                <input type="checkbox" class="form-check-input" onchange="this.form.submit()" id="NT_Area" name="NT_Area" value="1" {{ '1' ==old('NT_Area', $contractors->NT_Area) ? 'checked' : '' }} > 
                                       <label for="NT_Area"> NT</label></div> </td>   
                            </form>

                                        <td>  
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                                <div class="checkbox">
                                                <input type="hidden" value="0" name="ACT_Area">
                                                <input type="checkbox" class="form-check-input" onchange="this.form.submit()" id="ACT_Area" name="ACT_Area" value="1" {{ '1' ==old('ACT_Area', $contractors->ACT_Area) ? 'checked' : '' }} > 
                                       <label for="ACT_Area">ACT</label></div> </td>   
                            </form>

                                        <td>  
                            <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                                <div class="checkbox">
                                                <input type="hidden" value="0" name="NZ_Area">
                                                <input type="checkbox" class="form-check-input" onchange="this.form.submit()" id="NZ_Area" name="NZ_Area" value="1" {{ '1' ==old('NZ_Area', $contractors->NZ_Area) ? 'checked' : '' }} > 
                                     <label for="NZ_Area"> NZ</label></div> </td>   
                            </form>

                                        <tr></tr>
                            </table>

        <!-- NSW Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="NSW_Selected">
                        <thead class="thead-light"> <th colspan="4">  NSW Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->NSW_Status == 0 || $contractors->NSW_Status == 3 ? '' :'hidden' }} > 
                                <input id="NSW_Doc" type="file" class="form-control @error('NSW_Doc') is-invalid @enderror" name="NSW_Doc" 
                                {{ $contractors->NSW_Status == 0 || $contractors->NSW_Status == 3 ? '' :'disabled' }} >
                                @error('NSW_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror



                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="3">
                                <input id="NSW_Exp" type="date" class="form-control @error('NSW_Exp') is-invalid @enderror" name="NSW_Exp"  value="{{ old('NSW_Exp', $contractors->NSW_Exp  )}}" {{ $contractors->NSW_Status == 0 || $contractors->NSW_Status == 3 ? '' :'disabled' }} >
                                @error('NSW_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror


                        <tr></tr>
                        <th> Status </th>
                        <td colspan="3">   
                             <i class=" {{ $contractors->NSW_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->NSW_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->NSW_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->NSW_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->NSW_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->NSW_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->NSW_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->NSW_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NSW_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NSW_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->NSW_Status == 3 ? 'Rejected'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NSW_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NSW_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->NSW_Status == 4 ? 'Expiring'  : ''}}  </a>  

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NSW_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NSW_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->NSW_Status == 5 ? 'Expired'  : ''}}  </a>  

                            <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->NSW_Status == 1 || $contractors->NSW_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                                 
                        </td>
                        <tr></tr>
                    </form>
                    </table>
        <!-- VIC Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="VIC_Selected">
                        <thead class="thead-light"> <th colspan="4">  VIC Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->VIC_Status == 0 || $contractors->VIC_Status == 3 ? '' :'hidden' }} > 

                                <input id="VIC_Doc" type="file" class="form-control @error('VIC_Doc') is-invalid @enderror" name="VIC_Doc" 
                                {{ $contractors->VIC_Status == 0 || $contractors->VIC_Status == 3 ? '' :'disabled' }} >
                                @error('VIC_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="3">

                                <input id="VIC_Exp" type="date" class="form-control @error('VIC_Exp') is-invalid @enderror" name="VIC_Exp"  value="{{ old('VIC_Exp', $contractors->VIC_Exp  )}}" {{ $contractors->VIC_Status == 0 || $contractors->VIC_Status == 3 ? '' :'disabled' }} >
                                @error('VIC_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <th> Status </th>
                        <td colspan="3">   
                           <i class=" {{ $contractors->VIC_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->VIC_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->VIC_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->VIC_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->VIC_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->VIC_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->VIC_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->VIC_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->VIC_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->VIC_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->VIC_Status == 3 ? 'Rejected'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->VIC_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->VIC_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->VIC_Status == 4 ? 'Expiring'  : ''}}  </a>   

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->VIC_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->VIC_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->VIC_Status == 5 ? 'Expired'  : ''}}  </a>   

                            <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->VIC_Status == 1 || $contractors->VIC_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                                  
                        </td>
                        <tr></tr>
                    </form>
                    </table>
        <!-- QLD Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="QLD_Selected">
                        <thead class="thead-light"> <th colspan="4">  QLD Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->QLD_Status == 0 || $contractors->QLD_Status == 3 ? '' :'hidden' }} > 

                                <input id="QLD_Doc" type="file" class="form-control @error('QLD_Doc') is-invalid @enderror" name="QLD_Doc" 
                                {{ $contractors->QLD_Status == 0 || $contractors->QLD_Status == 3 ? '' :'disabled' }} >
                                @error('QLD_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="3">

                                <input id="QLD_Exp" type="date" class="form-control @error('QLD_Exp') is-invalid @enderror" name="QLD_Exp"  value="{{ old('QLD_Exp', $contractors->QLD_Exp  )}}" {{ $contractors->QLD_Status == 0 || $contractors->QLD_Status == 3 ? '' :'disabled' }} >
                                @error('QLD_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <th> Status </th>
                        <td colspan="3">   
                           <i class=" {{ $contractors->QLD_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->QLD_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->QLD_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->QLD_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->QLD_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->QLD_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->QLD_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->QLD_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->QLD_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->QLD_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->QLD_Status == 3 ? 'Rejected'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->QLD_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->QLD_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->QLD_Status == 4 ? 'Expiring'  : ''}}  </a>    

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->QLD_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->QLD_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->QLD_Status == 5 ? 'Expired'  : ''}}  </a>    

                            <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->QLD_Status == 1 || $contractors->QLD_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>                                
                        </td>
                        <tr></tr>
                    </form>
                    </table>

        <!-- TAS Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="TAS_Selected">
                        <thead class="thead-light"> <th colspan="4">  TAS Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->TAS_Status == 0 || $contractors->TAS_Status == 3 ? '' :'hidden' }} > 

                                <input id="TAS_Doc" type="file" class="form-control @error('TAS_Doc') is-invalid @enderror" name="TAS_Doc" 
                                {{ $contractors->TAS_Status == 0 || $contractors->TAS_Status == 3 ? '' :'disabled' }} >
                                @error('TAS_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="3">

                                <input id="TAS_Exp" type="date" class="form-control @error('TAS_Exp') is-invalid @enderror" name="TAS_Exp"  value="{{ old('TAS_Exp', $contractors->TAS_Exp  )}}" {{ $contractors->TAS_Status == 0 || $contractors->TAS_Status == 3 ? '' :'disabled' }} >
                                @error('TAS_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <th> Status </th>
                        <td colspan="3">   
                           <i class=" {{ $contractors->TAS_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->TAS_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->TAS_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->TAS_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->TAS_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->TAS_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->TAS_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->TAS_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->TAS_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->TAS_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->TAS_Status == 3 ? 'Rejected'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->TAS_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->TAS_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->TAS_Status == 4 ? 'Expiring'  : ''}}  </a>   

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->TAS_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->TAS_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->TAS_Status == 5 ? 'Expired'  : ''}}  </a>   

                            <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->TAS_Status == 1 || $contractors->TAS_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>                               
                        </td>
                        <tr></tr>
                    </form>
                    </table>

        <!-- WA Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="WA_Selected">
                        <thead class="thead-light"> <th colspan="4">  WA Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->WA_Status == 0 || $contractors->WA_Status == 3 ? '' :'hidden' }} > 

                                <input id="WA_Doc" type="file" class="form-control @error('WA_Doc') is-invalid @enderror" name="WA_Doc" 
                                {{ $contractors->WA_Status == 0 || $contractors->WA_Status == 3 ? '' :'disabled' }} >
                                @error('WA_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="3" >

                                <input id="WA_Exp" type="date" class="form-control @error('WA_Exp') is-invalid @enderror" name="WA_Exp"  value="{{ old('WA_Exp', $contractors->WA_Exp )}}" {{ $contractors->WA_Status == 0 || $contractors->WA_Status == 3 ? '' :'disabled' }} >
                                @error('WA_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Status </td>
                        <td colspan="3">   

                           <i class=" {{ $contractors->WA_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->WA_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->WA_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->WA_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->WA_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->WA_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->WA_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->WA_Status == 2 ? 'Verified'  : ''}} </a>


                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->WA_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->WA_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->WA_Status == 3 ? 'Rejected'  : ''}}  </a>           

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->WA_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->WA_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->WA_Status == 4 ? 'Expiring'  : ''}}  </a>   

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->WA_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->WA_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->WA_Status == 5 ? 'Expired'  : ''}}  </a>   

                           <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->WA_Status == 1 || $contractors->WA_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>                               
                        </td>
                        <tr></tr>
                    </form>
                    </table>
                

        <!-- SA Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="SA_Selected">
                        <thead class="thead-light"> <th colspan="4">  SA Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->SA_Status == 0 || $contractors->SA_Status == 3 ? '' :'hidden' }} > 

                                <input id="SA_Doc" type="file" class="form-control @error('SA_Doc') is-invalid @enderror" name="SA_Doc" 
                                {{ $contractors->SA_Status == 0 || $contractors->SA_Status == 3 ? '' :'disabled' }} >
                                @error('SA_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="3">

                                <input id="SA_Exp" type="date" class="form-control @error('SA_Exp') is-invalid @enderror" name="SA_Exp"  value="{{ old('SA_Exp', $contractors->SA_Exp  )}}" {{ $contractors->SA_Status == 0 || $contractors->SA_Status == 3 ? '' :'disabled' }} >
                                @error('SA_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Status </td>
                        <td colspan="3">   

                           <i class=" {{ $contractors->SA_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->SA_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->SA_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->SA_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->SA_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->SA_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->SA_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->SA_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->SA_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->SA_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->SA_Status == 3 ? 'Rejected'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->SA_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->SA_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->SA_Status == 4 ? 'Expiring'  : ''}}  </a>  

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->SA_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->SA_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->SA_Status == 5 ? 'Expired'  : ''}}  </a>  

                           <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->SA_Status == 1 || $contractors->SA_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>                                
                        </td>
                        <tr></tr>
                    </form>
                    </table>

        <!-- NT Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="NT_Selected">
                        <thead class="thead-light"> <th colspan="4">  NT Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->NT_Status == 0 || $contractors->NT_Status == 3 ? '' :'hidden' }} > 

                                <input id="NT_Doc" type="file" class="form-control @error('NT_Doc') is-invalid @enderror" name="NT_Doc" 
                                {{ $contractors->NT_Status == 0 || $contractors->NT_Status == 3 ? '' :'disabled' }} >
                                @error('NT_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="3">


                                <input id="NT_Exp" type="date" class="form-control @error('NT_Exp') is-invalid @enderror" name="NT_Exp"  value="{{ old('NT_Exp', $contractors->NT_Exp  )}}" {{ $contractors->NT_Status == 0 || $contractors->NT_Status == 3 ? '' :'disabled' }} >
                                @error('NT_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Status </td>
                        <td colspan="3">   
                           <i class=" {{ $contractors->NT_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->NT_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->NT_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->NT_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->NT_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->NT_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->NT_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->NT_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NT_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NT_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->NT_Status == 3 ? 'Rejected'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NT_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NT_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->NT_Status == 4 ? 'Expiring'  : ''}}  </a> 

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NT_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NT_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->NT_Status == 5 ? 'Expired'  : ''}}  </a> 

                           <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->NT_Status == 1 || $contractors->NT_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>

                        </td>
                        <tr></tr>
                    </form>
                    </table>
        <!-- ACT Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="ACT_Selected">
                        <thead class="thead-light"> <th colspan="4">  ACT Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->ACT_Status == 0 || $contractors->ACT_Status == 3 ? '' :'hidden' }} > 


                                <input id="ACT_Doc" type="file" class="form-control @error('ACT_Doc') is-invalid @enderror" name="ACT_Doc" 
                                {{ $contractors->ACT_Status == 0 || $contractors->ACT_Status == 3 ? '' :'disabled' }} >
                                @error('ACT_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="3">

                                <input id="ACT_Exp" type="date" class="form-control @error('ACT_Exp') is-invalid @enderror" name="ACT_Exp"  value="{{ old('ACT_Exp', $contractors->ACT_Exp  )}}" {{ $contractors->ACT_Status == 0 || $contractors->ACT_Status == 3 ? '' :'disabled' }} >
                                @error('ACT_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror


                        <tr></tr>
                        <td> Status </td>
                        <td colspan="3">   

                           <i class=" {{ $contractors->ACT_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->ACT_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->ACT_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->ACT_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->ACT_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->ACT_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->ACT_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->ACT_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->ACT_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->ACT_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->ACT_Status == 3 ? 'Rejected'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->ACT_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->ACT_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->ACT_Status == 4 ? 'Expiring'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->ACT_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->ACT_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->ACT_Status == 5 ? 'Expired'  : ''}}  </a>           


                            <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->ACT_Status == 1 || $contractors->ACT_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>                             
                        </td>
                        <tr></tr>
                    </form>
                    </table> 
        <!-- NZ Coverage Registration -->    
                        <form action="{{ route('vendor.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <table class="table table-bordered " name="NZ_Selected">
                        <thead class="thead-light"> <th colspan="4">  NZ Coverage</label> </th> </thead>
                        <tr></tr>
                        <th colspan="4" {{ $contractors->NZ_Status == 0 || $contractors->NZ_Status == 3 ? '' :'hidden' }} > 

                                <input id="NZ_Doc" type="file" class="form-control @error('NZ_Doc') is-invalid @enderror" name="NZ_Doc" 
                                {{ $contractors->NZ_Status == 0 || $contractors->NZ_Status == 3 ? '' :'disabled' }} >
                                @error('NZ_Doc')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Expiration Date </td>
                        <td colspan="4">

                                <input id="NZ_Exp" type="date" class="form-control @error('NZ_Exp') is-invalid @enderror" name="NZ_Exp"  value="{{ old('NZ_Exp', $contractors->NZ_Exp  )}}" {{ $contractors->NZ_Status == 0 || $contractors->NZ_Status == 3 ? '' :'disabled' }} >
                                @error('NZ_Exp')
                                    <p class="Text-Danger small">
                                        {{ $message }}
                                    </p>
                                @enderror

                        <tr></tr>
                        <td> Status </td>
                        <td colspan="3">   

                           <i class=" {{ $contractors->NZ_Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractors->NZ_Status == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->NZ_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->NZ_Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractors->NZ_Status == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractors->NZ_Doc}}" target="_blank"> 
                           <i class=" {{ $contractors->NZ_Status == 2 ? 'fa fa-circle text-success'  : ''}}"> </i>  {{ $contractors->NZ_Status == 2 ? 'Verified'  : ''}} </a>


                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NZ_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NZ_Status == 3 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->NZ_Status == 3 ? 'Rejected'  : ''}}  </a>           

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NZ_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NZ_Status == 4 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $contractors->NZ_Status == 4 ? 'Expiring'  : ''}}  </a>  

                            <a href="{{ asset('storage/app/public/') . '/' . $contractors->NZ_Doc}}" target="_blank"> 
                            <i class=" {{ $contractors->NZ_Status == 5 ? 'fa fa-circle text-danger'  : ''}}"> </i> {{ $contractors->NZ_Status == 5 ? 'Expired'  : ''}}  </a>  

                            <button type="submit" class="btn btn-info btn-fill pull-right {{ $contractors->NZ_Status == 1 || $contractors->NZ_Status == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>                           
 
                        </td>
                        <tr></tr>
                    </form>
                    </table>

                </div>
            </div>
                
        </div>


   
    </div>



</div>



@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script type="text/javascript">

        $('table[name="NSW_Selected"]').attr("hidden","");
        $('table[name="VIC_Selected"]').attr("hidden","");
        $('table[name="QLD_Selected"]').attr("hidden","");
        $('table[name="TAS_Selected"]').attr("hidden","");
        $('table[name="WA_Selected"]').attr("hidden","");
        $('table[name="SA_Selected"]').attr("hidden","");
        $('table[name="NT_Selected"]').attr("hidden","");
        $('table[name="ACT_Selected"]').attr("hidden","");
        $('table[name="NZ_Selected"]').attr("hidden","");
        $('table[id="PII_Table"]').hide();
        $('i[id="minus"]').hide();



 $(document).ready(function() {


        $('i[id="minus"]').click(function() {
            $('table[id="PII_Table"]').hide();
            $('i[id="minus"]').hide();
            $('i[id="plus"]').show();
        });

        $('i[id="plus"]').click(function() {
            $('table[id="PII_Table"]').show()
            $('i[id="minus"]').show()
            $('i[id="plus"]').hide();
        });

    $(document).ready(function() {          //retain info from DB
            if ($('input[name="NSW_Area"]').is(':checked')) {
                $('table[name="NSW_Selected"]').removeAttr("hidden");
            } 
            if ($('input[name="VIC_Area"]').is(':checked')) {
                $('table[name="VIC_Selected"]').removeAttr("hidden");
            } 
            if ($('input[name="QLD_Area"]').is(':checked')) {
                $('table[name="QLD_Selected"]').removeAttr("hidden");
            } 
            if ($('input[name="TAS_Area"]').is(':checked')) {
                $('table[name="TAS_Selected"]').removeAttr("hidden");
            } 
            if ($('input[name="WA_Area"]').is(':checked')) {
                $('table[name="WA_Selected"]').removeAttr("hidden");
            } 
            if ($('input[name="SA_Area"]').is(':checked')) {
                $('table[name="SA_Selected"]').removeAttr("hidden");
            } 
            if ($('input[name="NT_Area"]').is(':checked')) {
                $('table[name="NT_Selected"]').removeAttr("hidden");
            } 
            if ($('input[name="ACT_Area"]').is(':checked')) {
                $('table[name="ACT_Selected"]').removeAttr("hidden");
            } 
            if ($('input[name="NZ_Area"]').is(':checked')) {
                $('table[name="NZ_Selected"]').removeAttr("hidden");
            } 
        });

        //show it when the NSW checkbox is clicked
        $('input[name="NSW_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="NSW_Selected"]').removeAttr("hidden");
                $('table[name="NSW_Selected"]').fadeIn();
            } else {
                $('table[name="NSW_Selected"]').fadeOut();
            }
        });


        //show it when the VIC checkbox is clicked
        $('input[name="VIC_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="VIC_Selected"]').removeAttr("hidden");
                $('table[name="VIC_Selected"]').fadeIn();
            } else {
                $('table[name="VIC_Selected"]').fadeOut();
            }
        });

        //show it when the QLD checkbox is clicked
        $('input[name="QLD_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="QLD_Selected"]').removeAttr("hidden");
                $('table[name="QLD_Selected"]').fadeIn();
            } else {
                $('table[name="QLD_Selected"]').fadeOut();
            }
        });

        //show it when the TAS checkbox is clicked
        $('input[name="TAS_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="TAS_Selected"]').removeAttr("hidden");
                $('table[name="TAS_Selected"]').fadeIn();
            } else {
                $('table[name="TAS_Selected"]').fadeOut();
            }
        });

        //show it when the WA checkbox is clicked
        $('input[name="WA_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="WA_Selected"]').removeAttr("hidden");
                $('table[name="WA_Selected"]').fadeIn();
            } else {
                $('table[name="WA_Selected"]').fadeOut();
            }
        });

        //show it when the SA checkbox is clicked
        $('input[name="SA_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="SA_Selected"]').removeAttr("hidden");
                $('table[name="SA_Selected"]').fadeIn();
            } else {
                $('table[name="SA_Selected"]').fadeOut();
            }
        });

        //show it when the NT checkbox is clicked
        $('input[name="NT_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="NT_Selected"]').removeAttr("hidden");
                $('table[name="NT_Selected"]').fadeIn();
            } else {
                $('table[name="NT_Selected"]').fadeOut();
            }
        });

        //show it when the ACT checkbox is clicked
        $('input[name="ACT_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="ACT_Selected"]').removeAttr("hidden");
                $('table[name="ACT_Selected"]').fadeIn();
            } else {
                $('table[name="ACT_Selected"]').fadeOut();
            }
        });

                //show it when the NZ checkbox is clicked
        $('input[name="NZ_Area"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('table[name="NZ_Selected"]').removeAttr("hidden");
                $('table[name="NZ_Selected"]').fadeIn();
            } else {
                $('table[name="NZ_Selected"]').fadeOut();
            }
        });
    });



</script>
@endsection
 