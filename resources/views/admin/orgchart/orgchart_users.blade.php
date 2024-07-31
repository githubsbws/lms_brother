
<script src="{{ asset('js/app.js') }}"></script>

@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Orgchart;
@endphp
<body class="">
	
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
            <div class="innerLR">
                <!--	-->
                <div class="widget" style="margin-top: -1px;">
                    <div class="widget-head">
                        <h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> จัดการผู้ใช้</h4>
                    </div>
                    <div class="widget-body">
                        <div class="clear-div"></div>
                        <div class="overflow-table">
                            <div style="margin-top: -1px;" id="Faq-grid" class="grid-view">
                            <form action="{{ route('orgchart.unuser',['org_id' => $org_id]) }}" method="POST">
                                @csrf
                                <table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
                                    <thead>
                                        <tr>
                                            <th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
                                            <th id="Faq-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/faq/index?Faq_sort=faq__title_TH">ชื่อผู้ใช้</a></th>
                                            <th id="Faq-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/faq/index?Faq_sort=faq__title_TH">หลักกสูตรเรียน</a></th>
                                            <th class="button-column" id="Faq-grid_c2">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_chart as $item)
                                            @php
                                            $org_chart = Orgchart::where('id',$item->department_id)->first();
                                            @endphp
                                        <tr class="odd selectable">
                                            <td class="checkbox-column"><input class="select-on-check" value="{{$item->id}}" id="chk_0" type="checkbox"  name="selected_users[]"></td>
                                            <td>{{$item->username}}</td>
                                            <td>{{ $org_chart->title}}</td>
                                            <td style="width: 90px;" class="center"><a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" name="unactive" href="{{route('orgchart.unactive',['id' => $item->id,'org_id' => $org_id])}}"><i></i></a> </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-icon glyphicons ok_2" type="submit"><i></i>บันทึกข้อมูล</button>
                            </form>
                                <div class="pagination pull-right">
                                    <ul class="pagination margin-top-none" id="yw0">
                                        <li class="first"><a href="{{url('orgchart_users/'.$org_id)}}">&lt;&lt; หน้าแรก</a></li>
                                        @if ($user_chart->currentPage() > 1)
                                            <li class="previous"><a href="{{ $user_chart->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว (User Chart)</a></li>
                                        @endif
                                        @for ($i = max(1, $user_chart->currentPage() - 3); $i <= min($user_chart->lastPage(), $user_chart->currentPage() + 3); $i++)
                                            <li class="page"><a href="{{ $user_chart->url($i) }}" class="pagination-link {{ ($i == $user_chart->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
                                        @endfor
                                        @if ($user_chart->currentPage() < $user_chart->lastPage())
                                            <li class="next"><a href="{{ $user_chart->nextPageUrl() }}" class="pagination-link">หน้าถัดไป (User Chart)</a></li>
                                        @endif
                                        @if ($user_chart->currentPage() < $user_chart->lastPage())
                                            <li class="last"><a href="{{ url('orgchart_user/'.$org_id.'?page='.$user_chart->lastPage()) }}" class="pagination-link">หน้าสุดท้าย &gt;&gt; (User Chart)</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="clear-div"></div>
                        <div class="overflow-table">
                            <div style="margin-top: -1px;" id="FaqType-grid" class="grid-view">
                                <form action="{{ route('orgchart.search', ['org_id' => $org_id]) }}" method="GET">
                                    @csrf
                                <div class="filter-form">
                                    <input type="text" name="filter_username" id="filter_username" value="{{ request()->input('filter_username') }}" placeholder="ค้นหาผู้ใช้">
                                    <button class="btn btn-primary btn-icon glyphicons search" type="submit"><i></i>ค้นหา</button>
                                </div>
                            </form>
                            <form action="{{ route('orgchart.adduser',['org_id' => $org_id]) }}" method="POST">
                                @csrf
                                <table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
                                    <thead>
                                        <tr>
                                            <th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
                                            <th id="FaqType-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/faqType/index?FaqType_sort=faq_type_title_TH">ชื่อผู้ใช้</a></th>
                                            <th id="FaqType-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/faqType/index?FaqType_sort=faq_type_title_TH">หลักกสูตรเรียน</a></th>
                                            <th class="button-column" id="FaqType-grid_c2">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                            @php
                                            $org_chart = Orgchart::where('id',$item->department_id)->first();
                                            @endphp
                                        <tr class="odd selectable">
                                            <td class="checkbox-column"><input class="select-on-check" value="{{$item->id}}" id="chk_0" type="checkbox" name="users[]"></td>
                                            <td>{{$item->username}}</td>
                                            <td>{{ $org_chart->title}}</td>
                                            <td style="width: 90px;" class="center"><a class="btn-action glyphicons pencil btn-success" title="เพิ่มผู้ใช้งาน" href="{{route('orgchart.active',['id' => $item->id,'org_id' => $org_id])}}"><i></i></a> </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-icon glyphicons ok_2" type="submit"><i></i>บันทึกข้อมูล</button>
                            </form>
                                <div class="pagination pull-right">
                                    <ul class="pagination margin-top-none" id="yw0">
                                        <li class="first"><a href="{{url('orgchart_users/'.$org_id)}}">&lt;&lt; หน้าแรก</a></li>
                                        @if ($user->currentPage() > 1)
                                            <li class="previous"><a href="{{ $user->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว (User)</a></li>
                                        @endif
                                        @for ($i = max(1, $user->currentPage() - 3); $i <= min($user->lastPage(), $user->currentPage() + 3); $i++)
                                            <li class="page"><a href="{{ $user->url($i) }}" class="pagination-link {{ ($i == $user->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
                                        @endfor
                                        @if ($user->currentPage() < $user->lastPage())
                                            <li class="next"><a href="{{ $user->nextPageUrl() }}" class="pagination-link">หน้าถัดไป (User)</a></li>
                                        @endif
                                        @if ($user->currentPage() < $user->lastPage())
                                            <li class="last"><a href="{{ url('orgchart_users/'.$org_id.'?page='.$user->lastPage()) }}" class="pagination-link">หน้าสุดท้าย &gt;&gt; (User)</a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="keys" style="display:none" title="/admin/index.php/faqType/index"><span>97</span><span>96</span></div>
                                <input type="hidden" name="FaqType[news_per_page]" value="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

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

<script>
    $(document).ready(function() {
    $('.pagination-link').click(function(event) {
        event.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                // อัปเดตตารางที่เป็นข้อมูลผู้ใช้เท่านั้น
                $('#FaqType-grid').html($(data).find('#FaqType-grid').html());
            }
        });
    });
});
$(document).ready(function() {
    $('.pagination-link').click(function(event) {
        event.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                $('#Faq-grid').html($(data).find('#Faq-grid').html());
            }
        });
    });
});
</script>
</body>
@endsection

