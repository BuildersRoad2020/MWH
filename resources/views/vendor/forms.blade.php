@extends('layouts.vendor')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="text-info">Download Forms  </h4>

                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">  
                                <thead>
                                    <th> Document Description </th>
                                    <th> Form </th>
                                </thead>
                                <tbody>
                                    @foreach($Forms as $Form)<tr>
                                        <td> {{$Form->Doc_desc}}</td> 
                                        <td>  <a href="{{ asset('storage/app/forms/') . '/' . $Form->FileName}}" download>  Download </a> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection