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
					<li><a href="/admin">หน้าหลัก</a></li> » <li>หมวดหัวข้อ</li>
				</ul>
				<!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<div class="innerLR">
					<!--	-->
					<div class="widget" style="margin-top: -1px;">
						<div class="widget-head">
							<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> หมวดหัวข้อ</h4>
						</div>
						<div class="widget-body">
							<div class="separator bottom form-inline small">
								<span class="pull-right" style="margin-left: 10px;">
									<a class="btn btn-primary btn-icon glyphicons circle_plus" href="{{ url('/questionnaireout_create') }}"><i></i> เพิ่มหัวข้อ</a>
								</span>
								<span class="pull-right">
									<label class="strong">แสดงแถว:</label>
									<select class="selectpicker" data-style="btn-default btn-small" onchange="$.updateGridView('FaqType-grid', 'news_per_page', this.value)" name="news_per_page" id="news_per_page" style="display: none;">
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
								<div style="margin-top: -1px;" id="FaqType-grid" class="grid-view">
									<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
										<thead>
											<tr>
												<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
												<th id="FaqType-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/faqType/index?FaqType_sort=faq_type_title_TH">หมวดหัวข้อ</a></th>
												<th id="Grouptesting-grid_c5">&nbsp;</th>
												<th class="button-column" id="FaqType-grid_c2">จัดการ</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($survey_headers as $item)
											<tr class="odd selectable">
												<td class="checkbox-column"><input class="select-on-check" value="97" id="chk_0" type="checkbox" name="chk[]"></td>
												<td>{{$item->survey_name}}</td>
												<td width="100px"><a class="btn btn-primary btn-icon" href="{{ route('questionnaireout.exam',['id' => $item->survey_header_id]) }}" target="_blank"><input type="text" value="{{route('questionnaireout.exam',['id' =>$item->survey_header_id])}}">Link แบบสอบถาม</a></td>
												<td style="width: 90px;" class="center"> 
													<a class="btn-action glyphicons pencil btn-success" title="แก้ไข {{$item->survey_header_id}}" href="{{url('questionnaireout_edit',$item->survey_header_id)}}"><i></i></a> 
													<a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ {{$item->survey_header_id}}" href="{{route('questionnaireout_delete',$item->survey_header_id)}}"><i></i></a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
									<div class="pagination pull-right">
										<ul class="pagination margin-top-none" id="yw0">
											<li class="first"><a href="{{url('questionnaireout')}}">&lt;&lt; หน้าแรก</a></li>
											@if ($survey_headers->currentPage() > 1)
												<li class="previous"><a href="{{ $survey_headers->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
											@endif
											@for ($i = max(1, $survey_headers->currentPage() - 3); $i <= min($survey_headers->lastPage(), $survey_headers->currentPage() + 3); $i++)
												<li class="page"><a href="{{ $survey_headers->url($i) }}" class="pagination-link {{ ($i == $survey_headers->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
											@endfor
											@if ($survey_headers->currentPage() < $survey_headers->lastPage())
												<li class="next"><a href="{{ $survey_headers->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
											@endif
											@if ($survey_headers->currentPage() < $survey_headers->lastPage())
												<li class="last"><a href="{{ url('questionnaireout?page='.$survey_headers->lastPage()) }}" class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
											@endif
										</ul>
									</div>
									<div class="keys" style="display:none" title="/admin/index.php/faqType/index"><span>97</span><span>96</span></div>
									<input type="hidden" name="FaqType[news_per_page]" value="">
								</div>
							</div>
						</div>
					</div>

					<!-- Options -->
					<div class="separator top form-inline small">
						<!-- With selected actions -->
						<div class="buttons pull-left">
							<a class="btn btn-primary btn-icon glyphicons circle_minus" onclick="return multipleDeleteNews('/admin/index.php/FaqType/MultiDelete','FaqType-grid');" href="#"><i></i> ลบข้อมูลทั้งหมด</a>
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