@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid"> <i class="fa fa-search" id="search"></i> <i class="pe-7s-refresh" id="refresh"></i>
        <a href="{{ route('admin.createusers')}}" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-add-user"></i> New User </a>
    </div>
    <br>
    <!--Search Box-->
    <div class="container-fluid" id="searchbox">
        <div class="col-md-2 form-group pull-left">
            <form action="{{ route('admin.search') }}" method="GET" role="search" class="form-inline">
                @csrf


                <input type="text" class="form-control" name="query" placeholder="Search users">


            </form>
        </div>
    </div>

</div>



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="text-info">{{ config('app.name') }} Users </h4>


                    </div>




                    <div class="content table-responsive table-full-width">
                        @if(isset($users))
                        <table class="table table-hover table-striped">
                            <thead>
                                <th> User </th>
                                <th> Email </th>
                                <th> Role </th>
                                <th> Last Login </th>
                                <th> Last Login IP </th>
                            </thead>
                            <tbody>
                                @foreach( $users as $user)
                                <tr>
                                    <td> {{ $user->name}} </td>
                                    <td> {{ $user->email}} </td>
                                    <td>
                                        <font class="bg-success"> {{ $user->role == 1 ? 'Admin' : '' }} </font>
                                        <font class="bg-info"> {{ $user->role == 2 ? 'Vendor' : '' }} </font>
                                        <font class="text-warning"> {{ $user->role == 3 ? 'Technician' : '' }} </font>
                                    </td>
                                    <td> {{$user->last_login_at }}</td>
                                    <td> {{$user->last_login_ip }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        @endif
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    $('i[id="refresh"]').hide();
    $('div[id="searchbox"]').hide();
    $(document).ready(function() {
        $('i[id="search"]').click(function() {
            $('div[id="searchbox"]').fadeIn();
            $('i[id="refresh"]').show();
            $('i[id="search"]').hide();
        })

        $('i[id="refresh"]').click(function() {
            $('div[id="searchbox"]').fadeOut();
            $('i[id="refresh"]').hide();
            $('i[id="search"]').fadeIn();
        })

    });
</script>
@endsection