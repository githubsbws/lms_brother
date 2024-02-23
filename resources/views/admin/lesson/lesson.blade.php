@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Course;
use App\Models\File;
use App\Models\Manage;
@endphp
<style>
#sortable-table {
    border-collapse: collapse;
    width: 100%;
}

#sortable-table td, #sortable-table th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

#sortable-table th {
    background-color: #f2f2f2;
    color: #333;
}

tr.dragged {
    opacity: 0.5;
    /* เพิ่มสไตล์อื่น ๆ ตามต้องการ */
}
</style>
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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>ระบบบทเรียน</li>
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
									<form id="SearchFormAjax" action="/admin/index.php/lesson/index" method="get">
										<div class="row"><label>หลักสูตรอบรมออนไลน์</label><select class="span6" name="Lesson[course_id]" id="Lesson_course_id">
												<option value="">ทั้งหมด</option>
												<option value="236">tee test</option>
												<option value="235">ทีเทส</option>
												<option value="232">หลักสูตรแนะนำผลิตภัณฑ์ GTX เบื้องต้น</option>
												<option value="231">หลักสูตรแนะนำผลิตภัณฑ์ BMB เบื้องต้น</option>
												<option value="230">Online Marketing Day4 Facebook Live Shopee Lazada</option>
												<option value="229">Online Marketing Day3 Facebook and IG Ads</option>
												<option value="228">Online Marketing Day2 Digital Content Strategy</option>
												<option value="226">Online Marketing Day1 Social Media Platform</option>
												<option value="225">การซ่อมบำรุงเครื่องพิมพ์ฉลาก รุ่น TD-4550DNWB</option>
												<option value="224">การซ่อมบำรุงจักรเย็บผ้ารุ่น NV-180</option>
												<option value="223">การซ่อมบำรุงจักรเย็บผ้ารุ่น GS2700</option>
												<option value="222">การซ่อมบำรุงเครื่องพิมพ์ฉลาก PT-E850TKW</option>
												<option value="220">หลักสูตรผลิตภัณฑ์ใหม่ BHmini19HT</option>
												<option value="219">Ink Tank Mini19HT_BCC</option>
												<option value="218">ธกส. (HiQ)</option>
												<option value="217">Product Overview </option>
												<option value="215">Strategic Thinking</option>
												<option value="214">เทคนิคการนำเสนอบริการเสริมการรับประกันเครื่อง " Brother Care Pack "</option>
												<option value="213">CRG Project</option>
												<option value="212">การใช้งานโปรแกรม BR-Admin Professional 4</option>
												<option value="211">ความรู้ทั่วไป</option>
												<option value="210">Barcode Utility Program</option>
												<option value="209">การซ่อมบำรุงเครื่อง Scanner สำหรับ ADS-Series</option>
												<option value="208">การใช้งานโปรแกรม Brother iprint and scan</option>
												<option value="201">การเรียนรู้เครื่องพิมพ์ผ้าระบบดิจิตอล GTX-422 Training For BCC</option>
												<option value="197">การซ่อมบำรุงเครื่องพิมพ์ Brother Color LED สำหรับ ECL-Series</option>
												<option value="195">TEST_COURSEONLINE</option>
												<option value="192">หลักสูตรการอบรมขั้นพื้นฐานสำหรับเครื่องพิมพ์ A3 Inkjet Tank Technology.</option>
												<option value="191">การซ่อมบำรุงเครื่องพิมพ์ Brother Mono Laser สำหรับ ELL-Series</option>
												<option value="190">การใช้ Cap Frame เบี้ยงต้น</option>
												<option value="189">ตำแหน่งการปรับสายพานจักร VR</option>
												<option value="188">การแก้ไขปัญหาจักร VR ปุ่มนิรภัยถูกปิด</option>
												<option value="187">Mobile printing</option>
												<option value="186">การติดตั้งและการใช้งาน Program Brother Meter Read Tool</option>
												<option value="185">ความรู้พื้นฐานของจักร NV950</option>
												<option value="184">Brother Service Excellence ( Module I : Brother Care ) </option>
												<option value="183">Brother Service Excellence ( Module II : Brother นักบริการมืออาชีพ )</option>
												<option value="182">การซ่อมบำรุงเครื่องพิมพ์ Brother Mono Laser สำหรับ DL-Series</option>
												<option value="180">Sales : รู้จักกับ Inkjet tank ของ Brother กัน</option>
												<option value="179">Sales : อบรมความเข้าใจพื้นฐานเกี่ยวกับการใช้งาน Scanner</option>
												<option value="178">Sales : อัพเดต Laser รุ่นใหม่</option>
												<option value="177">Sales : P-Touch Editor</option>
												<option value="176">หลักสูตรการอบรมขั้นพื้นฐานสำหรับเครื่องพิมพ์ Inkjet Tank System.</option>
												<option value="172">การแก้ปัญหาเบื้องตของจักรเย็บผ้า</option>
												<option value="171">การใช้งานระบบบริการลูกค้า (New BSIS)</option>
												<option value="139">การใช้งานโปรแกรมลายปักษ์ (PE-Design Next)</option>
											</select></div>
										<div class="row"><label>ชื่อบทเรียน</label><input class="span6" name="Lesson[title]" id="Lesson_title" type="text" maxlength="80"></div>
										<div class="row"><button class="btn btn-primary btn-icon glyphicons search"><i></i> ค้นหา</button></div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="widget" style="margin-top: -1px;">
						<div class="widget-head">
							<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> ระบบบทเรียน</h4>
						</div>
						<div class="widget-body">
							<div class="separator bottom form-inline small">
								<span class="pull-right">
									<label class="strong">แสดงแถว:</label>
									<select class="selectpicker" data-style="btn-default btn-small" onchange="$.updateGridView('Lesson-grid', 'news_per_page', this.value)" name="news_per_page" id="news_per_page" style="display: none;">
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
								<div style="margin-top: -1px;" id="Lesson-grid" class="grid-view">
									<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
										<thead>
											<tr>
												<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
												<th id="Lesson-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/lesson/index?Lesson_sort=course_id">หลักสูตรอบรมออนไลน์</a></th>
												<th id="Lesson-grid_c2"><a class="sort-link" style="color:white;" href="/admin/index.php/lesson/index?Lesson_sort=title">ชื่อบทเรียน</a></th>
												<th id="Lesson-grid_c3">แบบสอบถาม</th>
												<th style="text-align: center" id="Lesson-grid_c4">จัดการวิดีโอ</th>
												<th id="Lesson-grid_c5">ก่อนเรียน</th>
												<th id="Lesson-grid_c6">หลังเรียน</th>
												<th style="text-align:center;" id="Lesson-grid_c7">ย้าย</th>
												<th class="button-column" id="Lesson-grid_c8">จัดการ</th>
											</tr>
											<tr class="filters">
												<td>&nbsp;</td>
												<td><select class="" name="Lesson[course_id]" id="Lesson_course_id">
														<option value="">ทั้งหมด</option>
												{{-- แก้ไข --}}
														@foreach ($course_online as $course)
            												<option value="{{ $course->course_id }}">{{ $course->course_title }}</option>
        												@endforeach
													</select></td>
												<td><input name="Lesson[title]" type="text" maxlength="80"></td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
											</tr>
										</thead>
										<tbody>
											@foreach ($lesson as $item)
												@php 
												$course = Course::where('course_id', $item->course_id)->first();
												$file = File::where('lesson_id',$item->id)->where('active','y')->get();
												$chkpre = Manage::where('id',$item->id)->where('type','pre')->where('active','y')->get();
												$chkpost = Manage::where('id',$item->id)->where('type','post')->where('active','y')->get();
												@endphp
												<tr class="items[]" >
													<td class="checkbox-column"><input class="select-on-check" value="313" id="chk_0" type="checkbox" name="chk[]"></td>
													<td style="width: 150px;">{{ $course->course_title }}</td>
													<td style="width: 250px;">{{ $item->title }}</td>
													<td style="text-align: center" width="160px"><a class="btn btn-primary btn-icon" href="/admin/index.php/Questionnaire/Choose/313">เลือก</a></td>
													@if($file->isEmpty())
													<td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="{{route('filemanagers')}}">จัดการวิดีโอ (0)</a></td>
													@else
													 
													 <td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="{{route('filemanagers',['id' =>$item->id])}}">จัดการวิดีโอ ({{ count($file) }})</a></td>
													@endif
													@if($chkpre->isEmpty())
													<td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="{{route('grouptesting')}}">เลือกข้อสอบ (0)</a></td>
													@else
													<td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="{{route('grouptesting',['id' => $item->id,'type' => 'pre'])}}">เลือกข้อสอบ ({{ count($chkpre) }})</a></td>
													@endif
													@if($chkpost->isEmpty())
													<td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="{{route('grouptesting')}}">เลือกข้อสอบ (0)</a></td>
													@else
													<td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="{{route('grouptesting',['id' => $item->id,'type' => 'post'])}}">เลือกข้อสอบ ({{ count($chkpost) }})</a></td>
													@endif
													<td style="text-align: center; width:50px;" class="row_move"><a class="glyphicons move btn-action btn-inverse" onclick="moveData({{ $item->id }})"><i></i></a></td>
													<td style="width: 90px;" class="center">
														<a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="{{ route('lesson.detail', ['id' =>$item->id]) }}"><i></i></a> 
														<a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="{{ route('lesson.edit',['id' =>$item->id]) }}"><i></i></a> 
														<a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="{{ route('lesson.delete',['id' =>$item->id]) }}" onclick="#"><i></i></a>
													</td>
												</tr>
												
											@endforeach
											{{-- จบแก้ไข --}}
											{{-- <tr class="items[]_312">
												<td class="checkbox-column"><input class="select-on-check" value="312" id="chk_1" type="checkbox" name="chk[]"></td>
												<td style="width: 150px;">การเรียนรู้เครื่องพิมพ์ผ้าระบบดิจิตอล GTX-422 Training For BCC</td>
												<td style="width: 250px;">บทที่ 4 การบำรุงรักษาของเครื่องพิมพ์ผ้าระบบดิจิตอล GTX-422</td>
												<td style="text-align: center" width="160px"><a class="btn btn-primary btn-icon" href="/admin/index.php/Questionnaire/Choose/312">เลือก</a></td>
												<td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="/admin/index.php/File/index/312">จัดการวิดีโอ (0)</a></td>
												<td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="/admin/index.php/Lesson/FormLesson/312?type=pre">เลือกข้อสอบ (0)</a></td>
												<td style="text-align: center" width="100px"><a class="btn btn-primary btn-icon" href="/admin/index.php/Lesson/FormLesson/312?type=post">เลือกข้อสอบ (0)</a></td>
												<td style="text-align: center; width:50px;" class="row_move"><a class="glyphicons move btn-action btn-inverse"><i></i></a></td>
												<td style="width: 90px;" class="center"><a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="/admin/index.php/lesson/312"><i></i></a> <a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="/admin/index.php/lesson/update/312"><i></i></a> <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="/admin/index.php/lesson/delete/312"><i></i></a></td>
											</tr> --}}
											
										</tbody>
									</table>
									<div class="pagination pull-right">
										<ul class="pagination margin-top-none" id="yw0">
											<li class="first "><a href="{{url('lesson')}}">&lt;&lt; หน้าแรก</a></li>
											@if ($lesson->currentPage() > 1)
											<li class="previous "><a href="{{ $lesson->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
											@endif
											@for ($i = max(1, $lesson->currentPage() - 3); $i <= min($lesson->lastPage(), $lesson->currentPage() + 3); $i++)
											<li class="page"><a href="{{ $lesson->url($i) }}" class="pagination-link {{ ($i == $lesson->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
											@endfor
											@if ($lesson->currentPage() < $lesson->lastPage())
											<li class="next"><a href="{{ $lesson->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
											@endif
											@if ($lesson->currentPage() == $lesson->lastPage())
											<li class="last"><a href="{{ $lesson->lastPage() }}"  class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
											@endif
										</ul>
									</div>
									<div class="keys" style="display:none" title="/admin/index.php/Lesson/index"><span>313</span><span>312</span><span>311</span><span>310</span><span>309</span><span>307</span><span>306</span><span>305</span><span>304</span><span>303</span></div>
									<input type="hidden" name="Lesson[news_per_page]" value="">
								</div>
							</div>
						</div>
					</div>

					<!-- Options -->
					<div class="separator top form-inline small">
						<!-- With selected actions -->
						<div class="buttons pull-left">
							<a class="btn btn-primary btn-icon glyphicons circle_minus" onclick="return multipleDeleteNews('/admin/index.php/Lesson/MultiDelete','Lesson-grid');" href="#"><i></i> ลบข้อมูลทั้งหมด</a>
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