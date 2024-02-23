@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Lesson;
@endphp
<style>
.video-js {
        max-width: 100%
    }

    /* the usual RWD shebang */

    .video-js {
        width: 350px !important; /* override the plugin's inline dims to let vids scale fluidly */
        height: 200px !important;
    }

    .video-js video {
        position: relative !important;
    }
</style>
<body class="">
	
		<!-- Main Container Fluid -->
	<div class="container-fluid fluid menu-left">
		
		<!-- Top navbar -->
		<div class="navbar main hidden-print">
		
			<!-- Brand -->
			@include('admin.layouts.partials.top-nav')
		
			
		<div id="wrapper">
		
		<!-- Sidebar Menu -->
		@include('admin.layouts.partials.menu-left')
		
		<!-- Content -->
		<div id="content">
			<ul class="breadcrumb">
				<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>จัดการวิดีโอ</li>
			</ul><!-- breadcrumbs -->
			<div class="separator bottom"></div>


			<div class="innerLR">
				<div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">
					<div class="widget-head">
						<h4 class="heading  glyphicons search"><i></i>ค้นหาขั้นสูง</h4>
						<span class="collapse-toggle"></span>
					</div>
				</div>
				<div class="widget" style="margin-top: -1px;">
					<div class="widget-head">
						<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> จัดการวิดีโอ</h4>
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
											<th id="Lesson-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/lesson/index?Lesson_sort=course_id">วิดีโอ</a></th>
											<th id="Lesson-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/lesson/index?Lesson_sort=course_id">ชื่อไฟล์</a></th>
											<th id="Lesson-grid_c2"><a class="sort-link" style="color:white;" href="/admin/index.php/lesson/index?Lesson_sort=title">ชื่อบทเรียน</a></th>
											<th class="button-column" id="Lesson-grid_c8">จัดการ</th>
										</tr>
									</thead>
									<tbody>
										@foreach($file as $f)
										@php
										$lesson = Lesson::where('id',$f->lesson_id)->first();
										@endphp
											<tr class="items[]" >
												<td class="checkbox-column"><input class="select-on-check" value="313" id="chk_0" type="checkbox" name="chk[]">
													
												</td>
												<td>
													@if($file != null)
														<div class="col-md-6">
															<video id="example_video_1" class="video-js vjs-default-skin" controls="" preload="none" data-setup="{}" controlsList="nodownload">
																{{-- <source src="/../images/storage/uploads/lesson/{{$lesson->filename}}" type="video/mp4"> --}}
																<source src="{{asset('images/uploads/lesson/'.$f->filename)}}" type="video/mp4">
																<!-- <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
																			<source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' /> -->
																<!-- <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track> -->
																<!-- Tracks need an ending tag thanks to IE9 -->
																<!-- <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track> -->
																<!-- Tracks need an ending tag thanks to IE9 -->
																<p class="vjs-no-js">To view this video please
																	enable JavaScript, and consider upgrading to
																	a
																	web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
																</p>
															</video>
														</div>
														@else
														<h5>ไม่มีวิดีโอ</h5>
													@endif
												</td>
												<td style="width: 150px;">{{ $f->file_name }}</td>
												<td style="width: 250px;">{{ $lesson->title }}</td>
												<td style="width: 90px;" class="center">
													{{-- <a class="btn-action glyphicons eye_open btn-info" title="ดูรายละเอียด" href="#"><i></i></a>  --}}
													<a class="btn-action glyphicons pencil btn-success" title="แก้ไข" href="#"><i></i></a> 
													<a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" href="#" onclick="#"><i></i></a>
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
										<li class="first "><a href="{{url('filemanagers')}}">&lt;&lt; หน้าแรก</a></li>
										@if ($file->currentPage() > 1)
										<li class="previous "><a href="{{ $file->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
										@endif
										@for ($i = max(1, $file->currentPage() - 3); $i <= min($file->lastPage(), $file->currentPage() + 3); $i++)
										<li class="page"><a href="{{ $file->url($i) }}" class="pagination-link {{ ($i == $file->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
										@endfor
										@if ($file->currentPage() < $file->lastPage())
										<li class="next"><a href="{{ $file->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
										@endif
										@if ($file->currentPage() == $file->lastPage())
										<li class="last"><a href="{{ $file->lastPage() }}"  class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
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
		
		</div>
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		<div id="footer" class="hidden-print">

			<!--  Copyright Line -->
			<div class="copy">© 2023 - All Rights Reserved.</a></div>
			<!--  End Copyright Line -->

		</div>	
</body>
@endsection