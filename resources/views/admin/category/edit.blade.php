@extends('layouts.admin')
@section("content")


    ﻿ <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.category')}}"> الاقسام </a>
                                </li>
                                <li class="breadcrumb-item active">تعديل قسم
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تعديل قسم </h4>
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
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.category.update', $cat->id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$cat->id}}">
                                            <div class="form-group">
                                                <label> صوره القسم </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="image">
                                                    <span class="file-custom"></span>
                                                </label>
                                                <img src="{{$cat->image}}" class="rounded-circle height-100">
                                                @error('image')
                                                <span class="text-danger"> </span>
                                                @enderror
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الاسم </label>
                                                            <input type="text" value="{{$cat->name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم القسم  "
                                                                   name="name">
                                                            @error('name')
                                                            <span class="text-danger"></span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الترتيب </label>
                                                            <input type="text" value="{{$cat->sort}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="ترتيب ظهور القسم  "
                                                                   name="sort">
                                                            @error('sort')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> نوع القسم </label>
                                                            <select name="type_category" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر نوع القسم ">
                                                                    <option value="1" @if ($cat->type_category == 1) selected @endif>قاعات</option>
                                                                    <option value="2" @if ($cat->type_category == 2) selected @endif>مقدمي خدمات</option>
                                                                    <option value="3" @if ($cat->type_category == 3) selected @endif>المناسبات العامه</option>
                                                                    <option value="4" @if ($cat->type_category == 4) selected @endif>فيديوهات افراح القبائل </option>
                                                                    <option value="5" @if ($cat->type_category == 5) selected @endif>قبائل</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('type_category')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1" name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if ($cat->active == 1) checked @endif/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة </label>
                                                        </div>
                                                        @error('active')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1" name="is_hase_sub_category"
                                                                   id="switcheryColor5"
                                                                   class="switchery" data-color="success"
                                                                   @if ($cat->is_hase_sub_category == 1) checked @endif/>
                                                            <label for="switcheryColor5"
                                                                   class="card-title ml-1">هل يحتوي اقسام فرعيه </label>
                                                        </div>
                                                        @error('is_hase_sub_category')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
