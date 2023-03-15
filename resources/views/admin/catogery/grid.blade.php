@extends('admin.layout.app')
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
                        <a href="{{route('add_catogery')}}"class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>add Catogery</a>
                    </div>
                </div>
            </div><br>
                    @if ($message = Session::get('AD'))
                        <div id="success-alert" class="alert alert-success">
                            <strong>Catogery added successfully...</strong>
                        </div>
                    @elseif ($message = Session::get('RM'))
                        <div id="success-alert" class="alert alert-success">
                            <strong>Catogery removed successfully...</strong>
                        </div>
                    @elseif ($message = Session::get('UP'))
                        <div id="success-alert" class="alert alert-success">
                            <strong>Catogery  updated successfully...</strong>
                        </div>
                    @endif
            
                </div>



                <section style="background-color: #eee;">
  <div class="text-center container py-5">
    <h4 class="mt-4 mb-5"><strong>Bestsellers</strong></h4>

    <div class="row">

     @foreach ($catogery as $data)
      <div class="col-lg-3 col-md-12 mb-3">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <a href="{{route('view_catogery',$data->id)}}">
            <img src="{{asset('cat_imgs/'.$data->image)}}" style="height: 200px; width: 260px;" alt="image"
              class="w-100" />
             
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
            <a href="{{route('edit_catogery',$data->id)}}"><i class="fa fa-edit"></i></a>
            <a onclick="return confirm('Are you sure?')" href="{{route('catogery_delete',$data->id)}}"><i class="fa fa-trash"></i></a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  
  </div>
</section>

@endsection
