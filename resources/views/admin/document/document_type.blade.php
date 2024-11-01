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
					<li><a href="{{route('admin')}}">หน้าหลัก</a></li> » <li>ระบบเอกสาร</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<!---->
				<!--<h1>Faqs</h1>-->
				<!---->


				<div class="innerLR">
					<div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">
						<div class="widget-head">
							<h4 class="heading  glyphicons search"><i></i>ค้นหาขั้นสูง</h4>
							<span class="collapse-toggle"></span>
						</div>
						<div class="widget-body collapse" style="height: 0px;">
							<div class="search-form">
								<div class="wide form">
									<form id="SearchFormAjax" action="/admin/index.php/faq/index" method="get">
										<div class="row"><label>เอกสาร</label><input class="span6" name="Faq[faq_THtopic]" id="Faq_faq_THtopic" type="text" maxlength="250"></div>
										<div class="row"><button class="btn btn-primary btn-icon glyphicons search"><i></i> ค้นหา</button></div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="widget" style="margin-top: -1px;">
						<div class="widget-head">
							<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> เอกสารและประเภทเอกสาร</h4>
						</div>
						<div class="widget-body">
							<div class="separator bottom form-inline small">
								
								<span class="pull-right">
									<label class="strong">แสดงแถว:</label>						
									<div class="btn-group bootstrap-select">
										<select class="btn dropdown-toggle clearfix btn-default btn-small" name="per_page" id="per_page">
											<option value="10">ค่าเริ่มต้น (10)</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="200">200</option>
											<option value="250">250</option>
										</select>
										
									</div>
									<script>
										// สร้างฟังก์ชันเพื่อรับค่า CSRF token จาก meta tag ในหน้า HTML
										function getCsrfToken() {
											var metaTag = document.querySelector('meta[name="csrf-token"]');
											if (metaTag) {
												return metaTag.content;
											}
											return '';
										}
									
										document.getElementById('per_page').addEventListener('change', function() {
											var selectedValue = this.value;
									
											// ดึงค่า CSRF token
											var csrfToken = getCsrfToken();
											
											// ส่งค่าไปยัง Controller โดยใช้ fetch API พร้อมกับ CSRF token
											fetch('{{ url("document_type/per_page") }}', {
												method: 'POST',
												headers: {
													'Content-Type': 'multipart/form-data',
													'X-CSRF-TOKEN': csrfToken
												},
												body: JSON.stringify({ per_page: selectedValue })
											})
											.then(function (response) {
												// console.log(response);
												window.location.reload();
												// จัดการเมื่อได้รับการตอบกลับจาก Controller
											})
											.catch(function (error) {
												console.error('เกิดข้อผิดพลาด:', error);
											});
										});
									</script>
								</span>
							</div>
							<div class="clear-div"></div>
							<div class="overflow-table">
								<div style="margin-top: -1px;" id="Faq-grid" class="grid-view">
									<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
										<thead>
											<tr>
												<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
												<th id="Faq-grid_c1"><a class="sort-link" style="color:white;" href="#">ชื่อหัวข้อ</a></th>
												<th id="Faq-grid_c3"><a class="sort-link" style="color:white;" href="#">วันที่เพิ่มข้อมูล</a></th>
												<th class="button-column" id="Faq-grid_c4">จัดการ</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($document_type as $item)
											
											<tr class="odd selectable">
												<td class="checkbox-column"><input class="select-on-check" value={{$item->download_id}} id="chk_0" type="checkbox" name="chk[]"></td>
												<td>{{$item->download_name}}</td>
												<td>{{$item->update_date}}</td>
												<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="{{route('document_type.detail',['id' =>$item->download_id])}}"> <i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{route('document_type.edit',['id'=>$item->download_id])}}"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="{{route('document_type.delete',['id' =>$item->download_id])}}" onclick="return confirm('คุณต้องการลบคำถาม {{$item->download_name}} หรือไม่?')"><i></i></a></td>
											</tr>	

											@endforeach
										</tbody>
									</table>
									<div class="keys" style="display:none" title="#"><span>35</span><span>34</span></div>
									<input type="hidden" name="Faq[news_per_page]" value="">
								</div>
							</div>
						</div>
					</div>

					<!-- Options -->
					<div class="separator top form-inline small">
						<!-- With selected actions -->
						<div class="buttons pull-left">
							<a class="btn btn-primary btn-icon glyphicons circle_minus" onclick="return multipleDeleteNews('/admin/index.php/Faq/MultiDelete','Faq-grid');" href="#"><i></i> ลบข้อมูลทั้งหมด</a>
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