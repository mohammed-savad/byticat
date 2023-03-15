@extends('admin.layout.app')
@section('title')
 Products Under Catogery
@endsection
@section('content')  

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
            
                </div>



                <section style="background-color: #eee;">
        <div class="text-center container py-5">
            <h4 class="mt-4 mb-5"><strong>Bestsellers</strong></h4>

            <div class="row">

        @foreach ($product as $datas)
        <div class="col-lg-3 col-md-12 mb-3">
            <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                data-mdb-ripple-color="light">
                <img src="{{asset('product_image/'.$datas->image)}}" style="height: 200px; width: 260px;" alt="image"
                class="w-100" />
                <a href="#!">
                
                <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
                </a>
            </div>
            <div class="card-body">
                <a href="" class="text-reset">
                <h4 class="card-title mb-1">{{ $datas->name }}</h4>
                </a><br>
                <p>{{ $datas->discription }}</p>
                <a href=""><i class="fa fa-edit"></i></a>
                <a onclick="return confirm('Are you sure?')" href=""><i class="fa fa-trash"></i></a>
            </div>
            </div>
        </div>
        @endforeach

        </div>

        </div>
        </section>

@endsection
