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
		<div id="wrapper">
			<div class="content-wrapper">
				<div class="content-header">
					<div class="container-fluid">
						<div class="d-flex align-items-center">
							<div class="">
								<h4 class="m-0">ระบบรีเซ็ตผลการเรียนการสอบ</h4>
							</div>
							<div class="ml-3">
								<a href="{{route('admin')}}">
									<button class="btn btn-warning d-flex align-items-center">
										<i class="fas fa-angle-left mr-2"></i>
										กลับหน้าหลัก
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="container-fluid">
						<div class="card m-0">
							<div class="card-body">
								<table id="settingTable" class="table table-striped table-bordered nowrap" style="width:100%">
									<thead>
										<tr>
											<th>ผู้ใช้งาน</th>
											<th>หลักสูตร</th>
											<th>คะแนนสอบ</th>
										</tr>
									</thead>
									<tbody id="sortable">
										@foreach ($users as $item)
											@php
											$learn = Learn::where('user_id',$item->id)->where('lesson_active','y')->get();
											$score = Score::where('user_id',$item->id)->where('active','y')->get();
											@endphp
										<tr>
											<td class="text-center">
												{{$item->username ?? '-'}}
											</td>
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
										@endforeach
									</tbody>
								</table>
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
<script>
	$(document).ready(function() {
        // Initialize DataTable
        $('#settingTable').DataTable({
            responsive: false,
            scrollX: true,
            language: {
                url: '/include/languageDataTable.json',
            }
        });
    });
	$(document).on("click", ".open-modal", function () {
		var url = $(this).data('url');
		$("#myModals iframe").attr("src", url);
	});
	$(document).on("click", ".open-modal", function () {
		var url = $(this).data('url');
		$("#myModals2 iframe").attr("src", url);
	});
</script>
</body>
@endsection