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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>ระบบวิธีการใช้งาน</li>
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
									<form id="SearchFormAjax" action="/admin/index.php/usability/index" method="get">
										<div class="row"><label>หัวข้อวิธีการใช้งาน</label><input class="span6" name="Usability[usa_title]" id="Usability_usa_title" type="text" maxlength="255"></div>
										<div class="row"><button class="btn btn-primary btn-icon glyphicons search"><i></i> ค้นหา</button></div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="widget" style="margin-top: -1px;">
						<div class="widget-head">
							<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> ระบบวิธีการใช้งาน</h4>
						</div>
						<div class="widget-body">
							<div class="separator bottom form-inline small">
								<span class="pull-right">
									<label class="strong">แสดงแถว:</label>
									<select class="selectpicker" data-style="btn-default btn-small" onchange="$.updateGridView('Usability-grid', 'news_per_page', this.value)" name="news_per_page" id="news_per_page" style="display: none;">
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
								<div style="margin-top: -1px;" id="Usability-grid" class="grid-view">
									<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
										<thead>
											<tr>
												<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
												<th id="Usability-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/usability/index?Usability_sort=usa_title">หัวข้อวิธีการใช้งาน</a></th>
												<th class="button-column" id="Usability-grid_c2">จัดการ</th>
											</tr>
											<tr class="filters">
												<td>&nbsp;</td>
												<td><input name="Usability[usa_title]" type="text" maxlength="255"></td>
												<td>&nbsp;</td>
											</tr>
										</thead>
										<tbody>
											@foreach($usa as $us)
											<tr class="odd selectable">
												<td class="checkbox-column"><input class="select-on-check" value="{{ $us->usa_id}}" id="chk_0" type="checkbox" name="chk[]"></td>
												<td>{{ $us->usa_title}}</td>
												<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="{{route('usability.detail',['id'=>$us->usa_id])}}"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{route('usability.edit',['id'=>$us->usa_id])}}"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" onclick="showSweetAlert()" href="#"><i></i></a></td>
											</tr>
											@php
											$route = route('usability.delete', ['id' => $us->usa_id]);
											$csrf_token = csrf_token();
											@endphp
											<script>
												var id = {{$us->usa_id}};
												function showSweetAlert() {
													swal({
														title: "ต้องการลบข้อมูลใช่หรือไม่?",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {
															// ส่งคำขอไปยังหน้า Controller เมื่อผู้ใช้ยืนยันการลบข้อมูล
															fetch("{{ $route }}", {
																method: 'POST',
																headers: {
																	'X-CSRF-TOKEN': "{{ $csrf_token }}",
																	'Content-Type': 'application/json',
																	'Accept': 'application/json'
																},
																body: JSON.stringify({ id: id }) // ส่ง ID ของข้อมูลที่ต้องการลบ
															})
															.then(response => response.json())
															.then(data => {
																console.log(data);
																// แสดงข้อความหลังจากลบข้อมูลสำเร็จ
																swal("ลบข้อมูลเรียบร้อย!", {
																	icon: "success",
																}).then(results =>{
																	location.reload();
																});
															})
															.catch(error => {
																// แสดงข้อความเมื่อเกิดข้อผิดพลาด
																swal("Oops!", "เกิดข้อผิดพลาดในการลบข้อมูล!", "error");
															});
														} else {
															// ผู้ใช้ยกเลิกการลบข้อมูล
															swal("ยกเลิกการลบข้อมูล!");
														}
													});
												}
											</script>
											@endforeach
										</tbody>
									</table>
									<div class="keys" style="display:none" title="/admin/index.php/Usability/index"><span>14</span><span>13</span><span>10</span><span>9</span><span>4</span></div>
									<input type="hidden" name="Usability[news_per_page]" value="">
								</div>
							</div>
						</div>
					</div>

					<!-- Options -->
					{{-- <div class="separator top form-inline small">
						<!-- With selected actions -->
						<div class="buttons pull-left">
							<a class="btn btn-primary btn-icon glyphicons circle_minus" onclick="return multipleDeleteNews('/admin/index.php/Usability/MultiDelete','Usability-grid');" href="#"><i></i> ลบข้อมูลทั้งหมด</a>
						</div>
						<!-- // With selected actions END -->
						<div class="clearfix"></div>
					</div> --}}
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