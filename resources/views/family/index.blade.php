@extends('layouts.formHomepage')
@section('title','Nhà Hàng Family')

@section('content')
{{-- Banner bar --}}
<link rel="stylesheet" href="{{asset('css/styleHomepage.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
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
                                <p class="card-text"><small
                                        class="text-danger">{{number_format($item->gia) . " VNĐ"}}</small></p>
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
<div class="container-fluid" style="background-color: #372726;padding-left:20rem">
    <div class="d-flex flex-row">
        <div class="p-2 bd-highlight" style="position:relative">
            <img src="{{asset('images/percent-off.png')}}" alt="sale">
            <span style="position: absolute;left: 35px;top: 65px;font-size: 229%;color: #372726;">SALE %</span>
        </div>
        <div class="p-2 bd-highlight text-white">
            <h5 style="font-variant: petite-caps;font-family: cursive;">Combo Sale</h5>
            <h2 style="letter-spacing: -2px;font-weight: bold;">Chương trình khuyến mãi</h2>
            <h4 style="font-size: inherit;font-weight: 100;font-style: italic;">Chỉ áp dụng cho Thứ 7</h4>
        </div>
    </div>
</div>

{{-- combo --}}
<div id="carouselExampleControls" class="carousel slide p-5" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="row row-cols-3 justify-content-center">
                <div class="col-3 form-combo border shadow">Column</div>
                <div class="col-3 form-combo border shadow">Column</div>
                <div class="col-3 form-combo border shadow">Column</div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-danger" style="font-size:50px" href="#carouselExampleControls" role="button"
        data-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-danger" href="#carouselExampleControls" role="button" data-slide="next"
        style="font-size:50px">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>

{{-- feedback --}}
<div class="container-fluid" style="background: url(images/bg-fb.jpg) center no-repeat;background-size: cover;">
    <div class="logo text-center">
        <img src="{{asset('images/logo.png')}}" alt="logo" class="rounded-pill" style="width:200px">
    </div>

    <h1 class="animate text-center mt-4 container" id="head-title"> ---- FEED BACK ---- </h1>

    <h1 class="text-center">Khách hàng</h1>
    <div id="carouselExampleControls" class="carousel slide p-5" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('images/kh1.jpg')}}" alt="" class="rounded-circle" style="width:150px;height:150px">
                            </div>
                            <div class="col-8" style="color: #664d42;font-family: 'Dancing Script', cursive; font-size:130%">
                                <h2>Lê Thạnh</h2>
                                <p>Quán phục vụ nhiệt tình, nhân viên vui vẻ, giá cả hợp lý</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('images/kh2.jpg')}}" alt="" class="rounded-circle" style="width:150px;height:150px">
                            </div>
                            <div class="col-8" style="color: #664d42;font-family: 'Dancing Script', cursive; font-size:130%">
                                <h2>Đức Phạm</h2>
                                <p>Quán phục vụ nhiệt tình, nhân viên vui vẻ, giá cả hợp lý</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('images/kh2.jpg')}}" alt="" class="rounded-circle" style="width:150px;height:150px">
                            </div>
                            <div class="col-8" style="color: #664d42;font-family: 'Dancing Script', cursive; font-size:130%">
                                <h2>Lê Thạnh</h2>
                                <p>Quán phục vụ nhiệt tình, nhân viên vui vẻ, giá cả hợp lý</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('images/kh3.jpg')}}" alt="" class="rounded-circle" style="width:150px;height:150px">
                            </div>
                            <div class="col-8" style="color: #664d42;font-family: 'Dancing Script', cursive; font-size:130%">
                                <h2>Đức Phạm</h2>
                                <p>Quán phục vụ nhiệt tình, nhân viên vui vẻ, giá cả hợp lý</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
