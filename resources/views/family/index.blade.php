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
<div class="text-center mt-3">
    <img src="{{asset('images/logo.png')}}" alt="logo" class="rounded-pill" style="width:200px">
</div>

{{-- title --}}
<h1 class="animate text-center mt-4 container title" id="head-title"> ---- Nhà Hàng Family ---- </h1>

{{-- menu --}}
<div class="container-fluid pt-2 pb-2 mt-2 mb-2" style="background-color: #f7f7f7">
    <h2 class="container text-center mt-3 title" id="menu"> Menu </h2>
    <hr>
    <div class="container mons">
        <div class="row row-cols-2">
            @foreach ($mons as $item)
            <div class="col">
                <div class="card mb-3 border border-secondary" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset($item->imageURL)}}" class="card-img" alt="anh" style="height:164px;">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->tenmon}}</h5>
                                        <p class="card-text">{{$item->nhommons}}</p>
                                        <p class="card-text"><small
                                                class="text-danger">{{number_format($item->gia) . " VNĐ"}}</small></p>
                                    </div>
                                </div>
                                {{-- <div class="col-4" style="margin:auto;">
                                    <button class="btn btn-danger rounded-pill rounded"> Gọi món </button>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="text-center mb-2">
        <a href="#" class="btn btn-primary rounded-pill shadow" style="font-size: 130%; font-weight:bold;"> Xem thêm...
        </a>
    </div>

</div>

{{-- chương trình khuyến mãi --}}
<div class="container-fluid" style="background-color: #372726;">
    <div class="d-flex flex-row justify-content-center">
        <div class="p-2 bd-highlight" style="position:relative">
            <img src="{{asset('images/percent-off.png')}}" alt="sale">
            <span style="position: absolute;left: 35px;top: 65px;font-size: 229%;color: #372726;">SALE %</span>
        </div>
        <div class="p-2 bd-highlight text-white">
            <h5 style="font-variant: petite-caps;font-family: cursive;">Combo Sale</h5>
            <h2 style="letter-spacing: 0px;font-weight: bold; font-family: cursive;">Chương trình khuyến mãi</h2>
            <h4 style="font-size: inherit;font-weight: 100;font-style: italic; font-family: cursive;">Chỉ áp dụng cho
                Thứ 7</h4>
        </div>
    </div>
</div>

{{-- combo --}}
<div id="carouselExampleControls" class="carousel slide p-5" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($ctkms as $key => $item)
        @if ($key == 0)
        <div class="carousel-item active">
            <div class="row row-cols-3 justify-content-center">
                @foreach ($item as $key=>$val)
                @switch($key)
                @case(0)
                <div class="col-3 form-combo border shadow rounded-lg" style="background-color: #68d0af">
                    @break
                    @case(1)
                    <div class="col-3 form-combo border shadow rounded-lg" style="background-color: #d2d86f">
                        @break
                        @default
                        <div class="col-3 form-combo border shadow rounded-lg" style="background-color: #83bed7">
                            @endswitch
                            <img src="{{asset($val['imageURL'])}}" class="card-img-top" alt="anh=combo" style="height: 180px">
                            <h5 class="">{{$val['tenKM']}}</h5>
                            <p class="">Từ ngày: {{date('d-m-Y',strtotime($val['ngaybd']))}}</p>
                            <p class="">Đến ngày: {{date('d-m-Y',strtotime($val['ngaykt']))}}</p>
                            <ul class="">
                                @for ($i = 0; $i < count($val['mons']['tenmon']); $i++) <li class="">
                                    {{$val['mons']['tenmon'][$i].' : '.$val['mons']['nhommon'][$i]}}</li>
                                    <hr>
                                    @endfor
                            </ul>
                            <div class="logosale">
                                <span class="text-white sale"
                                    style="font-weight: bold">{{'GIẢM '.$val['phantramKM'] . "%"}}</span>
                                <img src="{{asset('images/saleoff.png')}}" alt="saleoff" style="width: 120px;">
                            </div>
                            {{-- <div class="col-12 btn-combo">
                                <button class="btn btn-danger"> Gọi combo </button>
                            </div> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="carousel-item">
                    <div class="row row-cols-3 justify-content-center">
                        @foreach ($item as $key=>$val)
                        @switch($key)
                        @case(0)
                        <div class="col-3 form-combo border shadow rounded-lg" style="background-color: #68d0af">
                            @break
                            @case(1)
                            <div class="col-3 form-combo border shadow rounded-lg" style="background-color: #d2d86f">
                                @break
                                @default
                                <div class="col-3 form-combo border shadow rounded-lg" style="background-color: #83bed7">
                                    @endswitch
                                    <img src="..." class="card-img-top" alt="...">
                                    <h5 class="">{{$val['tenKM']}}</h5>
                                    <p class="">Từ ngày: {{date('d-m-Y',strtotime($val['ngaybd']))}}</p>
                                    <p class="">Đến ngày: {{date('d-m-Y',strtotime($val['ngaykt']))}}</p>
                                    <ul class="">
                                        @for ($i = 0; $i < count($val['mons']['tenmon']); $i++) <li class="">
                                            {{$val['mons']['tenmon'][$i].' : '.$val['mons']['nhommon'][$i]}}</li>
                                            <hr>
                                            @endfor
                                    </ul>
                                    <div class="logosale">
                                        <span class="text-white sale"
                                            style="font-weight: bold">{{'GIẢM '.$val['phantramKM'] . "%"}}</span>
                                        <img src="{{asset('images/saleoff.png')}}" alt="saleoff" style="width: 120px;">
                                    </div>
                                    <div class="col-12 btn-combo">
                                        <button class="btn btn-danger"> Gọi combo </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev text-danger" style="font-size:50px" href="#carouselExampleControls"
                role="button" data-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next text-danger" href="#carouselExampleControls" role="button" data-slide="next"
                style="font-size:50px">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </div>
</div>
{{-- feedback --}}
<div class="container-fluid pt-2 pb-2"
    style="background: url({{asset('images/bg-fb.jpg')}}) center no-repeat;background-size: cover;">
    <div class="logo text-center">
        <img src="{{asset('images/logo.png')}}" alt="logo" class="rounded-pill" style="width:200px">
    </div>
    <h1 class="animate text-center mt-4 container" id="head-title"> ---- FEED BACK ---- </h1>
    <h1 class="text-center">Khách hàng</h1>
    <div id="carouselExampleControls" class="carousel slide p-5" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('images/kh1.jpg')}}" alt="" class="rounded-circle"
                                    style="width:150px;height:150px">
                            </div>
                            <div class="col-8"
                                style="color: #664d42;font-family: 'Dancing Script', cursive; font-size:130%">
                                <h2>Lê Thạnh</h2>
                                <p>Quán phục vụ nhiệt tình, nhân viên vui vẻ, giá cả hợp lý</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('images/kh2.jpg')}}" alt="" class="rounded-circle"
                                    style="width:150px;height:150px">
                            </div>
                            <div class="col-8"
                                style="color: #664d42;font-family: 'Dancing Script', cursive; font-size:130%">
                                <h2>Đức Phạm</h2>
                                <p>Quán phục vụ nhiệt tình, nhân viên vui vẻ, giá cả hợp lý</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('images/kh2.jpg')}}" alt="" class="rounded-circle"
                                    style="width:150px;height:150px">
                            </div>
                            <div class="col-8"
                                style="color: #664d42;font-family: 'Dancing Script', cursive; font-size:130%">
                                <h2>Lê Thạnh</h2>
                                <p>Quán phục vụ nhiệt tình, nhân viên vui vẻ, giá cả hợp lý</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('images/kh3.jpg')}}" alt="" class="rounded-circle"
                                    style="width:150px;height:150px">
                            </div>
                            <div class="col-8"
                                style="color: #664d42;font-family: 'Dancing Script', cursive; font-size:130%">
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
