@extends('user.layout.app')
@section('title')
 Dashboard
@endsection
@section('content')  

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add item</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>40</h2>
                                                <span>Pusrchase</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2>15</h2>
                                                <span>Cart List</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>1,086</h2>
                                                <span>this week</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>7</h2>
                                                <span>Projects</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-25">
                              @foreach ($product as $data)
                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
                      <div class="card">
                        <!-- <div class="d-flex justify-content-between p-3">
                          <p class="lead mb-0">Today's Combo Offer</p>
                          <div
                            class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                            style="width: 35px; height: 35px;">
                            <p class="text-white mb-0 small">x4</p>
                          </div>
                        </div> -->
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
                  @endforeach
                        </div>
     
@endsection