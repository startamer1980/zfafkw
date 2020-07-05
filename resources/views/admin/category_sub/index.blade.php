@extends('layouts.admin')
@section("content")


    ﻿ <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الاقسام الفرعيه </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="{{route('admin.category')}}">الاقسام الرئيسيه</a>
                                </li>
                                <li class="breadcrumb-item active"> {{$main_cat->name}}
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
                                    <h4 class="card-title">جميع الاقسام الفرعيه لـ {{$main_cat->name}} </h4>
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
                                        <a href="{{route('admin.category.sub_category.create', $cat_id)}}" class="btn btn-outline-primary box-shadow mr-1 mb-1">اضافة قسم فرعي</a>
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th>الصوره</th>
                                                <th> الاسم</th>
                                                <th>الترتيب</th>
                                                <th>الحالة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @isset($sub_categories)
                                                @foreach($sub_categories as $cat)
                                                    <tr>
                                                <td><img src="{{$cat->image}}" class="rounded-circle height-100"> </td>
                                                <td>{{$cat->name}}</td>
                                                <td>{{$cat->sort}}</td>
                                                <td>{{$cat->getActive()}}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                         aria-label="Basic example">
                                                        <a href="{{route('admin.category.sub_category.edit', [$cat_id, $cat->id])}}"
                                                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                        <a href="{{route('admin.category.sub_category.delete', [$cat_id, $cat->id])}}"
                                                           class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                    </div>
                                                </td>
                                            </tr>
                                                @endforeach
                                            @endisset



                                            </tbody>
                                        </table>
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
