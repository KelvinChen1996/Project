@extends('layout')

@section('css')
    {{ HTML::style('public/star-rating-svg-master/src/css/star-rating-svg.css') }}
   
@endsection
   
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
            <div class="row" style="padding:0px 10px;">
                @if (session()->has('status') && session()->get('status') == false)
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <span>{{ session('message')}}</span>
                    </div>
                @elseif (session()->has('status') && session()->get('status') == true)
                    <div class="alert alert-success">
                        <button class="close" data-close="alert"></button>
                        <span>{{ session('message')}}</span>
                    </div>
                @endif
                
                @include('layout.user_sidebar',['login_info' => $login_info])
             

           
            <div class="@if($login_info->login_status == true)col-xs-12 col-sm-9 col-md-10 @else col-xs-12 col-sm-12 col-md-12 @endif">
                <div id="carousel-example-generic-v1" class="carousel slide widget-carousel" data-ride="carousel">
                    <ol class="carousel-indicators carousel-indicators-red">
                        <li data-target="#carousel-example-generic-v1" data-slide-to="0" class="circle active"></li>
                        <li data-target="#carousel-example-generic-v1" data-slide-to="1" class="circle"></li>
                        <li data-target="#carousel-example-generic-v1" data-slide-to="2" class="circle"></li>
                        <li data-target="#carousel-example-generic-v1" data-slide-to="3" class="circle"></li>
                        <li data-target="#carousel-example-generic-v1" data-slide-to="4" class="circle"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="widget-gradient" style="background-image: url(../project/public/storage/carousel/carousel1.jpg); background-size: 100% 100%;">
                                <div class="widget-gradient-body">
                                    <!-- <h3 class="widget-gradient-title">Dress Marketplace</h3> -->
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="widget-gradient" style="background-image: url(../project/public/storage/carousel/carousel2.jpg); background-size: 100% 100%;">
                                <div class="widget-gradient-body">
                                    <!-- <h3 class="widget-gradient-title">Dress Marketplace</h3> -->
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="widget-gradient" style="background-image: url(../project/public/storage/carousel/carousel3.jpg); background-size: 100% 100%;">
                                <div class="widget-gradient-body">
                                    <!-- <h3 class="widget-gradient-title">Dress Marketplace</h3> -->
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="widget-gradient" style="background-image: url(../project/public/storage/carousel/carousel4.jpg); background-size: 100% 100%;">
                                <div class="widget-gradient-body">
                                    <!-- <h3 class="widget-gradient-title">Dress Marketplace</h3> -->
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="widget-gradient" style="background-image: url(../project/public/storage/carousel/carousel5.jpg); background-size: 100% 100%;">
                                <div class="widget-gradient-body">
                                    <!-- <h3 class="widget-gradient-title">Dress Marketplace</h3> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
    </div>
</div>
@endsection

@section('script')
    {{HTML::script('public/star-rating-svg-master/src/jquery.star-rating-svg.js')}}
      
       
    <script>
    
        $( document ).ready(function() {
            $(".my-rating").starRating({
                starSize: 25,
                readOnly: true,   
            });
        });
     

    </script>
@endsection
