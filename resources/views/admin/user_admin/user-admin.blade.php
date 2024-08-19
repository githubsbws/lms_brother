@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Users;
@endphp
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
						<h1>รายชื่อสมาชิก</h1>
						<div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">
							<div class="widget-head">
								<h4 class="heading  glyphicons search"><i></i>ค้นหาขั้นสูง</h4>
								<span class="collapse-toggle"></span>
							</div>
							
								<div class="search-form">
									<div class="wide form">
										<form id="SearchFormAjax" action="{{route('user_admin.search')}}" method="get">
											<div class="row">
												<label>username</label>
												<input class="span6" name="fname" type="text" maxlength="255">
											</div>
											<div class="row">
												<label>บริษัท</label>
												<select name="company" id="company">
													<option value=""></option>
													@foreach($company as $com)
														<option value="{{@$com->company_id}}">{{@$com->company_title}}</option>
													@endforeach
												</select>
											</div>
											<div class="row">
												<label>แผนก</label>
												<select name="division" id="division">
													<option value=""></option>
													@foreach($division as $div)
														<option value="{{@$div->id}}">{{@$div->dep_title}}</option>
													@endforeach
												</select>
											</div>
											<div class="row">
												<button type="submit" class="btn btn-primary btn-icon glyphicons search"><i></i> ค้นหา</button>
											</div>
											<br>
										</form>
									</div>
								</div>
							
						</div>
						<hr class="separator">
						<!-- Row -->
						<div class="content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12 mb-3">
										<div class="table-main">
											<select class="form-select min-wid-110">
												<option value="100">100 แถว</option>
												<option value="500">500 แถว</option>
												<option value="1000">1000 แถว</option>
											</select>
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable" id="table-condition">
													<thead class="thead-dark">
														<tr>
															<th scope="col">ลำดับ</th>
															<th scope="col">username</th>
															<th scope="col">ชื่อ นามสกุล</th>
															<th scope="col">เลขบัตรประชาชน</th>
															<th scope="col">email</th>
															<th scope="col">advisor_email1</th>
															<th scope="col">Online_Status</th>
															<th scope="col">Create_at</th>
															<th scope="col">Lastvisit_at</th>
															<th scope="col">Status</th>
															<th scope="col">Last_ip</th>
															<th scope="col">Last_activity</th>
                                                            <th scope="col">จัดการสิทธิ์</th>
															<th scope="col">จัดการ</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($query as $index => $data)
														
														{{-- @dump($data->profile); --}}
															<tr>
																<td>
																	{{ $data->id }}
																</td>
																<td>{{ $data->username }}</td>
																@if($data->Profiles != null)
																<td>{{ $data->Profiles->firstname }} {{ $data->Profiles->lastname }}</td>
																@else
																<td>-</td>
																@endif
																@if($data->Profiles != null)
																<td>{{ $data->Profiles->identification }}</td>
																@else
																<td>-</td>
																@endif
																<td>{{ $data->email }}</td>
																@if($data->Profiles != null)
																<td>{{ $data->Profiles->advisor_email1 }}</td>
																@else
																<td>-</td>
																@endif
																@if($data->online_status == 1)
																<td>
                                                                    <a href="" class="btn btn-success">User Active</a>
                                                                </td>
																@else
																<td>
                                                                    <a href="" class="btn btn-danger">Inactive</a>
                                                                </td>
																@endif
																<td> {{ $data->create_at}}</td>
																<td> {{ $data->lastvisit_at}}</td>
																@if($data->status == 1)
																<td> เปิดการใช้งาน </td>
																@else
																<td> ปิดการใช้งาน </td>
																@endif
																<td> {{ $data->last_ip }}</td>
																<td> {{ $data->last_activity }}</td>
                                                                <td>
                                                                    <a href="{{ route('permission_add',['id'=> $data->id]) }}" class="btn btn-info"><i class="bi bi-joystick"></i></a>
                                                                </td>
																<td>
																	<a href="{{ route('user_view',['id'=>$data->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
																	<a href="{{ route('user_edit',['id'=>$data->id]) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
																	<a href="#" class="btn btn-danger" onclick="confirmDelete('{{ route('user_delete', ['id' => $data->id]) }}')"><i class="bi bi-trash"></i></a>
																</td>
															</tr>
														@endforeach
													</tbody>
												</table>
												<div class="pagination pull-right">
													<ul class="pagination margin-top-none" id="yw0">
														<li class="first "><a href="{{url('user_admin')}}">&lt;&lt; หน้าแรก</a></li>
														@if ($query->currentPage() > 1)
														<li class="previous "><a href="{{ $query->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
														@endif
														@for ($i = max(1, $query->currentPage() - 3); $i <= min($query->lastPage(), $query->currentPage() + 3); $i++)
														<li class="page"><a href="{{ $query->url($i) }}" class="pagination-link {{ ($i == $query->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
														@endfor
														@if ($query->currentPage() < $query->lastPage())
														<li class="next"><a href="{{ $query->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
														@endif
														@if ($query->currentPage() < $query->lastPage())
														<li class="last"><a href="{{ url('user_admin?page='.$query->lastPage()) }}"  class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
														@endif
													</ul>
												</div>
											</div>
										</div>
									</div>
									@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
									@endif
									<div class="separator top form-inline small">
										<!-- With selected actions -->
										<div class="buttons pull-left">
											<a class="btn btn-primary"    href="{{ route('update.user.status') }}" onclick="showSweetAlert(event)"><i></i> ลบข้อมูลทั้งหมด</a>
										</div>
										<!-- // With selected actions END -->
										<div class="clearfix"></div>
									</div>

								</div>
								
							</div>

							<!-- Column -->
							<div>



							</div>
							<!-- // Column END -->


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
    <script type="text/javascript">
        function confirmDelete(deleteUrl) {
            Swal.fire({
                icon: 'warning',
                title: 'ต้องการลบข้อมูลใช่ไหม?',
                showCancelButton: true,
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                    Swal.fire('ลบข้อมูลเรียบร้อย', '', 'success');
                }
            });
        }
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
