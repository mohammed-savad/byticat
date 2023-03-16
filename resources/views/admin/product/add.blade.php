@extends('admin.layout.app')
@section('title')
 Add Product
@endsection
@section('content')  


    <div class="main-content">
        <div class="section__content section__content--p30">
                <div class="overview-wrap">
                    <h2 class="title-1">Add Product</h2>
                </div><br>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Product</strong>
                    </div>
                    <div class="card-body card-block">
                        <form method="post" action="{{route('store_product')}}" enctype='multipart/form-data' class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"> Product Name</label>
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
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="price" class=" form-control-label">price</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="price" name="price" value="{{old('price')}}" placeholder="Enter price ..." class="form-control">
                                        @if ($errors->has('price'))
                                            <span class="error-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Catogery</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="catogery" id="catogery" class="form-control">
                                        <option disabled selected>Please select</option>
                                        @foreach($catogery as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                            @if ($errors->has('role'))
                                                <span class="error-feedback" role="alert">
                                                <strong>{{ $errors->first('role') }}</strong>
                                                </span>
                                            @endif
                                </div>
                      
                      
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="{{route('products')}}" type="button" class="btn btn-danger btn-sm">
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