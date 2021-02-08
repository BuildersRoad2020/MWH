@extends('layouts.admin')

@section('content')

<!--Search Box-->
<div class="container-fluid" id="searchbox">
    <div class="col-md-2 form-group pull-left">
        <form action="{{ route('admin.forms') }}" method="GET" role="search" class="form-inline">
            @csrf
            <input type="text" class="form-control" name="query" placeholder="Search State">
        </form>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="text-info">{{ config('app.name') }} Work Area Coverage </h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        @if(isset($WorkArea))
                        <table class="table table-hover table-striped">
                            <thead>
                                <th> Contractor Name</th>
                                <th> Work Area</th>
                            </thead>
                            <tbody>
                                @foreach($WorkArea as $Reviews)
                                <tr>
                                    <td> {{$Reviews->contractor_name }} </td>
                                    <td> {{$Reviews->Type == 'NSW Work Area Coverage' ? 'NSW' : '' }} {{$Reviews->Type == 'QLD Work Area Coverage' ? 'QLD' : '' }}</td>
                                    </td>
                                    @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection