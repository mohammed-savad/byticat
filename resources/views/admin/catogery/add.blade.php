@extends('admin.layout.app')
@section('title')
 Add Catogery
@endsection
@section('content')  


    <div class="main-content">
        <div class="section__content section__content--p30">
                <div class="overview-wrap">
                    <h2 class="title-1">Add Catogery</h2>
                </div><br>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Catogery</strong>
                    </div>
                    <div class="card-body card-block">
                        <form method="post" action="{{route('store_catogery')}}" enctype='multipart/form-data' class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"> Catogery Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text"  name="name" value="{{old('name')}}" id="name" placeholder="Enter Name..." class="form-control">
                                        @if ($errors->has('name'))
                                            <span class="error-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="image" class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="image" name="image" value="{{old('image')}}" placeholder="Enter image ..." class="form-control">
                                        @if ($errors->has('image'))
                                            <span class="error-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="discription" class=" form-control-label">Discription</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="discription" name="discription" value="{{old('discription')}}" placeholder="Enter discription ..." class="form-control">
                                        @if ($errors->has('discription'))
                                            <span class="error-feedback" role="alert">
                                            <strong>{{ $errors->first('discription') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                      
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="{{route('catogeries')}}" type="button" class="btn btn-danger btn-sm">
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