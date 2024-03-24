@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
<style>
    .menu {
    display: flex;
    align-items: center; /* จัดให้ข้อความอยู่ตรงกลางตา */
    }

    .menu input[type="checkbox"] {
        margin-right: 8px; /* ระยะห่างระหว่าง checkbox กับข้อความ */
    }
</style>
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
                                <form action="{{ route('pgroup_insert') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-control">
                                        <p>ชื่อกลุ่มผู้ใช้งาน<i style="color:red">*</i></p>
                                        <input type="text" id="group_name" name="group_name">
                                    </div>
                                    <div class="table-responsive">
                                        <p>เลือกเมนูและบันทึกลงฐานข้อมูล</p>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="row"><input type="checkbox" id="select-all"><span> </span>เลือกทั้งหมด</th>
                                                    <th scope="row">เมนูหลัก</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($menuHead as $menuHeads )
                                                <tr>
                                                    <td><input type="checkbox" id="{{ $menuHeads->id }}" name="menu[]" value="{{ $menuHeads->id }}"></td>
                                                    <td><label for="">{{ $menuHeads->name }}</label></td>
                                                </tr>
                                                    {{-- <div class="menu">
                                                    </div> --}}

                                                        {{-- <ul>
                                                        @foreach ($menuList as $menuLists)
                                                            @if ($menuHeads->id == $menuLists->parent_id)
                                                                <li>
                                                                    <div class="sub-menu">
                                                                        <input type="checkbox" id="{{ $menuLists->id }}" name="menu[]" value="{{ $menuLists->id }}">
                                                                        <label for="">{{ $menuLists->name }}</label>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                        </ul> --}}

                                                    {{-- <hr> --}}
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success">บันทึก</button>
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

        <script type="text/javascript">
            var selectAllCheckbox = document.getElementById('select-all');

         // เพิ่มการฟังก์ชันให้กับองค์ประกอบ input เมื่อมีการคลิก
             selectAllCheckbox.addEventListener('click', function() {
                 // รับองค์ประกอบทั้งหมดของ input checkbox ในเอกสาร
                 var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                 // วนลูปผ่าน input checkbox ทั้งหมด
                 checkboxes.forEach(function(checkbox) {
                     // ตรวจสอบว่า checkbox ไม่ใช่ select-all และกำหนดค่า checked ให้เท่ากับค่า checked ของ select-all
                     if (checkbox !== selectAllCheckbox) {
                         checkbox.checked = selectAllCheckbox.checked;
                     }
                 });
             });
         </script>
    </body>
@endsection

