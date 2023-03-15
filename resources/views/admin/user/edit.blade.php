@extends('admin.layout.app')
@section('title')
 Edit Users
@endsection
@section('content')  


    <div class="main-content">
        <div class="section__content section__content--p30">
                <div class="overview-wrap">
                    <h2 class="title-1">Edit User</h2>
                </div><br>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit User</strong>
                    </div>
                    <div class="card-body card-block">
                        <form method="post" action="{{route('update_users',$data->id)}}" enctype='multipart/form-data' class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text"  name="name" value="{{$data->name}}" id="name" placeholder="Enter Name..." class="form-control">
                                        @if ($errors->has('name'))
                                            <span class="error-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="email" name="email" value="{{$data->email}}"class="form-control" readonly>
                                        @if ($errors->has('email'))
                                            <span class="error-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                          
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Role</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="role" id="role" class="form-control">
                                        <option disabled selected>Please select</option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                            @if ($errors->has('role'))
                                                <span class="error-feedback" role="alert">
                                                <strong>{{ $errors->first('role') }}</strong>
                                                </span>
                                            @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="{{route('users')}}" type="button" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> cancel
                                </a>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>






@endsection