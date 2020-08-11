@extends('layouts.formHomepage')
@section('title','Nhà Hàng Family')

@section('content')
{{-- Banner bar --}}
<link rel="stylesheet" href="{{asset('css/styleHomepage.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<div class="container-fluid" style="background-color: white!important; padding-left:0;padding-right:0">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($banners as $key => $item)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="active"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($banners as $key => $item)
            @if ($key==0)
            <div class="carousel-item active">
                @else
                <div class="carousel-item">
                    @endif
                    <img src="{{asset($item->imageURL)}}" class="d-block w-100" alt="{{asset($item->imageURL)}}"
                        style="height: 400px;">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

{{-- logo cửa hàng --}}
<div class="text-center ">
    <img src="{{asset('images/logo.png')}}" alt="logo" class="rounded-pill" style="width:200px">
</div>

{{-- title --}}
<h1 class="animate text-center mt-4 container" id="head-title"> ---- Nhà Hàng Family ---- </h1>

{{-- menu --}}
<div class="container-fluid" style="background-color: #f7f7f7">
    <h2 class="container text-center mt-3" id="menu"> Menu </h2>
    <div class="container mons">
        <div class="row row-cols-2">
            @foreach ($mons as $item)
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('images/download.jpg')}}" class="card-img" alt="anh">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nhommons}}</h5>
                                <p class="card-text">{{$item->tenmon}}</p>
                                <p class="card-text"><small class="text-danger">{{number_format($item->gia) . " VNĐ"}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- chương trình khuyến mãi --}}
<div class="container-fluid">

</div>
@include('layouts.footer')
@endsection
