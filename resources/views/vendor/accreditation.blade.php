@extends('layouts.vendor')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">My Accreditation Forms  </h4>
                            </div> 

       <div class="content">  
                    <!--SWMS_BPSM Start-->
                     <div class="row">
                        <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') 
                        <div class="col-md-6" id="SWMS_BPSM">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> SWMS Building, Property and Site Maintenance  </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->SWMS_BPSM_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->SWMS_BPSM_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_BPSM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_BPSM_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->SWMS_BPSM_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_BPSM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_BPSM_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->SWMS_BPSM_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_BPSM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_BPSM_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->SWMS_BPSM_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_BPSM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_BPSM_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->SWMS_BPSM_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_BPSM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_BPSM_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->SWMS_BPSM_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->SWMS_BPSM_STATUS == 1 || $contractordocument->SWMS_BPSM_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="SWMS_BPSM_DOC" type="file" class="form-control @error('SWMS_BPSM_DOC') is-invalid @enderror "  name="SWMS_BPSM_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('SWMS_BPSM_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->SWMS_BPSM_DOC == 1 || $contractordocument->SWMS_BPSM_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>
                           </form>
                        </div>                            
                    
                      
                    <!--SWMS_CE_DOC Start-->                      

                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')  
                        <div class="col-md-6" id="SWMS_CE">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> SWMS Communication Equipment  </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->SWMS_CE_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->SWMS_CE_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_CE_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_CE_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->SWMS_CE_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_CE_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_CE_STATUS == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->SWMS_CE_STATUS == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_CE_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_CE_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->SWMS_CE_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_CE_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_CE_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->SWMS_CE_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SWMS_CE_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SWMS_CE_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->SWMS_CE_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->SWMS_CE_STATUS == 1 || $contractordocument->SWMS_CE_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="SWMS_CE_DOC" type="file" class="form-control @error('SWMS_CE_DOC') is-invalid @enderror "  name="SWMS_CE_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('SWMS_CE_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->SWMS_CE_DOC == 1 || $contractordocument->SWMS_CE_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>
                        </div>  
                        </form>                          
                    </div>
                    

                    <!--FIN_FORM_DOC Start-->                      
                    <div class="row">
                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')  
                     
                        <div class="col-md-6" id="FIN_FORM">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> Financial Detail Confirmation Form </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->FIN_FORM_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->FIN_FORM_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->FIN_FORM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->FIN_FORM_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->FIN_FORM_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->FIN_FORM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->FIN_FORM_STATUS == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->FIN_FORM_STATUS == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->FIN_FORM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->FIN_FORM_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->FIN_FORM_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->FIN_FORM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->FIN_FORM_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->FIN_FORM_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->FIN_FORM_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->FIN_FORM_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->FIN_FORM_STATUS == 5 ? 'Expired'  : ''}} </a>    
                           <p><Small><a href="#" download> Download Form</a> </Small></p>  <!--Pending-->                      
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->FIN_FORM_STATUS == 1 || $contractordocument->FIN_FORM_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="FIN_FORM_DOC" type="file" class="form-control @error('FIN_FORM_DOC') is-invalid @enderror "  name="FIN_FORM_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('FIN_FORM_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->FIN_FORM_DOC == 1 || $contractordocument->FIN_FORM_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>
                        </div>                            

                    </form>
                    <!--SWMS Start--> 
                        <div class="col-md-6" id="SWMS">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> Safe Work Method Statements Validity </h5>
                           <p>{{ $contractordocument-> SWMS }}</p>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
 
            

    <div class="card"> 
            <div class="header">
            <h4 class="text-info"> <i class="pe-7s-plus" id="plus"></i> <i class="pe-7s-refresh" id="minus"></i> My Electrical Contractor License </h4>
            </div> 
        <div id="electrical">
                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')             
                    <div class="row">
                        <div class="col-md-6" id="NSW_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> NSW Electrical Contractor License </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->NSW_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->NSW_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NSW_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NSW_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->NSW_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NSW_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NSW_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->NSW_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NSW_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NSW_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->NSW_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NSW_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NSW_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->NSW_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NSW_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NSW_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->NSW_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->NSW_ECL_STATUS == 1 || $contractordocument->NSW_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="NSW_ECL_DOC" type="file" class="form-control @error('NSW_ECL_DOC') is-invalid @enderror "  name="NSW_ECL_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('NSW_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->NSW_ECL_DOC == 1 || $contractordocument->NSW_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 

                   </form>

                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')        
                        <div class="col-md-6" id="VIC_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> VIC Electrical Contractor License </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->VIC_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->VIC_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->VIC_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->VIC_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->VIC_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->VIC_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->VIC_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->VIC_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->VIC_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->VIC_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->VIC_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->VIC_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->VIC_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->VIC_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->VIC_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->VIC_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->VIC_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->VIC_ECL_STATUS == 1 || $contractordocument->VIC_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="VIC_ECL_DOC" type="file" class="form-control @error('VIC_ECL_DOC') is-invalid @enderror "  name="VIC_ECL_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('VIC_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->VIC_ECL_DOC == 1 || $contractordocument->VIC_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 
                    </form>
                   </div>
                    <!--end VIC -->
                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')             
                    <div class="row">
                        <div class="col-md-6" id="QLD_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> QLD Electrical Contractor License </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->QLD_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->QLD_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->QLD_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->QLD_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->QLD_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->QLD_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->QLD_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->QLD_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->QLD_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->QLD_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->QLD_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->QLD_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->QLD_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->QLD_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->QLD_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->QLD_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->QLD_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->QLD_ECL_STATUS == 1 || $contractordocument->QLD_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="QLD_ECL_DOC" type="file" class="form-control @error('QLD_ECL_DOC') is-invalid @enderror "  name="QLD_ECL_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('QLD_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->QLD_ECL_DOC == 1 || $contractordocument->QLD_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 

                   </form>

                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')        
                        <div class="col-md-6" id="TAS_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> TAS Electrical Contractor License </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->TAS_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->TAS_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TAS_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TAS_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->TAS_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TAS_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TAS_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->TAS_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TAS_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TAS_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->TAS_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TAS_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TAS_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->TAS_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TAS_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TAS_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->TAS_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->TAS_ECL_STATUS == 1 || $contractordocument->TAS_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="TAS_ECL_DOC" type="file" class="form-control @error('TAS_ECL_DOC') is-invalid @enderror "  name="TAS_ECL_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('TAS_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->TAS_ECL_DOC == 1 || $contractordocument->TAS_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 
                    </form>
                   </div>
                         
                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')             
                    <div class="row">
                        <div class="col-md-6" id="WA_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> WA Electrical Contractor License </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->WA_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->WA_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->WA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->WA_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->WA_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->WA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->WA_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->WA_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->WA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->WA_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->WA_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->WA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->WA_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->WA_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->WA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->WA_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->WA_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->WA_ECL_STATUS == 1 || $contractordocument->WA_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="WA_ECL_DOC" type="file" class="form-control @error('WA_ECL_DOC') is-invalid @enderror "  name="WA_ECL_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('WA_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->WA_ECL_DOC == 1 || $contractordocument->WA_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 

                   </form>

                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')        
                        <div class="col-md-6" id="SA_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> SA Electrical Contractor License </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->SA_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->SA_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SA_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->SA_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SA_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->SA_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SA_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->SA_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SA_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->SA_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->SA_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->SA_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->SA_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->SA_ECL_STATUS == 1 || $contractordocument->SA_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="SA_ECL_DOC" type="file" class="form-control @error('SA_ECL_DOC') is-invalid @enderror "  name="SA_ECL_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('SA_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->SA_ECL_DOC == 1 || $contractordocument->SA_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 
                    </form>
                   </div>

                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')             
                    <div class="row">
                        <div class="col-md-6" id="NT_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> NT Electrical Contractor License </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->NT_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->NT_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NT_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->NT_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NT_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->NT_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NT_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->NT_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NT_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->NT_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NT_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->NT_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->NT_ECL_STATUS == 1 || $contractordocument->NT_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="NT_ECL_DOC" type="file" class="form-control @error('NT_ECL_DOC') is-invalid @enderror "  name="NT_ECL_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('NT_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->NT_ECL_DOC == 1 || $contractordocument->NT_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 

                   </form>

                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')        
                        <div class="col-md-6" id="ACT_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> ACT Electrical Contractor License  </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->ACT_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->ACT_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->ACT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->ACT_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->ACT_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->ACT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->ACT_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->ACT_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->ACT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->ACT_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->ACT_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->ACT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->ACT_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->ACT_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->ACT_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->ACT_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->ACT_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->ACT_ECL_STATUS == 1 || $contractordocument->ACT_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="ACT_ECL_DOC" type="file" class="form-control @error('ACT_ECL_DOC') is-invalid @enderror "  name="ACT_ECL_DOC"  >
                            <small class="text-danger"><small>  Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('ACT_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->ACT_ECL_DOC == 1 || $contractordocument->ACT_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 
                    </form>
                   </div>

                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')             
                    <div class="row">
                        <div class="col-md-6" id="NZ_ECL">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> NZ Electrical Contractor License </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->NZ_ECL_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->NZ_ECL_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NZ_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NZ_ECL_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->NZ_ECL_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NZ_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NZ_ECL_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->NZ_ECL_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NZ_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NZ_ECL_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->NZ_ECL_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NZ_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NZ_ECL_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->NZ_ECL_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->NZ_ECL_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->NZ_ECL_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->NZ_ECL_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->NZ_ECL_STATUS == 1 || $contractordocument->NZ_ECL_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="NZ_ECL_DOC" type="file" class="form-control @error('NZ_ECL_DOC') is-invalid @enderror "  name="NZ_ECL_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('NZ_ECL_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->NZ_ECL_DOC == 1 || $contractordocument->NZ_ECL_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 
                    </div>
                   </form>                   
        </div> <!-- end electrical div id -->
    </div>
 <div class="card"> 
            <div class="header">
            <h4 class="text-info"> My Third Party Accreditation </h4>
            </div> 

                    <form action="{{ route('vendor.accreditationupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')             
                    <div class="row">
                        <div class="col-md-6" id="TPA">
                           <div class="form-group col-md-4">
                           <h5 class="text-success"> Third Party Accreditation </h5>
                           <label>{{ __('Status:') }}</label>
                           <i class=" {{ $contractordocument->TPA_STATUS == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $contractordocument->TPA_STATUS == 0 ? 'None'  : ''}}

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TPA_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TPA_STATUS == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $contractordocument->TPA_STATUS == 1 ? 'For Review'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TPA_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TPA_Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $contractordocument->TPA_Status == 2 ? 'Approved'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TPA_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TPA_STATUS == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->TPA_STATUS == 3 ? 'Rejected'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TPA_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TPA_STATUS == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $contractordocument->TPA_STATUS == 4 ? 'Expiring'  : ''}} </a>

                           <a href="{{ asset('storage/app/public/') . '/' . $contractordocument->TPA_DOC}}" target="_blank"> 
                           <i class=" {{ $contractordocument->TPA_STATUS == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $contractordocument->TPA_STATUS == 5 ? 'Expired'  : ''}} </a>                           
                           </div>

                           <div class="form-group col-md-4" {{ $contractordocument->TPA_STATUS == 1 || $contractordocument->TPA_STATUS == 2 ? 'Hidden'  : '' }}>
                            <input id="TPA_DOC" type="file" class="form-control @error('TPA_DOC') is-invalid @enderror "  name="TPA_DOC"  >
                            <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                @error('TPA_DOC')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            <p></p>
                            <button type="submit" class="btn btn-info btn-fill pull-right  {{ $contractordocument->TPA_DOC == 1 || $contractordocument->TPA_DOC == 2 ? 'Hidden'  : '' }}"> {{ __('Upload Document') }}
                                </button>
                           </div>                         
                        </div> 

                    </form>
                    </div>
                </div>
        </div>

    </div>
</div>
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$('i[id="minus"]').hide();
$('div[id="electrical"]').hide();
$(document).ready(function() {
        $('i[id="plus"]').click(function() {
        $('div[id="electrical"]').fadeIn();
            $('i[id="minus"]').fadeIn();
            $('i[id="plus"]').hide();
        });

        $('i[id="minus"]').click(function() {
        $('div[id="electrical"]').fadeOut();
            $('i[id="minus"]').hide()
            $('i[id="plus"]').fadeIn();
        });
    });
</script>
@endsection
