@extends('layouts.vendor')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="text-info"> My Rates </h4>   <br>                         
          </div> 



            @if($count != 0)
          <div class="content" >  

            <div class="col-md-12">  

              <div class="row">
                <div class="content table-responsive table-full-width"> <div class="card">   
                  <table class="table table-hover table-striped">    
                    <thead>  
                      <th> Document Description</th>
                      <th> Status</th>   
                      <th> State Types Covered</th>   
                      
                      <th> Country  </th>     
                      <th>Metro Rates</th>   
                      <th>Regional Rates</th>  
                      <th>Remote Rates</th>                                                                            
                      <th colspan="3"> Action </th>
                    </thead>
                    <tbody> <tr>
                      @foreach($Original as $Tests=>$ID)    

                      <td>  {{$Tests}}   </td>                                 
                      <td>    @foreach ($ID as $IDs)       

                        <i class=" {{ $IDs->Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $IDs->Status == 1 ? 'For Review'  : ''}} 
                        <i class=" {{ $IDs->Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $IDs->Status == 2 ? 'Approved'  : ''}}                               
                        <i class=" {{ $IDs->Status == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $IDs->Status == 3 ? 'Rejected'  : ''}}    
                        <i class=" {{ $IDs->Status == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $IDs->Status == 4 ? 'Expiring'  : ''}}  
                        <i class=" {{ $IDs->Status == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>  {{ $IDs->Status == 5 ? 'Expired'  : ''}} 

                        @break @endforeach 
                      </td> 
                      <td>  @foreach ($ID->take(3) as $IDs) <span class="{{$IDs->Type == 'Metro' ? 'badge badge-secondary' : '' }}"> 
                       <span class="{{$IDs->Type == 'Regional' ? 'badge badge-secondary' : '' }}">
                         <span class="{{$IDs->Type == 'Remote' ? 'badge badge-secondary' : '' }}">                                                            
                          {{$IDs->Type }}  </span> </span> </span> @endforeach </td>

                          <td>  @foreach ($ID as $IDs) {{$IDs->country }} @break @endforeach   </td>

                          <td> @foreach($ID as $IDs)  @if ($IDs->Class == 'Metro') {{$IDs->Rate }} + {{$IDs->Rate2 }}<small class="text-warning">*</small>   @break  @endif   
                           @endforeach

                         </td>
                         <td> @foreach($ID as $IDs)    @if ($IDs->Class == 'Regional') {{$IDs->Rate }}  + {{$IDs->Rate2 }}<small class="text-warning">*</small> @break @endif  
                          @endforeach

                          
                        </td>

                        <td> @foreach($ID as $IDs)  @if ($IDs->Class == 'Remote') {{$IDs->Rate }} + {{$IDs->Rate2 }}<small class="text-warning">*</small>  @break   @endif  
                         @endforeach

                       </td>   

                       <td colspan="3"> 

                        <!-- Button trigger modal -->
                        @foreach ($ID as $IDs) 
                        <button type="button" class="btn btn-info btn-simple btn-xs" data-toggle="modal" data-target="#Add{{$IDs->FormID}}" title="Add Rates" name="test" value="{{$IDs->FormID}}">
                          <i class="pe-7s-plus"> </i>   </button> @break @endforeach 

                          @foreach ($ID as $IDs)
                          <button type="button" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#Remove{{$IDs->FormID}}" title="Remove Rates" value="{{$IDs->FormID}}">
                            <i class="fa fa-times"></i>
                          </button> @break @endforeach </td>

                          <!-- modal delete -->
                          @foreach ($ID as $IDs) 
                          <form method="POST" action="{{ route('vendor.deleterates') }}">
                            @csrf
                            @method('DELETE')

                            <div class="modal fade" id="Remove{{$IDs->FormID}}" tabindex="-1" role="dialog" aria-labelledby="RemoveLabel" aria-hidden="true" data-backdrop="false">
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
                                  <button type="submit" class="btn btn-info" value="{{$IDs->FormID}}}" name="deleteformID">Yes</button>
                                </div>
                              </div>
                            </div>
                          </div> 


                        </form>  @break @endforeach
                        
                      </td>

                      <!--Modal Add-->  
                      @foreach ($ID as $IDs)

                      <form method="POST" action="{{ route('vendor.addrates') }}">
                        @csrf
                        @method('PUT') 
                        <div class="modal fade" id="Add{{$IDs->FormID}}" tabindex="-1" role="dialog" aria-labelledby="AddLabel" aria-hidden="true" data-backdrop="false">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="text-center text-white" id="AddLabel"> Rates for {{$IDs->Doc_Desc}} </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>

                             <div class="modal-body">
                              <input type="checkbox" id="1" name="Class[0]" value="Metro" hidden>
                              <input type="text" name="FormID[0]" value="{{$IDs->FormID}}" hidden> 
                              

                              <input type="checkbox" id="Metro" name="Type[0]" value="Metro" class="@error('Type') is-invalid @enderror"  > 
                              <label for="Metro"> <p>Metro </p> </label>
                              @error('Type')
                              <p><small class="text-danger"> <small>
                              {{ $message }} </small>
                            </small>  </p>
                            @enderror   
                            @if (count($errors) > 0)
                            <script type="text/javascript">
                              $('#Add{{$IDs->FormID}}').modal('show');
                            </script>
                            @endif 
                            
                            @error('Rate')
                            <p><small class="text-danger"> <small>
                            {{ $message }} </small>
                          </small>  </p>
                          @enderror   
                          @if (count($errors) > 0)
                          <script type="text/javascript">
                            $('#Add{{$IDs->FormID}}').modal('show');
                          </script>
                          @endif 


                          <div id="optional">                                         
                            <div class="form-group-sm">
                              <div class="input-group">
                                <span class="input-group-addon">Rate</span>
                                <input type="text" class="form-control" name="Rate[0]" placeholder="First Hour" maxlength="4"     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >

                                
                              </div>
                            </div>

                            <div class="form-group-sm">
                              <div class="input-group">
                                <span class="input-group-addon">Rate </span>
                                <input type="text" class="form-control" name="Rate2[0]" placeholder="Succeeding Hour" maxlength="4"     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                
                              </div>
                            </div>       
                          </div> 
                          <!---End Metro -->
                          <hr>   
                          <input type="checkbox" id="2" name="Class[1]" value="Regional" hidden>                                                    
                          
                          <input type="text" name="FormID[1]" value="{{$IDs->FormID}}" hidden> 
                          <input type="checkbox" id="Regional" name="Type[1]" value="Regional"> 
                          <label for="Regional"> <p>Regional </p> </label> 


                          <div id="optional1" class="form-row">                                         
                            <div class="form-group-sm col">
                              <div class="input-group">
                                <span class="input-group-addon">Rate</span>
                                <input type="text" class="form-control" name="Rate[1]" placeholder="First Hour" maxlength="4"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                
                              </div>
                            </div>

                            <div class="form-group-sm col">
                              <div class="input-group">
                                <span class="input-group-addon">Rate </span>
                                <input type="text" class="form-control" name="Rate2[1]" placeholder="Succeeding Hour" maxlength="4"     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                
                              </div>
                            </div>
                          </div>                                                                                                     
                          <!---End Regional -->
                          <hr>   
                          <input type="checkbox" id="3" name="Class[2]" value="Remote" hidden>                                                      
                          <input type="text" name="FormID[2]" value="{{$IDs->FormID}}" hidden> 
                          
                          <input type="checkbox" id="Remote" name="Type[2]" value="Remote"> 
                          <label for="Remote"> <p>Remote </p> </label>


                          <div id="optional2">                                         
                            <div class="form-group-sm">
                              <div class="input-group">
                                <span class="input-group-addon">Rate</span>
                                <input type="text" class="form-control" name="Rate[2]" placeholder="First Hour" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                
                              </div>
                            </div>

                            <div class="form-group-sm">
                              <div class="input-group">
                                <span class="input-group-addon">Rate </span>
                                <input type="text" class="form-control" name="Rate2[2]" placeholder="Succeeding Hour" maxlength="4"     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                
                              </div>
                            </div>
                          </div>
                          <!-- end Remote -->   
                          <hr>
                          <label for="Class">   </label>

                          <input type="text" name="Others" class="form-control form-control-sm" placeholder="ex. Travel,Toll and Parking"> <small><small class="text-warning">Separate Rates with Comma</small> </small>
                          <input type="text" name="newFormID" value="{{$IDs->FormID}}" hidden>   
                          

                          
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>        
                            <button type="submit" class="btn btn-info">  Add </button>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </form>  
                </tr>
                @endforeach                                      



                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="9" class="text-right"> <span class="text-warning"> <small>* Succeeding Rates</small></span></td>
                </tr>
              </tfoot>
            </table> </div>
          </div>


        </div>

      </div>
    </div>    @else @endif   
     @if($otherscount > 0)              
    <div class="col-md-5">   <div class="card">        
      <table class="table table-hover table-striped">    
        <thead>  
          <th> Documents with Rates </th>                          
          <th> Other Rates </th>
        </thead>
        <tbody>                        
          @foreach( $Rates as $Rate=>$ID)
          <tr>


            <td> {{ $Rate}}                
            </td> 


            <td> @foreach($ID as $IDs)  @if ($IDs->Class != 'Metro' && $IDs->Class != 'Regional' && $IDs->Class != 'Remote') <span class="badge badge-secondary">  {{$IDs->Class }}  </span>    @endif  @endforeach    
             

            </td>  


          </tr>
          @endforeach

        </tbody>

      </table>
    </div>


  </div> @else @endif
</div>
</div>
</div>
</div>
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript"></script>
<script>

  $('div[id="optional"]').hide(); 
  $('div[id="optional1"]').hide(); 
  $('div[id="optional2"]').hide();  
  $(document).ready(function() {

    $('input[id="Metro"]').change(function() { 
      if($('input[id="Metro"]').is(':checked')) {
        $('input[id="1"]').prop('checked', true);    
        $('div[id="optional"]').fadeIn();

      }
      else {
        $('div[id="optional"]').fadeOut();
        $('input[id="1"]').prop('checked', false);     
      }
    }).change(); 


//Regional Start

$('input[id="Regional"]').change(function() { 
  if($('input[id="Regional"]').is(':checked')) {
    $('input[id="2"]').prop('checked', true);       
    $('div[id="optional1"]').fadeIn();
  }
  else {
    $('div[id="optional1"]').fadeOut();
    $('input[id="2"]').prop('checked', false);     
  }
}).change(); 

//Remote Start

$('input[id="Remote"]').change(function() { 
  if($('input[id="Remote"]').is(':checked')) {
    $('div[id="optional2"]').fadeIn();
    $('input[id="3"]').prop('checked', true);       
  }
  else {
    $('div[id="optional2"]').fadeOut();
    $('input[id="3"]').prop('checked', false);     
  }
}).change();




});
</script>
@endsection