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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>ระบบเกี่ยวกับเรา</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>


				<div class="innerLR">

					<div class="widget" data-toggle="collapse-widget" data-collapse-closed="false">
						<div class="widget-head">
							<h4 class="heading  glyphicons search"><i></i>ค้นหาขั้นสูง</h4>
							<span class="collapse-toggle"></span>
							<span class="collapse-toggle"></span>
						</div>
						<div class="widget-body in collapse" style="height: auto;">
							<div class="search-form">
								<div class="wide form">

									<form id="yw0" action="/admin/index.php/about/index" method="get">
										<div class="row">
											<label for="About_about_title">หัวข้อเกี่ยวกับเรา</label> <input size="60" maxlength="255" class="span6" name="About[about_title]" id="About_about_title" type="text">
										</div>

										<div class="row buttons">
											<button class="btn btn-primary btn-icon glyphicons search"><i></i>
												ค้นหา</button>
										</div>

									</form>
								</div><!-- search-form -->
							</div>
						</div>
					</div>

					<div class="widget" style="margin-top: -1px;">
						<div class="widget-head">
							<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> ระบบเกี่ยวกับเรา</h4>
						</div>
						<div class="widget-body">
							<div class="separator bottom form-inline small">
								<span class="pull-right">
									<label class="strong">แสดงแถว:</label>
									<select class="selectpicker" data-style="btn-default btn-small" onchange="$.updateGridView('about-grid', 'news_per_page', this.value)" name="news_per_page" id="news_per_page" style="display: none;">
										<option value="">ค่าเริ่มต้น (10)</option>
										<option value="10">10</option>
										<option value="50">50</option>
										<option value="100">100</option>
										<option value="200">200</option>
										<option value="250">250</option>
									</select>
								</span>
							</div>
							<div class="clear-div"></div>
							<div class="overflow-table">

								<div style="margin-top: -1px;" id="about-grid" class="grid-view">
									<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
										<thead>
											<tr>
												<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
												<th id="about-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/about/index?About_sort=about_title">หัวข้อเกี่ยวกับเรา</a>
												</th>
												<th class="button-column" id="about-grid_c2">จัดการ</th>
											</tr>
											<tr class="filters">
												<td>&nbsp;</td>
												<td><input name="About[about_title]" type="text" maxlength="255">
												</td>
												<td>&nbsp;</td>
											</tr>
										</thead>
										<tbody>
											@foreach($about as $abouts)
											<tr class="items[]_2">
												<td class="checkbox-column"><input class="select-on-check" value="{{$abouts->about_id}}" id="chk_0" type="checkbox" name="chk[]"></td>
												<td>{{$abouts->about_title}}</td>
												<td>{!! htmlspecialchars_decode($abouts->about_detail) !!}</td>
												<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="{{ route('aboutus.detail', ['id' => $abouts->about_id]) }}"><i></i></a>
													<a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{route('aboutus.update', ['id' => $abouts->about_id])}}"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/about/delete/2"><i></i></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									<div class="keys" style="display:none" title="/admin/index.php/About/index">
										<span>2</span><span>1</span>
									</div>
									<input type="hidden" name="About[news_per_page]" value="">
								</div>
							</div>
						</div>
					</div>

					<!-- Options -->
					<div class="separator top form-inline small">
						<!-- With selected actions -->
						<div class="buttons pull-left">
							<a class="btn btn-primary btn-icon glyphicons circle_minus" onclick="return multipleDeleteNews('/admin/index.php/about/MultiDelete','about-grid');" href="#"><i></i> ลบข้อมูลทั้งหมด</a>
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