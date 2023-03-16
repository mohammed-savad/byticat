@extends('user.layout.app')
@section('title')
Catogery
@endsection
@section('content')  

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Catogeries</h2>
                    </div>
                </div>
            </div><br>
            
                </div>
                <section style="background-color: #eee;">
                  <div class="text-center container py-5">
                    <div class="row">

                    @foreach ($catogery as $data)
                      <div class="col-lg-2 col-md-12 mb-2">
                        <div class="card">
                          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                            data-mdb-ripple-color="light">
                            <a href="{{route('catogery_product',$data->id)}}">
                            <img src="{{asset('cat_imgs/'.$data->image)}}" style="height: 150px; width: 200px;" alt="image"
                              />
                            
                              <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                              </div>
                            </a>
                          </div>
                          <div class="card-body">
                            <a href="" class="text-reset">
                              <h4 class="card-title mb-1">{{ $data->name }}</h4>
                            </a><br>
                              <p>{{ $data->discription }}</p>
                          </div>
                        </div>
                      </div>
                      @endforeach

                    </div>
                  
                  </div>
                </section>


@endsection