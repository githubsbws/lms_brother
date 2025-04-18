@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Course;
use App\Models\Question;
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
						<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>ระบบชุดข้อสอบหลักสูตร</li>
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
										<form id="SearchFormAjax" action="/admin/index.php/grouptesting/index" method="get">
											<div class="row"><label>ชื่อหลักสูตร</label><input class="span6" name="Grouptesting[lesson_search]" id="Grouptesting_lesson_search" type="text"></div>
											<div class="row"><label>ชื่อชุด</label><input class="span6" name="Grouptesting[group_title]" id="Grouptesting_group_title" type="text" maxlength="255"></div>
											<div class="row"><button class="btn btn-primary btn-icon glyphicons search"><i></i> ค้นหา</button></div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="widget" style="margin-top: -1px;">
							<div class="widget-head">
								<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> ระบบชุดข้อสอบหลักสูตร</h4>
							</div>
							<div class="widget-body">
								<div class="separator bottom form-inline small">
									<span class="pull-right">
										<label class="strong">แสดงแถว:</label>
										<select class="selectpicker" data-style="btn-default btn-small" onchange="$.updateGridView('Grouptesting-grid', 'news_per_page', this.value)" name="news_per_page" id="news_per_page" style="display: none;">
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
									<div style="margin-top: -1px;" id="Grouptesting-grid" class="grid-view">
										<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
											<thead>
												<tr>
													<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
													<th id="Grouptesting-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/grouptesting/index?Grouptesting_sort=lesson_id">ชื่อหลักสูตร</a></th>
													<th id="Grouptesting-grid_c2"><a class="sort-link" style="color:white;" href="/admin/index.php/grouptesting/index?Grouptesting_sort=group_title">ชื่อชุด</a></th>
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
												@foreach ($coursegrouptesting as $item)
												@php
												$question = Question::where('group_id',$item->group_id)->get();
												@endphp
												<tr class="odd selectable">
													<td class="checkbox-column"><input class="select-on-check" value="254" id="chk_0" type="checkbox" name="chk[]"></td>
													<td style="width:230px">{{$item->course_title}}</td>
													<td>{{$item->group_title}}</td>
													<td style="width:65px;text-align:center">{{ count($question) }}</td>
													<td width="120px"><a class="btn btn-success btn-icon" href="/admin/index.php/question/import/254">Import excel</a></td>
													<td width="100px"><a class="btn btn-primary btn-icon" href="{{ route('group_question.create',['id' => $item->group_id]) }}">เพิ่มข้อสอบ</a></td>
													<td width="120px"><a class="btn btn-primary btn-icon" href="{{ route('group.question',['id' => $item->group_id])}}">จัดการข้อสอบ</a></td>
													<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="{{ route('grouptesting.detail',['id' => $item->group_id])}}"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{route('grouptesting.edit',['id' =>$item->group_id])}}"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="{{route('grouptesting_delete',$item->group_id )}}"><i></i></a></td>
												</tr>
											</tbody>
											
											@endforeach
										</table>
										<div class="pagination pull-right">
											<ul class="pagination margin-top-none" id="yw0">
												<li class="first "><a href="{{url('coursegrouptesting')}}">&lt;&lt; หน้าแรก</a></li>
												@if ($coursegrouptesting->currentPage() > 1)
												<li class="previous "><a href="{{ $coursegrouptesting->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
												@endif
												@for ($i = max(1, $coursegrouptesting->currentPage() - 3); $i <= min($coursegrouptesting->lastPage(), $coursegrouptesting->currentPage() + 3); $i++)
												<li class="page"><a href="{{ $coursegrouptesting->url($i) }}" class="pagination-link {{ ($i == $coursegrouptesting->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
												@endfor
												@if ($coursegrouptesting->currentPage() < $coursegrouptesting->lastPage())
												<li class="next"><a href="{{ $coursegrouptesting->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
												@endif
												@if ($coursegrouptesting->currentPage() == $coursegrouptesting->lastPage())
												<li class="last"><a href="{{ $coursegrouptesting->lastPage() }}"  class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
												@endif
											</ul>
										</div>
										<div class="keys" style="display:none" title="/admin/index.php/coursegrouptesting/index"><span>254</span><span>253</span><span>249</span><span>248</span><span>247</span><span>246</span><span>245</span><span>244</span><span>243</span><span>242</span></div>
										<input type="hidden" name="Grouptesting[news_per_page]" value="">
									</div>
								</div>
							</div>
						</div>
	
						<!-- Options -->
						<div class="separator top form-inline small">
							<!-- With selected actions -->
							<div class="buttons pull-left">
								<a class="btn btn-primary btn-icon glyphicons circle_minus" onclick="return multipleDeleteNews('/admin/index.php/Grouptesting/MultiDelete','Grouptesting-grid');" href="#"><i></i> ลบข้อมูลทั้งหมด</a>
							</div>
							<!-- // With selected actions END -->
							<div class="clearfix"></div>
						</div>
						<!-- // Options END -->
	
					</div>
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