@extends('layouts.vendor')

@section('content')
<div class="content">
     <div class="container-fluid">
<a href="{{ route('vendor.edit')}}" class="btn btn-info btn-fill pull-right"> Update </a> 
    </div>
<br>
</div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">My Contractor Details   </h4>
                       

                            </div>


 
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">                       
 
                        <th>Status </th>
                        <td> <i class=" {{ $contractors->status == 1 ? 'fa fa-circle text-info'  : ''}} "> </i>  {{ $contractors->status == 1 ? 'Active'  : ''}} 
                             <i class=" {{ $contractors->status == 0 ? 'fa fa-circle text-warning'  : ''}} "> </i> {{ $contractors->status == 0 ? 'onHold'  : ''}} </p>
                        </td>
                        <tr></tr>
                        <th>Contractor Name </th>
                        <td> {{ $contractors->contractor_name}}  </td>
                        <tr></tr>
                        <th>Contact Person </th>
                        <td> {{ $contractors->Name_primarycontact}}  </td>
                        <tr></tr>
                        <th>Contact Number</th>
                        <td> {{ $contractors->countrycode}} {{ $contractors->phone_primary}}  </td>                 
                        <tr></tr>
                        <th>Email </th>
                        <td> {{ $passemailfromusers->email}}  </td>
                        <tr></tr>
                        <th>Address </th>
                        <td> {{ $contractors->address}}  </td>
                        <tr></tr>
                        <th>City </th>
                        <td> {{ $cityname->name }}   </td> 
                        <tr></tr>
                        <th>POST CODE </th>
                        <td> {{ $contractors->postcode}}  </td>
                        <tr></tr>
                        <th>State </th>
                        <td> {{ $statename->name}}  </td>
                        <tr></tr>
                        <th>Country </th>
                        <td> {{ $countryname->country}}   </td>      
                        <tr></tr>
                        <th>Alt Contact </th>
                        <td> {{ $contractors->Name_secondarycontact}}  </td>
                        <tr></tr>
                        <th>Alt Contact Number </th>
                        <td> {{ $contractors->countrycodesecondary}} {{ $contractors->phone_secondary}}  </td>        
                        <tr></tr>
                        <th>Alt Email </th>
                        <td> {{ $contractors->email_secondary}}  </td>               
                        <tr></tr>
                        <th class="bg-white"> <h4  class="text-info"> My Financial Details </h4> </th>
                        <td class="bg-white"> </td>
                        <tr></tr>
                        <th>Financial Confirmation Form </th>
                        <td>   
                            <i class=" {{ $financial == 0 ? 'fa fa-circle text-secondary'  : ''}}">   </i>   {{ $financial == 0 ? 'None'  : ''}}          
                            <i class=" {{ $financial == 1 ? 'fa fa-circle text-info'  : ''}}">   </i>   {{ $financial == 1 ? 'For Review'  : ''}} 
                            <i class=" {{ $financial == 2 ? 'fa fa-circle text-success'  : ''}}">   </i>   {{ $financial == 2 ? 'Approved'  : ''}}                               
                            <i class=" {{ $financial == 3 ? 'fa fa-circle text-danger'  : ''}}">   </i>   {{ $financial == 3 ? 'Rejected'  : ''}}    
                            <i class=" {{ $financial == 4 ? 'fa fa-circle text-warning'  : ''}}">   </i>   {{ $financial == 4 ? 'Expiring'  : ''}}  
                            <i class=" {{ $financial == 5 ? 'fa fa-circle text-danger'  : ''}}">   </i>  {{ $financial == 5 ? 'Expired'  : ''}}                  
   </td>                           
                        <tr></tr>
                        <th>ABN </th>
                        <td> {{ $contractors->abn}}  </td>        
                        <tr></tr>
                        <th>Bank </th>
                        <td> {{ $contractors->bankname}}  </td>        
                        <tr></tr>
                        <th>Branch </th>
                        <td> {{ $contractors->branch}}  </td>        
                        <tr></tr>
                        <th>Account Name </th>
                        <td> {{ $contractors->accountname}}  </td>        
                        <tr></tr>
                        <th>Account Number </th>
                        <td> {{ $contractors->accountnumber}}  </td>  
                        <tr></tr>
                        <th>BSB </th>
                        <td> {{ $contractors->bsb}}  </td>        
                        <tr></tr>
                        <th>Currency </th>
                        <td> {{ $contractors->currency}}  </td>        
                        <tr></tr>
                        <th>Terms </th>
                        <td> {{ $contractors->terms}}  </td>  
   
                       
                    </table>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





@endsection

