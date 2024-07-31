@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php
use App\Models\Score;
use App\Models\Learn;
use App\Models\Profiles;
use App\Models\Course;
use App\Models\Lesson;
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
					<div class="widget" style="margin-top: -1px;">
						<div class="widget-head">
							<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> ระบบรีเซ็ตผลการเรียนการสอบ</h4>
						</div>
						<div class="widget-body">
							
							<div class="clear-div"></div>
							<div class="overflow-table">
								<div style="margin-top: -1px;" id="Grouptesting-grid" class="grid-view">
									<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
										<thead>
											<tr>
												<th class="checkbox-column" id="chk"><input class="select-on-check-all" type="checkbox" value="1" name="chk_all" id="chk_all"></th>
												<th id="Grouptesting-grid"><a class="sort-link" style="color:white;" href="/admin/index.php/grouptesting/index?Grouptesting_sort=lesson_id">ผู้ใช้งาน</a></th>
												<th id="Grouptesting-grid"><a class="sort-link" style="color:white;" href="/admin/index.php/grouptesting/index?Grouptesting_sort=group_title">หลักสูตร</a></th>
												<th id="Grouptesting-grid">คะแนนสอบ</th>
												
											</tr>
											
										</thead>
										<tbody>
											@foreach ($users as $item)
											@php
											$learn = Learn::where('user_id',$item->id)->where('lesson_active','y')->get();
											$score = Score::where('user_id',$item->id)->where('active','y')->get();
											@endphp
											<tr class="odd selectable">
												<td class="checkbox-column"><input class="select-on-check" value="254" id="chk_0" type="checkbox" name="chk[]"></td>
												@if($item != null)
												<td >{{$item->username}}</td>
												@else
												<td >-</td>
												@endif
												@if($learn->isEmpty())
												<td>
													<a href="#" class="btn btn-icon btn-dark" ><i class="icon-book"></i> รีเซ็ต</a>
												</td>
												@else
												<td>
													<a href="#" class="btn btn-primary open-modal" data-url="{{ route('learnreset.course', ['id' => $item->id]) }}" data-toggle="modal" data-target="#myModals">
														<i class="icon-book"></i> รีเซ็ต
													</a>
												</td>
												{{-- <td>
													<button type="button" class="btn btn-primary" onclick="fetchCoursesAndLessons({{ $item->user_id }})"><i class="icon-book"></i>รีเซ็ต</button>
												</td> --}}
												@endif
												@if($score->isEmpty())
												<td ><a href="#" class="btn btn-icon btn-dark"><i class="icon-book"></i> รีเซ็ต</a></td>
												@else
												<td>
													<a href="#" class="btn btn-primary open-modal" data-url="{{ route('learnreset.score', ['id' => $item->id]) }}" data-toggle="modal" data-target="#myModals2">
														<i class="icon-book"></i> รีเซ็ต
													</a>
												</td>
												@endif
												
											</tr>
										</tbody>
										@endforeach
									</table>
									<div class="pagination pull-right">
										<ul class="pagination margin-top-none" id="yw0">
											<li class="first "><a href="{{url('learnreset')}}">&lt;&lt; หน้าแรก</a></li>
											@if ($users->currentPage() > 1)
											<li class="previous "><a href="{{ $users->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
											@endif
											@for ($i = max(1, $users->currentPage() - 3); $i <= min($users->lastPage(), $users->currentPage() + 3); $i++)
											<li class="page"><a href="{{ $users->url($i) }}" class="pagination-link {{ ($i == $users->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
											@endfor
											@if ($users->currentPage() < $users->lastPage())
											<li class="next"><a href="{{ $users->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
											@endif
											@if ($users->currentPage() < $users->lastPage())
											<li class="last"><a href="{{ url('learnreset?page='.$users->lastPage()) }}"  class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
											@endif
										</ul>
									</div>
									@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
									@endif
									<div class="keys" style="display:none" title="/admin/index.php/Grouptesting/index"><span>254</span><span>253</span><span>249</span><span>248</span><span>247</span><span>246</span><span>245</span><span>244</span><span>243</span><span>242</span></div>
									<input type="hidden" name="Grouptesting[news_per_page]" value="">
									<div class="separator top form-inline small">
										<!-- With selected actions -->
										<div class="buttons pull-left">
											<a class="btn btn-primary"    href="{{ route('update.learnreset.status') }}" onclick="showSweetAlert(event)"><i></i> ลบข้อมูลทั้งหมด</a>
										</div>
										
										<!-- // With selected actions END -->
										<div class="clearfix"></div>
										
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="clearfix"></div>
		
		<!-- // Sidebar menu & content wrapper END -->
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" hidden>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">ระบบรีเซ็ตผลการเรียนการสอบ</h4>
					</div>
					<div class="modal-body">
						<iframe src="" width="100%" height="400px" frameborder="0"></iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<!-- สามารถเพิ่มปุ่มอื่นๆได้ตามต้องการ -->
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModals2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" hidden>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">ระบบรีเซ็ตผลการเรียนการสอบ</h4>
					</div>
					<div class="modal-body">
						<iframe src="" width="100%" height="400px" frameborder="0"></iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
						<!-- สามารถเพิ่มปุ่มอื่นๆได้ตามต้องการ -->
					</div>
				</div>
			</div>
		</div>
		<div id="footer" class="hidden-print">

			<!--  Copyright Line -->
			<div class="copy">© 2023 - All Rights Reserved.</a></div>
			<!--  End Copyright Line -->

		</div>
		<!-- // Footer END -->
		<script>
			$(document).on("click", ".open-modal", function () {
				var url = $(this).data('url');
				$("#myModals iframe").attr("src", url);
			});
			$(document).on("click", ".open-modal", function () {
				var url = $(this).data('url');
				$("#myModals2 iframe").attr("src", url);
			});
		</script>
		<script>
			function showSweetAlert(event) {
				event.preventDefault(); // ป้องกันไม่ให้ลิงก์ทำงานตามปกติ
	
				Swal.fire({
					title: 'ต้องการลบข้อมูลทั้งหมดใช่หรือไม่?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'ใช่, ลบ!',
					cancelButtonText: 'ยกเลิก',
					dangerMode: true,
				}).then((result) => {
					if (result.isConfirmed) {
						// นำทางไปยัง URL ของลิงก์
						window.location.href = event.target.href;
					} else {
						// ผู้ใช้ยกเลิกการลบข้อมูล
						Swal.fire('ยกเลิกการลบข้อมูล!');
					}
				});
			}
		</script>
</body>
@endsection