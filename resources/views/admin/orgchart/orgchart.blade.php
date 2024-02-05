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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>Organization chart</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<style>
					body {
						margin: 0;
						/* Reset default margin */
					}

					iframe {
						display: block;
						/* iframes are inline by default */
						background: #000;
						border: none;
						/* Reset default border */
						height: 100vh;
						/* Viewport-relative units */
						width: 100%;
					}
				</style>
				<div class="innerLR">
					<div class="widget" style="margin-top: -1px;">
						<div class="widget-head">
							<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> Organization chart</h4>
						</div>
						<div class="separator bottom form-inline small">
								<span class="pull-right" style="margin-left: 10px;">
									<a class="btn btn-primary btn-icon glyphicons circle_plus" href="{{ url('/orgchart_create') }}"><i></i> เพิ่มระดับชั้น</a>
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
												<th class="checkbox-column" id="chk" style="width: 50px"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
												<th id="Orgchart-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/faqType/index?FaqType_sort=faq_type_title_TH">หมวดหัวเรื่อง</a></th>
												<th class="button-column" id="Orgchart-grid_c2" style="width: 10px">level</th>
												<th class="button-column" id="Orgchart-grid_c3">จัดการ</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($orgchart as $item)
											@if($item->active === 'y')
											<tr class="odd selectable"> 
												<td class="checkbox-column"><input class="select-on-check" value={{$item->orgchart_id}} id="chk_0" type="checkbox" name="chk[]"></td>
												<td>{{$item->title}}</td>
												<td>{{$item->level}}</td>
												<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด {{$item->orgchart_id}}" href="/admin/index.php/faqType/97"><i></i></a> 
													<a class="btn-action glyphicons pencil btn-success" title="แก้ไข {{$item->orgchart_id}}" href="{{url('orgchart_edit',$item->orgchart_id)}}"><i></i></a> 
													<a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ {{$item->orgchart_id}}" href="{{route('orgchart_delete',$item->orgchart_id)}}"><i></i></a></td>
											</tr>
											@endif
											@endforeach
										</tbody>
									</table>
									<div class="keys" style="display:none" title="/admin/index.php/faqType/index"><span>97</span><span>96</span></div>
									<input type="hidden" name="FaqType[news_per_page]" value="">
								</div>
							</div>
					</div>

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