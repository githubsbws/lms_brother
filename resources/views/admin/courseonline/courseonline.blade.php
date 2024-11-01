@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Coursegrouptesting;
use App\Models\Teacher;
@endphp
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
                        <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>หลักสูตรนิสิต/นักศึกษา</li>
                    </ul><!-- breadcrumbs -->
                    <div class="separator bottom"></div>


                    <div class="innerLR">
                        <div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">
                            <div class="widget-head">
                                <h4 class="heading  glyphicons search"><i></i>ค้นหาขั้นสูง</h4>
                                <span class="collapse-toggle"></span>
                            </div>
                            <div class="widget-body collapse" style="height: 0px;">
                                <div class="search-form">
                                    <div class="wide form">
                                        <form id="SearchFormAjax" action="/admin/index.php/courseOnline/index"
                                            method="get">
                                            <div class="row"><label>หมวดอบรมออนไลน์</label><input class="span6"
                                                    name="CourseOnline[cates_search]" id="CourseOnline_cates_search"
                                                    type="text"></div>
                                            <div class="row"><label>รหัสหลักสูตร</label><input class="span6"
                                                    name="CourseOnline[course_number]" id="CourseOnline_course_number"
                                                    type="text" maxlength="255"></div>
                                            <div class="row"><label>ชื่อวิยากร</label><select class="span6"
                                                    name="CourseOnline[course_lecturer]" id="CourseOnline_course_lecturer">
                                                    <option value="">ทั้งหมด</option>
                                                    <option value="56">อาจารย์ นภัทร สุขศิริภูริภัทร</option>
                                                    <option value="55">Prakaikoon Thomma (Noon)</option>
                                                    <option value="54">Prakaikoon Thomma (Noon)</option>
                                                    <option value="53">Sale &amp; Marketing team</option>
                                                    <option value="52">Thipaya Traisathienkul</option>
                                                    <option value="51">คุณ วรศักดิ์ ประดิษฐ์กุล </option>
                                                    <option value="50">ople</option>
                                                    <option value="49">น.ส. อมรรัตน์ ทรงงาม</option>
                                                    <option value="48">น.ส.ณัฐธิณา แย้มสวัสดิ์</option>
                                                    <option value="43">Mr. Piyapong Jaikla (Ae)</option>
                                                    <option value="42">Mr. Kittaphob Srikhao (Ake)</option>
                                                    <option value="40">Ms.Sukumal DephasdinNaAyudhya (Su)</option>
                                                    <option value="38">Mr. Jakkit Rabtanyaboon (Tum)</option>
                                                    <option value="34">Mr.Mongkol Inkamnerd </option>
                                                    <option value="33">อุกฤษฏ์ จำปา</option>
                                                    <option value="32">กำพล ชมเกษร</option>
                                                    <option value="31">Naphat Suksiriphuriphat</option>
                                                    <option value="30">จิณพงศ์ คำดี</option>
                                                    <option value="29">วิศิษฎ์ วิบูลย์วิมลรัตน์</option>
                                                    <option value="26">อาจารย์ กิติชัย วิเศษศิริ</option>
                                                    <option value="25">อาจารย์ชาญวิทย์ ใยบัว </option>
                                                    <option value="24">อาจารย์ฐิติวัชร์ ปาตัก</option>
                                                </select></div>
                                            <div class="row"><label>ชื่อหลักสูตรอบรมออนไลน์</label><input class="span6"
                                                    name="CourseOnline[course_title]" id="CourseOnline_course_title"
                                                    type="text" maxlength="255"></div>
                                            <div class="row"><label>ราคา</label><input class="span6"
                                                    name="CourseOnline[course_price]" id="CourseOnline_course_price"
                                                    type="text"></div>
                                            <div class="row"><button
                                                    class="btn btn-primary btn-icon glyphicons search"><i></i>
                                                    ค้นหา</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget" style="margin-top: -1px;">
                            <div class="widget-head">
                                <h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> หลักสูตรนิสิต/นักศึกษา
                                </h4>
                            </div>
                            <div class="widget-body">
                                <div class="separator bottom form-inline small">
                                    <span class="pull-right">
                                        <label class="strong">แสดงแถว:</label>
                                        <select class="selectpicker" data-style="btn-default btn-small"
                                            onchange="$.updateGridView('CourseOnline-grid', 'news_per_page', this.value)"
                                            name="news_per_page" id="news_per_page" style="display: none;">
                                            <option value="">ค่าเริ่มต้น (10)</option>
                                            <option value="10">10</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="250">250</option>
                                        </select>
                                        <div class="btn-group bootstrap-select"><button
                                                class="btn dropdown-toggle clearfix btn-default btn-small"
                                                data-toggle="dropdown" id="news_per_page"><span
                                                    class="filter-option pull-left">ค่าเริ่มต้น (10)</span>&nbsp;<span
                                                    class="caret"></span></button>
                                            <div class="dropdown-menu" role="menu">
                                                <ul style="max-height: none; overflow-y: auto;">
                                                    <li rel="0"><a tabindex="-1" href="#">ค่าเริ่มต้น
                                                            (10)</a></li>
                                                    <li rel="1"><a tabindex="-1" href="#">10</a></li>
                                                    <li rel="2"><a tabindex="-1" href="#">50</a></li>
                                                    <li rel="3"><a tabindex="-1" href="#">100</a></li>
                                                    <li rel="4"><a tabindex="-1" href="#">200</a></li>
                                                    <li rel="5"><a tabindex="-1" href="#">250</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="clear-div"></div>
                                <div class="overflow-table">
                                    <div style="margin-top: -1px;" id="CourseOnline-grid" class="grid-view">
                                        <table
                                            class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
                                            <thead>
                                                <tr>
                                                    <th class="checkbox-column" id="chk"><input
                                                            class="select-on-check-all" type="checkbox" value="1"
                                                            name="chk_all" id="chk_all"></th>
                                                    <th id="CourseOnline-grid_c1">รูปภาพ</th>
                                                    <th id="CourseOnline-grid_c2"><a class="sort-link"
                                                            style="color:white;"
                                                            href="/admin/index.php/courseOnline/index?CourseOnline_sort=course_title">ชื่อหลักสูตรอบรมออนไลน์</a>
                                                    </th>
                                                    <th id="CourseOnline-grid_c3"><a class="sort-link"
                                                            style="color:white;"
                                                            href="/admin/index.php/courseOnline/index?CourseOnline_sort=cate_id">หมวดอบรมออนไลน์</a>
                                                    </th>
                                                    <th id="CourseOnline-grid_c4"><a class="sort-link"
                                                            style="color:white;"
                                                            href="/admin/index.php/courseOnline/index?CourseOnline_sort=course_lecturer">ชื่อวิยากร</a>
                                                    </th>
                                                    <th style="text-align:center;" id="CourseOnline-grid_c5">ย้าย</th>
                                                    <th class="button-column" id="CourseOnline-grid_c6">จัดการ</th>
                                                </tr>
                                                <tr class="filters">
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td><input name="CourseOnline[course_title]" type="text"
                                                            maxlength="255"></td>
                                                    <td><input name="CourseOnline[cates_search]"
                                                            id="CourseOnline_cates_search" type="text"></td>
                                                    <td><select class="" name="CourseOnline[course_lecturer]"
                                                            id="CourseOnline_course_lecturer">
                                                            <option value="">ทั้งหมด</option>
                                                            <option value="56">อาจารย์ นภัทร สุขศิริภูริภัทร</option>
                                                            <option value="55">Prakaikoon Thomma (Noon)</option>
                                                            <option value="54">Prakaikoon Thomma (Noon)</option>
                                                            <option value="53">Sale &amp; Marketing team</option>
                                                            <option value="52">Thipaya Traisathienkul</option>
                                                            <option value="51">คุณ วรศักดิ์ ประดิษฐ์กุล </option>
                                                            <option value="50">ople</option>
                                                            <option value="49">น.ส. อมรรัตน์ ทรงงาม</option>
                                                            <option value="48">น.ส.ณัฐธิณา แย้มสวัสดิ์</option>
                                                            <option value="43">Mr. Piyapong Jaikla (Ae)</option>
                                                            <option value="42">Mr. Kittaphob Srikhao (Ake)</option>
                                                            <option value="40">Ms.Sukumal DephasdinNaAyudhya (Su)
                                                            </option>
                                                            <option value="38">Mr. Jakkit Rabtanyaboon (Tum)</option>
                                                            <option value="34">Mr.Mongkol Inkamnerd </option>
                                                            <option value="33">อุกฤษฏ์ จำปา</option>
                                                            <option value="32">กำพล ชมเกษร</option>
                                                            <option value="31">Naphat Suksiriphuriphat</option>
                                                            <option value="30">จิณพงศ์ คำดี</option>
                                                            <option value="29">วิศิษฎ์ วิบูลย์วิมลรัตน์</option>
                                                            <option value="26">อาจารย์ กิติชัย วิเศษศิริ</option>
                                                            <option value="25">อาจารย์ชาญวิทย์ ใยบัว </option>
                                                            <option value="24">อาจารย์ฐิติวัชร์ ปาตัก</option>
                                                        </select></td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- แก้ไข --}}
                                                @foreach ($course_online as $item)
                                                    @if ($item->active == 'y')
                                                    @php
                                                    $chktest = Coursegrouptesting::where('course_id',$item->course_id)->get();
                                                    $teacher = Teacher::where('teacher_id',$item->course_lecturer)->first();
                                                    @endphp
                                                        <tr class="items[]">
                                                            <td class="checkbox-column"><input class="select-on-check"
                                                                    value="176" id="chk_0" type="checkbox"
                                                                    name="chk[]"></td>
                                                            <td width="110"><img
                                                                    src="{{ asset('images/uploads/courseonline/'.$item->course_id.'/original/' . $item->course_picture) }}"
                                                                    alt="{{ $item->course_picture }}"></td>
                                                            <td>{{ $item->course_title }}</td>
                                                            <td style="width:130px">{{ $item->cate_title }}</td>
                                                            @if($teacher != null)
                                                            <td width="150">{{ $teacher->teacher_name}}</td>
                                                            @else
                                                            <td width="150">-</td>
                                                            @endif
                                                            <td style="text-align: center; width:50px;" class="row_move">
                                                                <a  class="glyphicons move btn-action btn-inverse"><i></i></a>
                                                            </td>
                                                            <td style="width: 90px;" class="center">
                                                                <a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด"  href="{{ route('courseonline.detail',['id'=>$item->course_id]) }}"><i></i></a>
                                                                <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{ route('courseonline.edit',['id' =>$item->course_id]) }}"><i></i></a>
                                                                <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ"href="{{ route('courseonline.delete',['id' =>$item->course_id]) }}" onclick="return confirm('คุณต้องการเปลี่ยนสถานะ หรือไม่ ?')"><i></i></a>   
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                {{-- แก้ไข --}}
                                                
                                                {{-- <tr class="items[]_176">
												<td class="checkbox-column"><input class="select-on-check" value="176" id="chk_0" type="checkbox" name="chk[]"></td>
												<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/courseonline/176/small/26092017214417_Picture.jpg" alt="26092017214417_Picture.jpg"></td>
												<td>หลักสูตรการอบรมขั้นพื้นฐานสำหรับเครื่องพิมพ์ Inkjet Tank System.</td>
												<td style="width:130px">Brother E-learning System</td>
												<td width="150">อาจารย์ฐิติวัชร์ ปาตัก</td>
												<td style="text-align: center; width:50px;" class="row_move"><a class="glyphicons move btn-action btn-inverse"><i></i></a></td>
												<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/courseOnline/176"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/courseOnline/update/176"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/courseOnline/delete/176"><i></i></a></td>
											</tr> --}}
											
                                            </tbody>
                                        </table>
                                        <div class="pagination pull-right">
                                            <ul class="pagination margin-top-none" id="yw0">
                                                <li class="first "><a href="{{url('courseonline')}}">&lt;&lt; หน้าแรก</a></li>
                                                @if ($course_online->currentPage() > 1)
                                                <li class="previous "><a href="{{ $course_online->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
                                                @endif
                                                @for ($i = max(1, $course_online->currentPage() - 3); $i <= min($course_online->lastPage(), $course_online->currentPage() + 3); $i++)
                                                <li class="page"><a href="{{ $course_online->url($i) }}" class="pagination-link {{ ($i == $course_online->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
                                                @endfor
                                                @if ($course_online->currentPage() < $course_online->lastPage())
                                                <li class="next"><a href="{{ $course_online->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
                                                @endif
                                                @if ($course_online->currentPage() < $course_online->lastPage())
                                                <li class="last"><a href="{{ url('courseonline?page='.$course_online->lastPage()) }}"  class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="keys" style="display:none"
                                            title="/admin/index.php/CourseOnline/index">
                                            <span>176</span><span>192</span><span>191</span><span>197</span><span>232</span><span>231</span><span>209</span><span>222</span><span>182</span><span>223</span>
                                        </div>
                                        <input type="hidden" name="CourseOnline[news_per_page]" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Options -->
                        <div class="separator top form-inline small">
                            <!-- With selected actions -->
                            <div class="buttons pull-left">
                                <a class="btn btn-primary btn-icon glyphicons circle_minus"
                                    onclick="return multipleDeleteNews('/admin/index.php/CourseOnline/MultiDelete','CourseOnline-grid');"
                                    href="#"><i></i> ลบข้อมูลทั้งหมด</a>
                            </div>
                            <!-- // With selected actions END -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- // Options END -->


                    </div>
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
