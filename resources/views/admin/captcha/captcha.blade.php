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
					<div class="widget-head">
						<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i>จัดการระบบCaptcha</h4>
					</div>
					<!-- Box -->
					<div class="hero-unit well">
						<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
							<a class="btn btn-success btn-icon" href="{{ url('/captcha_create') }}">เพิ่ม</a>
							<thead>
								<tr>
									<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
									<th id="News-grid_c2"><a class="sort-link" style="color:white;" >ลำดับ</a></th>
									<th id="News-grid_c3"><a class="sort-link" style="color:white;" >ชื่อเงื่อนไข</a></th>
									<th id="News-grid_c3"><a class="sort-link" style="color:white;" >ชื่อหลักสูตร</a></th>
									<th id="News-grid_c3"><a class="sort-link" style="color:white;" >เลือกหลักสูตร</a></th>
									<th id="News-grid_c3"><a class="sort-link" style="color:white;" >สถานะ</a></th>
									<th class="button-column" id="News-grid_c4">จัดการ</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($captcha as $item)
								{{-- @if($item->capt_active === 'y') --}}
								<tr class="odd selectable">
									<td class="checkbox-column"><input class="select-on-check" value="78" id="chk_0" type="checkbox" name="chk[]"></td>
									<td width="110">{{$item->capid}}</td>
									<td>  {{$item->capt_name}}</td>
									<td style="width:450px; vertical-align:top;">
										
									</td>
									<td style="width:450px; vertical-align:top;">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">เลือกหลักสูตร</button>
									</td>
									@if($item->capt_active === 'y'){
										<td><a class="btn btn-success btn-icon" href="{{route('captcha_delete', ['capid' => $item->capid,'capt_actives' => "n"])}}">เปิด</a></td>
									}
									
									@else{
										<td><a class="btn btn-success btn-icon" href="{{route('captcha_delete', ['capid' => $item->capid,'capt_active' => "y"])}}">ปิด</a></td>
									}
									@endif
									<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="{{route('captcha_edit',$item->capid)}}"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{route('captcha_edit',$item->capid)}}"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="{{route('captcha_delete',$item->capid)}}"><i></i></a></td>
								</tr>
								{{-- @endif --}}
								@endforeach
							</tbody>
							
						</table>
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
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:10001">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Modal header</h3>
			  </div>
			  <div class="modal-body">
				<p><table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
					<thead>
						<tr>
							<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all">  ทั้งหมด</th>
							<th id="News-grid_c2"><a class="sort-link" style="color:white;" >ชื่อหลักสูตร</a></th>
						</tr>
					</thead>
					<tbody>
						{{-- @foreach ($zoom as $item)
						@if($item->active === 'y') --}}
						<tr class="odd selectable">
							<td width="20" class="checkbox-column"><input class="select-on-check" value="50" id="chk_0" type="checkbox" name="chk[]"></td>
							<td width="110"></td>			
						</tr>
					</tbody>
				</table></p>
			  </div>
			  <div class="modal-footer">
				<a href="#" class="btn">Close</a>
				<a onclick="coursegrouptesting()" class="btn btn-primary">Save changes</a>
			  </div>
		</div>
</body>
@endsection