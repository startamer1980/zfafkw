@extends('layouts.admin')
@section("content")


    ﻿ <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> تصنيفات {{$cat->name}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> تصنيفات {{$cat->name}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">تصنيفات {{$cat->name}}</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div style="text-align: center">
                                                    <a href="{{route('admin.qabael.index', [$cat->id,1])}}">
                                                        <img src="{{asset('assets/admin/images/logo/logo.png')}}"  class="rounded-circle height-100">
                                                        <p> فيديوهات افراح {{$cat->name}} </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: center">
                                                    <a href="{{route('admin.qabael.index', [$cat->id,2])}}">
                                                        <img src="{{asset('assets/admin/images/logo/logo.png')}}"  class="rounded-circle height-100">
                                                        <p> فيديوهات مناسبات {{$cat->name}} </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: center">
                                                    <a href="{{route('admin.qabael.index', [$cat->id,3])}}">
                                                        <img src="{{asset('assets/admin/images/logo/logo.png')}}"  class="rounded-circle height-100">
                                                        <p> صور افراح {{$cat->name}} </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: center">
                                                    <a href="{{route('admin.qabael.index', [$cat->id,4])}}">
                                                        <img src="{{asset('assets/admin/images/logo/logo.png')}}"  class="rounded-circle height-100">
                                                        <p> دعوات افراح {{$cat->name}} </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: center">
                                                    <a href="{{route('admin.qabael.index', [$cat->id,5])}}">
                                                        <img src="{{asset('assets/admin/images/logo/logo.png')}}"  class="rounded-circle height-100">
                                                        <p> دعوات مناسبات {{$cat->name}} </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: center">
                                                    <a href="{{route('admin.qabael.index', [$cat->id,6])}}">
                                                        <img src="{{asset('assets/admin/images/logo/logo.png')}}"  class="rounded-circle height-100">
                                                        <p> تهنئات {{$cat->name}} </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: center">
                                                    <a href="{{route('admin.qabael.index', [$cat->id,7])}}">
                                                        <img src="{{asset('assets/admin/images/logo/logo.png')}}"  class="rounded-circle height-100">
                                                        <p> عقد قران ابناء {{$cat->name}} </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: center">
                                                    <a href="{{route('admin.qabael.index', [$cat->id,8])}}">
                                                        <img src="{{asset('assets/admin/images/logo/logo.png')}}"  class="rounded-circle height-100">
                                                        <p> ديوانيات ابناء {{$cat->name}} </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="justify-content-center d-flex">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection
