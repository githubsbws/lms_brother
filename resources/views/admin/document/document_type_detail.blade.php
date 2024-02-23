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
            <div id="content">
                <ul class="breadcrumb">
                    <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="/admin/index.php/faq/index">เอกสารและประเภทเอกสาร</a></li> »
                    <li>เอกสารและประเภทเอกสาร</li>
                </ul><!-- breadcrumbs -->
                <div class="separator bottom"></div>

                <!-- innerLR -->
                <div class="innerLR">
                    <div class="widget widget-tabs border-bottom-none">
                        <div class="widget-head">
                            <ul>
                                <li class="active">
                                    <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                        <i></i>เอกสารและประเภทเอกสาร</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-body">
                            <div class="form">
                            
                                    <div class="row">
                                        <label for="faq_type_id" class="required">ชื่อหัวข้อ <span class="required">*</span></label>
                                        <h5>{{ $document_type->download_name}}</h5>
                                    </div>

                                    <div class="row">
                                        <label for="faq_THtopic" class="required">วันที่เพิ่มข้อมูล <span class="required">*</span></label>
                                        <h5>{{ $document_type->update_date }}</h5>
                                    </div>

                            </div><!-- form -->
                        </div>
                    </div>
                </div>
                <!-- END innerLR -->

                <div id="sidebar">
                </div><!-- sidebar -->
            </div>
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
