@extends('layouts.vendor')

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
<form method="POST" action="{{ route('vendor.documentuploads2')}}" enctype="multipart/form-data" >
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
                                       
                                         @foreach($Doc_Descs2 as $Doc_Desc)
                                        <option value="{{$Doc_Desc->id}}"> {{$Doc_Desc->Doc_Desc}} </option> 
                                        @endforeach     
                                                                         
                                </select>
                                    @error('FormID')
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

                                <div id="optional">
                                <label>{{ __('Expiration') }}</label>
                                <input id="Expiration" type="Date" class="form-control @error('Expiration') is-invalid @enderror "  name="Expiration">
                                    <small class="text-danger"><small> If Applicable</small> </small>
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

                                <label>{{ __('Coverage') }}</label>
                                <input type="number" class="form-control" name="Coverage" placeholder="Succeeding Hour" maxlength="10"     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                    <small class="text-danger"><small> If Applicable</small> </small>
                                    @error('Coverage')
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

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="text-info"> My Work Area & Technical Documents  </h4>                             
                </div> 


                              

                <div class="content" >  
        <div class="col-md-12">
            <div class="row">
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">    
                            <thead>  
                                <th> Document Description</th>
                                <th> Type</th>                                
                                <th> Coverage</th>                                  
                                <th> Expiration</th>  
                                <th> Country</th>                                                                                              
                                <th> Status </th>
                            </thead>
                            <tbody>
                                @foreach( $document2 as $documents)
                                <tr></tr>
                                    <td>  {{ $documents->Doc_Desc}}  </td>                                 
                                    <td>  {{ $documents->Type}} </td> 
                                    <td>  {{ $documents->Coverage}} </td>                                     
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
                     {{ $document2->links() }}
                </div>

            </div>
        </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>




@endsection



