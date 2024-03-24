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
                    <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>ติดต่อเรา</li>
                </ul><!-- breadcrumbs -->
                <div class="separator bottom"></div>

                <div class="innerLR">
                    <div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">
                        <div class="widget-head">
                            <h4 class="heading glyphicons search"><i></i>ค้นหาขั้นสูง</h4>
                            <span class="collapse-toggle"></span>
                        </div>
                        <div class="widget-body collapse" style="height: 0px;">
                            <div class="search-form">
                                <div class="wide form">
                                    <form id="SearchFormAjax" action="/admin/index.php/contact/index" method="get">
                                        <div class="row"><label>คำถาม</label><input class="span6" name="Contact[contac_by_name]" id="Contact_contac_by_name" type="text" maxlength="250"></div>
                                        <div class="row"><button class="btn btn-primary btn-icon glyphicons search"><i></i> ค้นหา</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget" style="margin-top: -1px;">
                        <div class="widget-head">
                            <h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> ข้อมูลติดต่อเรา</h4>
                        </div>
                        <div class="widget-body">
                            <div class="separator bottom form-inline small">
                                <span class="pull-right" style="margin-left: 10px;">
									<a class="btn btn-primary btn-icon glyphicons circle_plus" href={{url('contactus_create')}}><i></i> เพิ่มข้อมูลติดต่อ</a>
								</span>
                                <span class="pull-right">
                                    <label class="strong">แสดงแถว:</label>
                                    <select class="selectpicker" data-style="btn-default btn-small" onchange="$.updateGridView('Contact-grid', 'news_per_page', this.value)" name="news_per_page" id="news_per_page" style="display: none;">
                                        <option value="">ค่าเริ่มต้น (10)</option>
                                        <option value="10">10</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="250">250</option>
                                    </select>
                                    <div class="btn-group bootstrap-select"><button class="btn dropdown-toggle clearfix btn-default btn-small" data-toggle="dropdown" id="news_per_page"><span class="filter-option pull-left">ค่าเริ่มต้น (10)</span>&nbsp;<span class="caret"></span></button>
                                        <div class="dropdown-menu" role="menu">
                                            <ul style="max-height: none; overflow-y: auto;">
                                                <li rel="0"><a tabindex="-1" href="#">ค่าเริ่มต้น (10)</a></li>
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
                                <div style="margin-top: -1px;" id="Contact-grid" class="grid-view">
                                    <table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
                                                <th id="Contact-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/contact/index?Contact_sort=contac_by_name">ชื่อ</a></th>
                                                <th id="Contact-grid_c2"><a class="sort-link" style="color:white;" href="/admin/index.php/contact/index?Contact_sort=contac_by_surname">นามสกุล</a></th>
                                                <th id="Contact-grid_c3"><a class="sort-link" style="color:white;" href="/admin/index.php/contact/index?Contact_sort=contac_by_email">อีเมล</a></th>
                                                <th id="Contact-grid_c4"><a class="sort-link" style="color:white;" href="/admin/index.php/contact/index?Contact_sort=contac_by_tel">เบอร์โทรศัพท์</a></th>
                                                <th id="Contact-grid_c5"><a class="sort-link" style="color:white;" href="/admin/index.php/contact/index?Contact_sort=contac_subject">หัวข้อติดต่อ</a></th>
                                                <th id="Contact-grid_c6"><a class="sort-link" style="color:white;" href="/admin/index.php/contact/index?Contact_sort=contac_detail">รายละเอียดติดต่อ</a></th>
                                                <th id="Contact-grid_c7"><a class="sort-link" style="color:white;" href="/admin/index.php/contact/index?Contact_sort=contac_ans_subject">หัวข้อคำตอบ</a></th>
                                                <th id="Contact-grid_c8"><a class="sort-link" style="color:white;" href="/admin/index.php/contact/index?Contact_sort=contac_ans_detail">รายละเอียดคำตอบ</a></th>
                                                <th id="Contact-grid_c9" class="button-column">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contactus as $item)
                                            @if($item->active === 'y')

                                                <tr class="odd selectable">
                                                    <td class="checkbox-column"><input class="select-on-check" value="{{$item->contac_id}}" id="chk_{{$item->contac_id}}" type="checkbox" name="chk[]"></td>
                                                    <td>{{$item->contac_by_name}}</td>
                                                    <td>{{$item->contac_by_surname}}</td>
                                                    <td>{{$item->contac_by_email}}</td>
                                                    <td>{{$item->contac_by_tel}}</td>
                                                    <td>{{$item->contac_subject}}</td>
                                                    <td>{{$item->contac_detail}}</td>
                                                    <td>{{$item->contac_ans_subject}}</td>
                                                    <td>{{$item->contac_ans_detail}}</td>
                                                    <td style="width: 90px;" class="center">
                                                        <a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="{{route('contactus.view',['id'=>$item->contac_id])}}"><i></i></a>
                                                        <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{route('contactus.edit_page',['id'=>$item->contac_id])}}"><i></i></a>
                                                        <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/contactus_delete/{{$item->contac_id}}" onclick="return confirm('คุณต้องการลบข้อมูลติดต่อเราของ {{$item->contac_by_name}} หรือไม่?')"><i></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination pull-right">
										<ul class="pagination margin-top-none" id="yw0">
											<li class="first "><a href="{{url('contactus')}}">&lt;&lt; หน้าแรก</a></li>
											@if ($contactus->currentPage() > 1)
											<li class="previous "><a href="{{ $contactus->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
											@endif
											@for ($i = max(1, $contactus->currentPage() - 3); $i <= min($contactus->lastPage(), $contactus->currentPage() + 3); $i++)
											<li class="page"><a href="{{ $contactus->url($i) }}" class="pagination-link {{ ($i == $contactus->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
											@endfor
											@if ($contactus->currentPage() < $contactus->lastPage())
											<li class="next"><a href="{{ $contactus->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
											@endif
											@if ($contactus->currentPage() < $contactus->lastPage())
											<li class="last"><a href="{{ url('contactus?page='.$contactus->lastPage()) }}"  class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
											@endif
										</ul>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="separator top form-inline small">
                        <!-- With selected actions -->
                        <div class="buttons pull-left">
                            <a class="btn btn-primary btn-icon glyphicons circle_minus" onclick="return multipleDeleteNews('/admin/index.php/contact/MultiDelete','Contact-grid');" href="#"><i></i> ลบข้อมูลทั้งหมด</a>
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
