@extends('layouts.admin')

@section('content')


<!-- Button trigger modal -->
<div class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#Add">
            <i class="pe-7s-plus"> </i> New Document
        </button>
    </div>
</div>
<br/>



<!-- Add Document Modal -->
<form method="POST" action="{{ route('admin.newdocument') }}" enctype="multipart/form-data" >
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
                                <label for="Doc_Desc">{{ __('Document Description') }}  </label>
                                <input type="text" name="Doc_Desc" id="Doc_Desc" class="form-control @error('Doc_Desc') is-invalid @enderror">
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
                             
                                <label for="type">{{ __('Type') }}  </label>
                                <select name="Type" id="type" class="form-control @error('type') is-invalid @enderror">
                                      
                                        <option value="">--Type--</option>
                                       
                                         @foreach($types as $type)
                                        <option value="{{$type->type}}"> {{$type->type}} </option> 
                                        @endforeach     
                                                                         
                                </select>    
                                     @error('Type')
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
                                    <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                    @error('FileName')
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

                                <label for="Country">{{ __('Country') }}  </label>
                                <select name="Country" id="Country" class="form-control @error('Country') is-invalid @enderror">
                                      
                                        <option value="" selected>--Country--</option>
                                         @foreach($countries as $country)
                                        <option value="{{$country->id}}"> {{$country->country}}</option> 
                                        @endforeach                                        
                                </select>
                                    @error('Country')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror                    
                                    @if (count($errors) > 0)
                                    <script type="text/javascript">
                                    $('#Add').modal('show');
                                    </script>
                                    @endif                                    

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
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">{{ config('app.name') }} Forms and Documents  </h4>
                            </div>
   

   
       
        <div class="content table-responsive table-full-width">
            <div class="row">
                    <div class="form-group col-md-12">
                        <div class="col-md-6 col-md-offset-3">
                <form action="{{ route('admin.forms') }}" method="GET" role="search" class="form-inline">
                @csrf                            
                        <label for="type" class="col-md-offset-1">{{ __('Filter By') }}
                                <select name="type" class="form-control @error('type') is-invalid @enderror">
                                      
                                        <option value="" selected>--Type--</option>
                                         @foreach($types as $type)
                                        <option value="{{$type->type}}"> {{$type->type}}</option> 
                                        @endforeach                                        
                                </select></label>
                       
                       
                        <label for="country" class="col-md-offset-1">{{ __('Filter By') }}
                                <select name="country"  class="form-control @error('country') is-invalid @enderror">
                                        <option value="" selected>--Country--</option>
                                        @foreach($countries as $country)             
                                        <option value="{{$country->country}}"> {{$country->country}}</option> 
                                        @endforeach                                           
                                </select> </label>
                                      
                                              <button type="submit" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-arrow-right"></i> Go  </button> 
                                             

                </form>

                        </div>
                    </div>
            </div>
                @if(isset($forms))
             <table class="table table-hover table-striped">   

                            <thead>  
                                <th > Document Description</th>
                                <th> Type</th>
                                <th > File</th>                                
                                <th> Country</th>     
                                <th colspan="2" class="text-center"> Action </th>                            
                            </thead>
                            <tbody>
                                @foreach($forms as $form)
                                <tr>  </tr>
                                    <td>  {{$form->Doc_Desc }} </td>                                 
                                    <td>  {{$form->Type }}</td>   
                                    <td> <small><i class=" {{$form->FileName == null ? 'fa fa-circle text-secondary' : ' '}}"></i> {{$form->FileName == null ? 'None' : ''}} 
                                        <a href="{{ asset('storage/app/forms/') . '/' . $form->FileName}}" target="_blank"> 
                                        <i class=" {{ $form->FileName != Null ? 'fa fa-circle text-info'  : ''}}">   </i>   {{$form->FileName == null ? '' : 'View'}}  </a>
                                    </small> </td>  
                                    <td>  {{$form->country }} </td>  
                                    <td> 
                                        <button type="button" class="btn btn-danger btn-simple btn-xs pull-right" data-toggle="modal" data-target="#Remove{{$form->id}}" title="Remove" value="{{$form->id}}">
                                        <i class="fa fa-times"></i>
                                        </button> 
                                    </td>         
                                    <td class="pull-left">
                                        <button type="button" class="btn btn-info btn-simple btn-xs pull-right" data-toggle="modal" data-target="#Upload{{$form->id}}" title="Edit" value="{{$form->id}}">
                                        <i class="fa fa-edit"></i>
                                        </button> 
                            
                                    </td>  
                                    <tr></tr>
                                @endforeach                  
                    @endif  
                            </tbody>

                            <!--Modal Delete-->
                                     @foreach($forms as $form)
                                     <form method="POST" action="{{ route('admin.deletedocument') }}">
                                        @csrf
                                        @method('delete') 
                                        <div class="modal fade" id="Remove{{$form->id}}" tabindex="-1" role="dialog" aria-labelledby="RemoveLabel" aria-hidden="true" data-backdrop="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="text-center text-white" id="RemoveLabel"> Are you sure you want to remove? </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>        
                                                        <button type="submit" class="btn btn-info" value="{{$form->id}}" name="id">Yes</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </form>       
                                     @endforeach   
                            <!--Modal Upload-->  
                                     @foreach($forms as $form)
                                     <form method="POST" action="{{ route('admin.updatedocument') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT') 
                                        <div class="modal fade" id="Upload{{$form->id}}" tabindex="-1" role="dialog" aria-labelledby="UploadLabel" aria-hidden="true" data-backdrop="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="text-center text-white" id="UploadLabel"> Update Form for {{$form->Doc_Desc}} in {{$form->country}} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                <label>{{ __('Select File') }}</label>                                               
                                                <input type="text"  name="Doc_Desc" value="{{$form->Doc_Desc}}" placeholder="{{$form->Doc_Desc}}" class="hidden" >
                                                <input type="File" name="FileName" class="form-control @error('FileName') is-invalid @enderror "  >
                                                    <small class="text-danger"><small> Document should be in PDF Format | Max size 2 MB</small> </small>
                                                     @error('FileName')
                                                    <small class="text-danger">
                                                    {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>                                                    
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>        
                                                        <button type="submit" class="btn btn-info" value="{{$form->id}}" name="id">Yes</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </form>  
                                    @endforeach    
                                                                          
                    </table>

                   {{ $forms->links() }}
        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection