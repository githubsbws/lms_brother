@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Learn;
use App\Models\Course;
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
				<!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<div class="innerLR">
					<!-- Box -->
					<div class="hero-unit well">
						<div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">
							<div class="widget-head">
								<h4 class="heading  glyphicons search"><i></i>ค้นหาขั้นสูง</h4>
								<span class="collapse-toggle"></span>
							</div>
							
								<div class="search-form">
									<div class="wide form">
										<form id="SearchFormAjax" action="{{route('report.coursesearch')}}" method="get">
											@php
											$search_course = Course::where('active','y')->get();
											@endphp
											<div class="row"><label>ชื่อหลักสูตร</label>
												<select name="course_name" id="course_name">
													<option value=""></option>
													@foreach($search_course as $sc)
													<option value="{{$sc->course_id}}">{{ $sc->course_title }}</option>
													@endforeach
												</select>
											</div>
											<div class="row"><button class="btn btn-primary btn-icon glyphicons search"><i></i> ค้นหา</button></div><br>
										</form>
									</div>
								</div>
							
						</div>
						<hr class="separator">
						<!-- Row -->
						<div class="overflow-table">
							<div style="margin-top: -1px;" id="Vdo-grid" class="grid-view">
								<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
									<thead>
										<tr>
											<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
											<th><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_title">ชื่อหลักสูตร</a></th>
											<th><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">ชื่อบทเรียน</a></th>
											<th><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">จำนวนผู้เรียน</a></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($course as $cs)
										@php
										$co = Course::find($cs->course_id);
										$learn = Learn::where('lesson_id',$cs->id)->get();
										@endphp
										<tr class="odd selectable">
											
											<td class="checkbox-column"><input class="select-on-check" value="" id="chk_0" type="checkbox" name="chk[]"></td>
											@if($co != null)
											<td><a href="{{ route('report.lesson',['id' => $co->course_id])}}">{{ $co->course_title }}</a></td>
											@else
											<td> - </td>
											@endif
											<td>{{ $cs->title }}</td>
											<td>{{ count($learn) }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								
								<div class="pagination pull-right">
									<ul class="pagination margin-top-none" id="yw0">
										<li class="first"><a href="{{url('report_course')}}">&lt;&lt; หน้าแรก</a></li>
										@if ($course->currentPage() > 1)
											<li class="previous"><a href="{{ $course->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
										@endif
										@for ($i = max(1, $course->currentPage() - 3); $i <= min($course->lastPage(), $course->currentPage() + 3); $i++)
											<li class="page"><a href="{{ $course->url($i) }}" class="pagination-link {{ ($i == $course->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
										@endfor
										@if ($course->currentPage() < $course->lastPage())
											<li class="next"><a href="{{ $course->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
										@endif
										@if ($course->currentPage() < $course->lastPage())
											<li class="last"><a href="{{ url('report_course?page='.$course->lastPage()) }}" class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
										@endif
									</ul>
								</div>
								
							</div>
						</div>
					</div>
				</div>
						<!-- // Row END -->

					</div>
					<!-- // Box END -->
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
