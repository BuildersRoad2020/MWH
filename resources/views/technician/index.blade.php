@extends('layouts.technician')

@section('content')
<div class="content">
    <div class="container-fluid">    

        <form method="POST" action="{{ route('technician.update')}}"> <button type="submit" class="btn btn-info btn-fill pull-right"> Update </button>  <br> 
            @csrf
            @method('PUT')                                 
        </div> <br> 

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="text-info">My Contractor Details   </h4>                      
                    </div>

                    <div class="content">    

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ __('Contractor Name') }}</label>
                                    <input id="contractor_name" type="text" class="form-control @error('contractor_name') is-invalid @enderror" name="contractor_name" value="{{ old('contractor_name', $contractors->contractor_name  )}}" placeholder="Contractor Name" disabled>
                                    @error('contractor_name')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $technicians->name  )}}" placeholder="name">
                                    @error('contractor_name')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>                            
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>{{ __('Country Code') }}</label>
                                    <input id="countrycode" type="text" class="form-control @error('countrycode') is-invalid @enderror" name="countrycode" value="{{ old('countrycode', $technicians->countrycode  )}}" placeholder="countrycode">
                                    @error('contractor_name')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>                            
                            </div>       
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Phone') }}</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $technicians->phone  )}}" placeholder="phone">
                                    @error('Phone')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>                            
                            </div>        

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Email') }}</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $technicians->email  )}}" placeholder="email" disabled>
                                    @error('email')
                                    <small class="text-danger small">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>                            
                            </div>                                                              



                        </div>
                    </form>                    
                </div>
            </div> 
            <div class="content">

                <button type="button" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#Add">
                    <i class="pe-7s-plus"> </i> Upload Document
                </button>

                <!-- Add Document Modal -->
                <form method="POST" action="{{ route('technician.upload')}}" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT') 
                    <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="AddTitle" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="Add">Add A New Document</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="FormID">{{ __('Document Description') }}  </label>
                                    <select name="FormID" id="FormID" class="form-control @error('FormID') is-invalid @enderror">

                                        <option value="">--Select--</option>

                                        @foreach($Doc_Descs as $Doc_Desc)
                                        <option value="{{$Doc_Desc->id}}"> {{$Doc_Desc->Doc_Desc}} </option> 
                                        @endforeach     
                                        
                                    </select>
                                    @error('Doc_Desc')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror   
                                    @if (count($errors) > 0)
                                    <script type="text/javascript">
                                        $('#Add').modal('show');
                                    </script>
                                    @endif
                                    <br />                             

                                    <label>{{ __('Select File') }}</label>
                                    <input id="FileName" type="File" class="form-control @error('FileName') is-invalid @enderror "  name="FileName"  >
                                    <small class="text-info"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                    @error('FileName') <br/>
                                    <small class="text-danger small" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                    @if (count($errors) > 0)
                                    <script type="text/javascript">
                                        $('#Add').modal('show');
                                    </script>
                                    @endif                                    
                                    <br/>

                                    <div id="optional">
                                        <label>{{ __('Expiration') }}</label>



                                        <input id="Expiration" type="Date" class="form-control @error('Expiration') is-invalid @enderror "  name="Expiration"  >
                                        <small class="text-info"><small> If Applicable</small> </small>

                                        @error('Expiration')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        @if (count($errors) > 0)
                                        <script type="text/javascript">
                                            $('#Add').modal('show');
                                        </script>
                                        @endif                                    
                                        <br/>

                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>




                <!--End Add Document Modal -->


                <div class="col-md-12">  <br>
                    <div class="row">  <div class="card">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">    
                                <thead>  
                                    <th> Document Description</th>                                                               
                                    <th> Expiration</th>  
                                    <th> Country</th>                                                                                              
                                    <th> Status </th>
                                </thead>
                                <tbody>
                                    @foreach( $document as $documents)
                                    <tr></tr>
                                    <td>  {{ $documents->Doc_Desc}}  </td>                                                                   
                                    <td>  {{ $documents->Expiration}}  </td> 
                                    <td>  {{ $documents->Country}}  </td>                                     
                                    <td> <a href="{{ asset('storage/app/documents/') . '/' . $documents->FileName}}" download>
                                        <i class=" {{ $documents->Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $documents->Status == 1 ? 'For Review'  : ''}} 
                                        <i class=" {{ $documents->Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $documents->Status == 2 ? 'Approved'  : ''}}                               
                                        <i class=" {{ $documents->Status == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $documents->Status == 3 ? 'Rejected'  : ''}}    
                                        <i class=" {{ $documents->Status == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $documents->Status == 4 ? 'Expiring'  : ''}}  
                                        <i class=" {{ $documents->Status == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>  {{ $documents->Status == 5 ? 'Expired'  : ''}}    </a>                                                                                              
                                    </td>

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $document->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>        


    </div>
</div>
</div>




@endsection