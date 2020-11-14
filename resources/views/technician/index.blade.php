@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


<div class="nav flex-column nav-pills" id="v-pills-tab"  aria-orientation="vertical"> 
 
   </div>

        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header"> 

                    <strong> {{ $contractors->contractor_name }}'s Technician </strong>    </div> </div>

                <div class="card-body">
                    <table class="table">
                    <tbody>
                         

                        <th>Name </th>
                        <td> {{ $technicians->name}}  </td>
                        <tr></tr>
                        <th>Email </th>
                        <td> {{ $technicians->email}}  </td>
                        <tr></tr>
                        <th>Phone </th>
                        <td> {{ $technicians->phone}}  </td>
                        <tr></tr>
               
                    </tbody>
                </table>
                </div>
               
            </div>
                
        </div>
    </div>
@endsection