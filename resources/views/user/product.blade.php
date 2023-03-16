@extends('user.layout.app')
@section('title')
Products
@endsection
@section('content')  


<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Products</h2>
                        <a href="{{route('cust_catogery')}}"class="au-btn au-btn-icon au-btn--blue">
                        <i class="fa fa-mail-reply-all"></i>Back</a>
                    </div>
                </div>
                <div class="col-md-12">
                </div>
            </div><br>
                    
                </div>
                
                <section style="background-color: #eee;">
                <div class="container py-5">
                  <div class="row">
                  @foreach ($product as $data)
                   @if($data->Catogery_id == $catogery_id->id )
                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
                      <div class="card">
                       
                        <img src="{{asset('product_image/'.$data->image)}}" style="height: 310px; width: 370px;"class="card-img-top" alt="Laptop" />
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <p class="small"><a href="#!" class="text-muted">{{ $data->catogery->name }}</a></p>
                          </div>

                          <div class="d-flex justify-content-between mb-3">
                            <h4 class="mb-0">{{ $data->name }}</h4>
                            <h4 class="text-dark mb-0">₹ {{ $data->price }}</h4>
                          </div>

                          <div class="d-flex justify-content-between mb-2">
                            <p class="text-muted mb-0">{{ $data->discription }}</p>
                            <div class="ms-auto text-warning">
                            <a href="#"><i class="fa fa-cart-plus" style="font-size:22px;color:red"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  @endforeach

                  </div>
                </div>
              </section>




@endsection