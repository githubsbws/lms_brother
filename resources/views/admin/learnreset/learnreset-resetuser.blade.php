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
				<!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<div class="innerLR">
					<!-- Box -->
				</div>
			</div>
		</div>
	</div>
	<div class="widget" style="margin-top: -1px;">
		<div class="widget-head">
			<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> ระบบชุดข้อสอบบทเรียนออนไลน์</h4>
		</div>
		<div class="widget-body">
			
			<div class="clear-div"></div>
			<div class="overflow-table">
				<div style="margin-top: -1px;" id="Grouptesting-grid" class="grid-view">
					<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
						<thead>
							<tr>
								<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
								<th id="Grouptesting-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/grouptesting/index?Grouptesting_sort=lesson_id">user_id</a></th>
								<th id="Grouptesting-grid_c2"><a class="sort-link" style="color:white;" href="/admin/index.php/grouptesting/index?Grouptesting_sort=group_title">lesson_id</a></th>
								<th id="Grouptesting-grid_c2"><a class="sort-link" style="color:white;" href="/admin/index.php/grouptesting/index?Grouptesting_sort=group_title">score_total</a></th>
								<th id="Grouptesting-grid_c3">จำนวนข้อ</th>
								<th id="Grouptesting-grid_c4">&nbsp;</th>
								<th id="Grouptesting-grid_c5">&nbsp;</th>
								<th id="Grouptesting-grid_c6">&nbsp;</th>
								<th class="button-column" id="Grouptesting-grid_c7">จัดการ</th>
							</tr>
							<tr class="filters">
								<td>&nbsp;</td>
								<td><input name="Grouptesting[lesson_search]" id="Grouptesting_lesson_search" type="text"></td>
								<td><input name="Grouptesting[group_title]" type="text" maxlength="255"></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($score as $item)
							@if($item->active === 'y')
							<tr class="odd selectable">
								<td class="checkbox-column"><input class="select-on-check" value="254" id="chk_0" type="checkbox" name="chk[]"></td>
								<td style="width:230px">{{$item->user_id}}</td>
								<td>{{$item->lesson_id}}</td>
								<td style="width:65px;text-align:center">{{$item->score_total}}</td>
								<td width="120px"><a class="btn btn-success btn-icon" href="{{route('learnreset_resetuser_insert', ['user_id' => $item->user_id,'lesson_id' => $item->lesson_id])}}">learnreset</a></td>
								<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/grouptesting/254"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{route('grouptesting_edit',$item->score_id)}}"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="{{route('grouptesting_delete',$item->score_id )}}"><i></i></a></td>
							</tr>
						</tbody>
						@endif
						@endforeach
					</table>
					<div class="pagination pull-right">
						<ul class="" id="yw1">
							<li class="first hidden"><a href="/admin/index.php/grouptesting/index">&lt;&lt; หน้าแรก</a></li>
							<li class="previous hidden"><a href="/admin/index.php/grouptesting/index">&lt; หน้าที่แล้ว</a></li>
							<li class="page active"><a href="/admin/index.php/grouptesting/index">1</a></li>
							<li class="page"><a href="/admin/index.php/grouptesting/index?Grouptesting_page=2">2</a></li>
							<li class="page"><a href="/admin/index.php/grouptesting/index?Grouptesting_page=3">3</a></li>
							<li class="page"><a href="/admin/index.php/grouptesting/index?Grouptesting_page=4">4</a></li>
							<li class="page"><a href="/admin/index.php/grouptesting/index?Grouptesting_page=5">5</a></li>
							<li class="page"><a href="/admin/index.php/grouptesting/index?Grouptesting_page=6">6</a></li>
							<li class="next"><a href="/admin/index.php/grouptesting/index?Grouptesting_page=2">หน้าถัดไป &gt;</a></li>
							<li class="last"><a href="/admin/index.php/grouptesting/index?Grouptesting_page=6">หน้าสุดท้าย &gt;&gt;</a></li>
						</ul>
					</div>
					<div class="keys" style="display:none" title="/admin/index.php/Grouptesting/index"><span>254</span><span>253</span><span>249</span><span>248</span><span>247</span><span>246</span><span>245</span><span>244</span><span>243</span><span>242</span></div>
					<input type="hidden" name="Grouptesting[news_per_page]" value="">
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

</body>
@endsection