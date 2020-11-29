@extends('layouts.vendor')

@section('content')

<div class="content">
    <div class="container-fluid">
        <a href="{{ route('vendor.addtechnicians')}}" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-add-user"></i> Technician </a> 
    </div>
    <br>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="text-info">My Technicians  </h4> <br>

                    </div>
                        @if($count != 0)
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped"> 
                            <thead class="thead-dark">
                                <tr>
                                    <th  class="text-info"> Technician Name</th>
                                    <th  class="text-info"> Email </th>
                                    <th  class="text-info"> Mobile Number </a> </th>
                                    <th  class="text-info"> View Documents </th>                                            
                                </tr>
                            </thead>
                            <tbody>                        
                                @foreach( $showtechnicians as $showtechnician)
                                <tr>
                                    <td> {{ $showtechnician->name}}                               
                                    </td>
                                    <td> {{ $showtechnician->email}}  
                                    </td>
                                    <td> ({{ $showtechnician->countrycode}}) {{ $showtechnician->phone}}
                                    </td>

                                    <td>
                                        <a href="{{ route('vendor.techniciandocs', [$showtechnician->id])}}" > 
                                            <i class="pe-7s-notebook"></i> MORE</a>    
                                        </td>                                    
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            {{ $showtechnicians->links() }}                      
                        </div> @else @endif
                    </div>   
                </div>
            </div>
        </div>
    </div>


    @endsection


