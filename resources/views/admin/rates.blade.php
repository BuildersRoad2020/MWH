@extends('layouts.admin')

@section('content')

    <!--Search Box-->
        <div class="container-fluid" id="searchbox">
            <div class="col-md-2 form-group pull-left">
                <form action="{{ route('admin.searchworkarea') }}" method="GET" role="search" class="form-inline">
                @csrf
                  
                        
                        <input type="text" class="form-control" name="query" placeholder="Compare by State"> 
                       
               
                </form>
            </div>
        </div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="text-info"> Review Rates </h4>                             
                </div> 
          @if(isset($Rates))
                         <table class="table table-hover table-striped">    
                            <thead>  
                              <th> Contractor Name </th>
                              <th> Documents with Rates </th>
                              <th> Metro Rates </th>
                              <th> Regional Rates </th>
                              <th> Remote Rates </th>                             
                              <th> Other Charges </th>
                              <th> Status </th>
                            </thead>
                            <tbody>                        
                                @foreach( $Rates as $Rate=>$ID)
                                       <tr>
                                         <td>   {{ $Rate}} </td>
                                            <td>     @foreach($ID as $IDs)  {{$IDs->Doc_Desc }} @break @endforeach             
                                    </td> 

                                   <td> @foreach($ID as $IDs)  @if ($IDs->Class == 'Metro') {{$IDs->Rate }} + {{$IDs->Rate2 }}<small class="text-warning">*</small>   @break  @endif   
                                                                       @endforeach

                                    </td>
                                            <td> @foreach($ID as $IDs)    @if ($IDs->Class == 'Regional') {{$IDs->Rate }}  + {{$IDs->Rate2 }}<small class="text-warning">*</small> @break @endif  
                                                                      @endforeach

                                              
                                    </td>

                                    <td> @foreach($ID as $IDs)  @if ($IDs->Class == 'Remote') {{$IDs->Rate }} + {{$IDs->Rate2 }}<small class="text-warning">*</small>  @break   @endif  
                                                                       @endforeach

                                    </td>   

                                    <td> @foreach($ID as $IDs)  @if ($IDs->Class != 'Metro' && $IDs->Class != 'Regional' && $IDs->Class != 'Remote') <span class="badge badge-secondary">  {{$IDs->Class }}  </span> @endif   @endforeach     
                                                                 
                                      
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

                               
                                  </tr>
                              @endforeach
                                        
                            </tbody>
                              <tfoot>
    <tr>
      <td colspan="7" class="text-right"> <span class="text-warning"> <small>* Succeeding Rates</small></span></td>
    </tr>
  </tfoot>
                          </table>
           @endif

                </div>
</div></div></div> </div>
@endsection