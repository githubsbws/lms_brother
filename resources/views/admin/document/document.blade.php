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
					<div class="hero-unit well">
						<div id="content">
							<ul class="breadcrumb">
								<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>ระบบข่าวสารและกิจกรรม</li>
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
												<form id="SearchFormAjax" action="/admin/index.php/news/index" method="get">
													<div class="row"><label>ชื่อหัวข้อ</label><input class="span6" name="News[cms_title]" id="News_cms_title" type="text" maxlength="250"></div>
													<div class="row"><label>รายละเอียดย่อ</label><textarea class="span6" name="News[cms_short_title]" id="News_cms_short_title"></textarea></div>
													<div class="row"><button class="btn btn-primary btn-icon glyphicons search"><i></i> ค้นหา</button></div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="widget" style="margin-top: -1px;">
									<div class="widget-head">
										<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> ระบบข่าวสารและกิจกรรม</h4>
									</div>
									<div class="widget-body">
										<div class="separator bottom form-inline small">
											<span class="pull-right">
												<label class="strong">แสดงแถว:</label>
												<select class="selectpicker" data-style="btn-default btn-small" onchange="$.updateGridView('News-grid', 'news_per_page', this.value)" name="news_per_page" id="news_per_page" style="display: none;">
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
											<div style="margin-top: -1px;" id="News-grid" class="grid-view">
												<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
													<thead>
														<tr>
															<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
															<th id="News-grid_c2"><a class="sort-link" style="color:white;" href="/admin/index.php/news/index?News_sort=cms_title">ชื่อหัวข้อ</a></th>
															<th id="News-grid_c3"><a class="sort-link" style="color:white;" href="/admin/index.php/news/index?News_sort=cms_short_title">รายละเอียดย่อ</a></th>
															<th class="button-column" id="News-grid_c4">จัดการ</th>
														</tr>
														<tr class="filters">
															<td>&nbsp;</td>
															<td>&nbsp;</td>
															<td><input name="News[cms_title]" type="text" maxlength="250"></td>
															<td><input name="News[cms_short_title]" type="text"></td>
															<td>&nbsp;</td>
														</tr>
													</thead>
													<tbody>
														@foreach ($usability as $item)
														@if($item->active === 'y')
														<tr class="odd selectable">
															<td class="checkbox-column"><input class="select-on-check" value="78" id="chk_0" type="checkbox" name="chk[]"></td>
															<td>{{$item->usa_title}}</td>
															<td style="width:450px; vertical-align:top;">{{$item->usa_detail}}</td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/78"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{route('document_edit',$item->usa_id)}}"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="{{route('document_delete',$item->usa_id)}}"><i></i></a></td>
														</tr>
														{{-- <tr class="even selectable">
															<td class="checkbox-column"><input class="select-on-check" value="77" id="chk_1" type="checkbox" name="chk[]"></td>
															<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/news/77/small/07012021172459_Picture.jpg" alt="07012021172459_Picture.jpg"></td>
															<td>Technical Clip EP 3</td>
															<td style="width:450px; vertical-align:top;">การแก้ปัญหา Develop Joint ทำงานผิดปกติของเครื่อง Color LED </td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/77"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/77"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/77"><i></i></a></td>
														</tr>
														<tr class="odd selectable">
															<td class="checkbox-column"><input class="select-on-check" value="74" id="chk_2" type="checkbox" name="chk[]"></td>
															<td width="110"><img style="width:110px;height:90px;" src="/admin/images/logo_course.png" alt="No Image"></td>
															<td>Brother Care Pack</td>
															<td style="width:450px; vertical-align:top;">แนะนำ Brother Care Pack :ซึ่งจะมีการอธิบายถึงบริการต่างๆที่ทางบราเดร์จัดเตรียมไว้ให้</td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/74"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/74"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/74"><i></i></a></td>
														</tr>
														<tr class="even selectable">
															<td class="checkbox-column"><input class="select-on-check" value="72" id="chk_3" type="checkbox" name="chk[]"></td>
															<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/news/72/small/12052020094250_Picture.jpg" alt="12052020094250_Picture.jpg"></td>
															<td>Cloud77 App</td>
															<td style="width:450px; vertical-align:top;">โปรแกรมสำหรับการ get information ในรูปของ Text file จากเครื่อง printer ทั้ง Inkjet และ Laser ของ brother
																ทั้งยังสามารถ print Maintenance77 จากโปรแกรมได้ </td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/72"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/72"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/72"><i></i></a></td>
														</tr>
														<tr class="odd selectable">
															<td class="checkbox-column"><input class="select-on-check" value="71" id="chk_4" type="checkbox" name="chk[]"></td>
															<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/news/71/small/24042020152134_Picture.jpg" alt="24042020152134_Picture.jpg"></td>
															<td>แนะนำโปรแกรม BR-Admin Professional 4</td>
															<td style="width:450px; vertical-align:top;">อธิบายความหมาย หน้าที่ จุดเด่น ของโปรแกรม BR-Admin Professional 4
																หากต้องการเรียนการใช้งาน ให้เข้าระบบ LMS ด้วย Username / Password ที่ทางบราเดอร์กำหนดให้</td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/71"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/71"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/71"><i></i></a></td>
														</tr>
														<tr class="even selectable">
															<td class="checkbox-column"><input class="select-on-check" value="70" id="chk_5" type="checkbox" name="chk[]"></td>
															<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/news/70/small/13042020162123_Picture.jpg" alt="13042020162123_Picture.jpg"></td>
															<td>6 ขั้นตอนในการแก้ Machine Error 50</td>
															<td style="width:450px; vertical-align:top;">Technical Clip # 01
																- 6 ขั้นตอนในการแก้ Machine Error 50</td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/70"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/70"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/70"><i></i></a></td>
														</tr>
														<tr class="odd selectable">
															<td class="checkbox-column"><input class="select-on-check" value="68" id="chk_6" type="checkbox" name="chk[]"></td>
															<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/news/68/small/03042020123014_Picture.jpg" alt="03042020123014_Picture.jpg"></td>
															<td>BrUSBsn</td>
															<td style="width:450px; vertical-align:top;">การใช้งานโปรแกรม BrUSBsn เพื่อใส่ค่า หมายเลขหัวพิมพ์, หมายเลขเลเซฮร์, หมายเลขเครื่อง </td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/68"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/68"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/68"><i></i></a></td>
														</tr>
														<tr class="even selectable">
															<td class="checkbox-column"><input class="select-on-check" value="67" id="chk_7" type="checkbox" name="chk[]"></td>
															<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/news/67/small/03042020111854_Picture.jpg" alt="03042020111854_Picture.jpg"></td>
															<td>brother maintenance USB</td>
															<td style="width:450px; vertical-align:top;">โปรแกรมการเชื่อมต่อ Computer กับ brother printer ภายใต้ Maintenance mode หรือ Firmware mode</td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/67"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/67"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/67"><i></i></a></td>
														</tr>
														<tr class="odd selectable">
															<td class="checkbox-column"><input class="select-on-check" value="66" id="chk_8" type="checkbox" name="chk[]"></td>
															<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/news/66/small/02042020142137_Picture.jpg" alt="02042020142137_Picture.jpg"></td>
															<td>การใช้งานโปรแกรม SVsetting</td>
															<td style="width:450px; vertical-align:top;">โปรแกรมสำหรับการ
																get information, Print Maintenance, Add Serial number, input country code </td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/66"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/66"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/66"><i></i></a></td>
														</tr>
														<tr class="even selectable">
															<td class="checkbox-column"><input class="select-on-check" value="65" id="chk_9" type="checkbox" name="chk[]"></td>
															<td width="110"><img src="http://lms.brother.co.th/admin/../uploads/news/65/small/01042020142634_Picture.JPG" alt="01042020142634_Picture.JPG"></td>
															<td>อาการเข็มเย็บไม่ตรงช่องแผ่นplate</td>
															<td style="width:450px; vertical-align:top;">Needle bar supporter ชำรุด ทำให้เสาเข็มเอียง
																เข็มจึงเย็บไม่ตรงช่องแผ่น plate</td>
															<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/news/65"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/news/update/65"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/news/delete/65"><i></i></a></td>
														</tr> --}}
														@endif
														@endforeach
													</tbody>
												</table>
						<!-- // Row END -->

					</div>
					<!-- // Box END -->
				</div>
				<div id="sidebar">
				</div><!-- sidebar -->
			</div>
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
