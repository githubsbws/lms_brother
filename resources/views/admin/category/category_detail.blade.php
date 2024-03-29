@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')

    <body class="">

        <!-- Main Container Fluid -->
        <div class="container-fluid fluid menu-left">

            <!-- Top navbar -->
            @include('admin.layouts.partials.top-nav')
            <!-- Top navbar END -->


            <!-- Sidebar menu & content wrapper -->
            <div id="wrapper">

                <!-- Sidebar Menu -->
                @include('admin.layouts.partials.menu-left')
                <!-- // Sidebar Menu END -->


                <!-- Content -->
                <!-- <div class="span-19"> -->
                <div id="content">
                    <ul class="breadcrumb">
                        <li><a href="{{route('admin')}}">หน้าหลัก</a></li> » <li><a
                                href="{{route('category')}}">ระบบหมวดหลักสูตร</a></li> » <li>หมวดหลักสูตร</li>
                    </ul><!-- breadcrumbs -->
                    <div class="separator bottom"></div>

                    <!-- innerLR -->
                    <div class="innerLR">
                        <div class="widget widget-tabs border-bottom-none">
                            <div class="widget-head">
                                <ul>
                                    <li class="active">
                                        <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                            <i></i>หมวดหลักสูตร </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-body">
                                <div class="form">
                                        <div class="row">
                                        </div>

                                        <div class="row">
                                        </div>

                                        <div class="row">
                                            <label for="Category_cate_title" class="required">ชื่อหมวดหลักสูตร <span
                                                    class="required">*</span></label>
                                                <h5>{{ $category->cate_title}}</h5>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Category_cate_title_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="Category_cate_short_detail" class="required">รายละเอียดย่อ <span
                                                    class="required">*</span></label>
                                                    <h5>{{ $category->cate_short_detail }}</h5>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Category_cate_short_detail_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <br>    
                                        <div class="row">
                                            <label for="Category_cate_detail" class="required">รายละเอียด <span
                                                    class="required">*</span></label>
                                                    <h5>{!! htmlspecialchars_decode($category->cate_detail) !!}</h5>
                                                
                                        </div>
                                        <br>

                                        <br>
                                        <br>

                                        <div class="row">
                                            <div id="picture_show" style="">
                                                ภาพประกอบ <br>
                                                <img src="{{ asset('images/uploads/category/'.$category->cate_id.'/original/'. $category->cate_image) }}"
                                                    alt="รูปภาพ" style="width: 300px; " id="selected_picture"
                                                     name="cate_image_o"><br><br>
                                            </div>
                                        </div>
                                        <br>
                                </div><!-- form -->
                            </div>
                        </div>
                    </div>
                    <!-- END innerLR -->
                    <div id="sidebar">
                    </div><!-- sidebar -->
                </div>
                <!-- </div> -->
                <!-- <div class="span-5 last"> -->
                <!-- </div> -->
                <!-- // Content END -->

            </div>
            <div class="clearfix"></div>
            <!-- // Sidebar menu & content wrapper END -->

            <div id="footer" class="hidden-print">

                <!--  Copyright Line -->
                <div class="copy">© 2023 - All Rights Reserved.</a></div>
                <!--  End Copyright Line -->

            </div>
            <!-- // Footer END -->

        </div>

    </body>

@endsection
