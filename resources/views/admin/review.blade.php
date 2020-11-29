@extends('layouts.admin')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="text-info">{{ config('app.name') }} Documents   </h4>


          </div>


          <div class="content table-responsive table-full-width">

            <table class="table table-hover table-striped">    
              <thead>  
                <th> Contractor Name</th>
                <th> Document Type</th>
                <th> Coverage</th>                                  
                <th> Expiration</th>                                
                <th> Status </th>
                <th class="text-center" colspan="2"> Action </th>
              </thead>
              <tbody>
                @foreach($Review as $Reviews)
                <tr>
                  <td>  {{$Reviews->contractor_name }} </td>                                 
                  <td>   {{$Reviews->Doc_Desc }}</td>   
                  <td>  {{$Reviews->currency }} &nbsp; {{$Reviews->Coverage }}</td>   									
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
                            <td class="text-right"> 
                              <form method="POST" action="{{ route('admin.reviewed') }}">
                                @csrf
                                @method('PUT')
                                <input type="text" value="{{$Reviews->id }}" name="document_id" class="hidden">
                                <input type="text" value="2" name="Status" class="hidden"> 
                                <button type="submit" class="btn btn-success btn-simple btn-xs">
                                  <i class="fa fa-check-square"></i>
                                </button>

                              </form>
                            </td>

                            <td class="text-left"> 
                              <form method="POST" action="{{ route('admin.reviewed') }}">
                                @csrf
                                @method('PUT')
                                <input type="text" value="{{$Reviews->id }}" name="document_id" class="hidden">
                                <input type="text" value="3" name="Status"class="hidden" > 
                                <button type="submit" class="btn btn-danger btn-simple btn-xs">
                                  <i class="fa fa-times"></i>
                                </button>

                              </form>
                            </td>


                            @endforeach
                          </tbody>
                        </table>
                        {{ $Review->links() }}
                      </div>

                      <table class="table table-hover table-striped">    
                        <thead>  
                          <th> Contractor Name </th>
                          <th> Document Type </th>
                          <th> Metro Rates </th>
                          <th> Regional Rates </th>
                          <th> Remote Rates </th>                             
                          <th> Other Charges </th>
                          <th> Status </th>
                          <th colspan="2"> Action </th>
                        </thead>
                        <tbody>                        
                          @foreach( $Rates as $Rate=>$ID)
                          <tr>
                            <td>     @foreach($ID as $IDs) {{$IDs->contractor_name }} @break @endforeach          
                            </td> 
                            <td>  {{ $Rate}}   </td>

                            <td> @foreach($ID as $IDs)  @if ($IDs->Class == 'Metro') {{$IDs->Rate }} + {{$IDs->Rate2 }}<small class="text-warning">*</small>   @break  @endif   
                              @endforeach

                            </td>
                            <td> @foreach($ID as $IDs)    @if ($IDs->Class == 'Regional') {{$IDs->Rate }}  + {{$IDs->Rate2 }}<small class="text-warning">*</small> @break @endif  
                              @endforeach


                            </td>

                            <td> @foreach($ID as $IDs)  @if ($IDs->Class == 'Remote') {{$IDs->Rate }} + {{$IDs->Rate2 }}<small class="text-warning">*</small>  @break   @endif  
                              @endforeach

                            </td>   

                            <td> @foreach($ID as $IDs)  @if ($IDs->Class != 'Metro' && $IDs->Class != 'Regional' && $IDs->Class != 'Remote') <span class="badge badge-secondary">  {{$IDs->Class }}  </span>  @endif  @endforeach     


                            </td>   

                            <td> @foreach($ID as $IDs)    
                              <i class=" {{ $IDs->Status == 0 ? 'fa fa-circle '  : ''}}"> </i>  {{ $IDs->Status == 0 ? 'None'  : ''}}

                              <a href="{{ asset('storage/app/documents/') . '/' . $IDs->FileName}}" target="_blank"> 
                                <i class=" {{ $IDs->Status == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $IDs->Status == 1 ? 'For Review'  : ''}} </a>

                                <a href="{{ asset('storage/app/documents/') . '/' . $IDs->FileName}}" target="_blank"> 
                                  <i class=" {{ $IDs->Status == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $IDs->Status == 2 ? 'Approved'  : ''}} </a>

                                  <a href="{{ asset('storage/app/documents/') . '/' . $IDs->FileName}}" target="_blank"> 
                                    <i class=" {{ $IDs->Status == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $IDs->Status == 3 ? 'Rejected'  : ''}} </a>

                                    <a href="{{ asset('storage/app/documents/') . '/' . $IDs->FileName}}" target="_blank"> 
                                      <i class=" {{ $IDs->Status == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $IDs->Status == 4 ? 'Expiring'  : ''}} </a>

                                      <a href="{{ asset('storage/app/documents/') . '/' . $IDs->FileName}}" target="_blank"> 
                                        <i class=" {{ $IDs->Status == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $IDs->Status == 5 ? 'Expired'  : ''}} </a>   

                                        @break @endforeach     


                                      </td> 
                                      <td class="text-right"> 
                                        @foreach($ID as $IDs)  
                                        <form method="POST" action="{{ route('admin.reviewed') }}">
                                          @csrf
                                          @method('PUT')
                                          <input type="text" value="{{$IDs->id }}" name="document_id" class="hidden">
                                          <input type="text" value="2" name="Status" class="hidden"> 
                                          <button type="submit" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-check-square"></i>
                                          </button>

                                        </form>@break @endforeach
                                      </td>

                                      <td class="text-left">  @foreach($ID as $IDs)  
                                        <form method="POST" action="{{ route('admin.reviewed') }}">
                                          @csrf
                                          @method('PUT')
                                          <input type="text" value="{{$IDs->id }}" name="document_id" class="hidden">
                                          <input type="text" value="3" name="Status"class="hidden" > 
                                          <button type="submit" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                          </button>

                                        </form> @break @endforeach
                                      </td> 

                                    </tr>
                                    @endforeach



                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <td colspan="9" class="text-right"> <span class="text-warning"> <small>* Succeeding Rates</small></span></td>
                                    </tr>
                                  </tfoot>
                                </table>        

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      @endsection