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
                        <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="{{ url('pgroup') }}">pgroup name</a>
                        </li> » <li>แก้ pgroup name</li>
                    </ul><!-- breadcrumbs -->
                    <div class="separator bottom"></div>


                    <!-- innerLR -->
                    <div class="innerLR">
                        <div class="widget" style="margin-top: -1px;">
                            <div class="widget-head">
                                <h4 class="heading glyphicons show_thumbnails_with_lines"><i></i>เพิ่มข้อมูล</h4>
                            </div>
                            <div class="widget-body">
                                <form action="{{ route('pgroup_update',['pgroup_id'=>$group_id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-control">
                                        <p>ชื่อกลุ่มผู้ใช้งาน<i style="color:red">*</i></p>
                                        <input type="text" id="group_name" name="group_name" value="{{ $group_id->group_name }}"@disabled(true)>
                                    </div>
                                    <div class="form-control">
                                        <div class="table-responsive">
                                            <p>เลือกเมนูและบันทึกลงฐานข้อมูล</p>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="row">เลือก</th>
                                                        <th scope="row">เมนูหลัก</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($menuHead as $menuHeads )
                                                        <div class="menu">
                                                            <tr>
                                                                @if(!$checked)
                                                                    <td><input type="checkbox" id="{{ $menuHeads->id }}" name="menu[]" value="{{ $menuHeads->id }}"></td>
                                                                    <td><label for="">{{ $menuHeads->name }}</label></td>

                                                                @else
                                                                    <td><input type="checkbox" id="{{ $menuHeads->id }}" name="menu[]" value="{{ $menuHeads->id }}"  {{ in_array($menuHeads->id, $checked) ? 'checked' : '' }}></td>
                                                                    <td><label for="">{{ $menuHeads->name }}</label></td>
                                                                    <input type="hidden" name="checkMenu[]" value="{{ $menuHeads->id }}">
                                                                @endif
                                                            </tr>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button type="submit">บันทึก</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sidebar">
                </div><!-- sidebar -->
                        <!-- // Content END -->
                    <div class="clearfix"></div>
                    <!-- // Sidebar menu & content wrapper END -->
            </div>
            <div id="footer" class="hidden-print">

                        <!--  Copyright Line -->
                <div class="copy">© 2023 - All Rights Reserved.</a></div>
                        <!--  End Copyright Line -->

            </div>
            <!-- // Footer END -->

        </div>
    </body>
@endsection

