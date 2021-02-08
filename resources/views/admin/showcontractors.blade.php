@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <a href="{{ route('admin.addcontractors')}}" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-link"></i> Add Contractor</a>
    </div>
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="text-info">{{ config('app.name') }} Contractors </h4> <br />
                        </div>
                        @if($count > 0)
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th> Contractor Name</th>
                                    <th> Contact Person </th>
                                    <th> Status </th>
                                    <th> Details </th>
                                </thead>
                                <tbody>
                                    @foreach( $showcontractors as $showcontractor)
                                    <tr>
                                        <td>{{ $showcontractor->contractor_name}}</td>
                                        <td> {{ $showcontractor->Name_primarycontact}}</td>

                                        <td>
                                            <i class="{{ $showcontractor->status == 1 ? 'fa fa-circle text-info'  : ''}}"> </i> {{ $showcontractor->status == 1 ? 'Active'  : ''}}
                                            <i class="{{ $showcontractor->status == 0 ? 'fa fa-circle text-warning'  : ''}}"> </i> {{ $showcontractor->status == 0 ? 'onHold'  : ''}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.showdetailedcontractors', [$showcontractor->id])}}">
                                                <i class="pe-7s-notebook"></i> MORE</a>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            {{ $showcontractors->links() }}
                        </div> @else @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection