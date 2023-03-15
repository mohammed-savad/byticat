@extends('admin.layout.app')
@section('title')
 Users
@endsection
@section('content')  


<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Users</h2>
                        <a href="{{route('add_users')}}"class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>add User</a>
                    </div>
                </div>
            </div><br>
                    @if ($message = Session::get('AD'))
                        <div id="success-alert" class="alert alert-success">
                            <strong>User added successfully...</strong>
                        </div>
                    @elseif ($message = Session::get('RM'))
                        <div id="success-alert" class="alert alert-success">
                            <strong>User removed successfully...</strong>
                        </div>
                    @elseif ($message = Session::get('UP'))
                        <div id="success-alert" class="alert alert-success">
                            <strong>User  updated successfully...</strong>
                        </div>
                    @endif
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <?php
                            if($data->role == '1'){
                            ?>
                                 <td>Admin</td>
                            <?php
                            }
                            elseif($data->role == '2'){
                            ?>
                                <td>User</td>
                            <?php
                            }
                            ?>
                           
                            <td>
                                <a href="{{route('edit_users',$data->id)}}"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Are you sure?')" href="{{route('user_delete',$data->id)}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach 
                        
                    </tbody>
                </table>
            </div>





@endsection
