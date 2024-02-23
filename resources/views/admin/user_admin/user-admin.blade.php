@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

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
															<th scope="col">ชื่อ นามสกุล</th>
															<th scope="col">เลขบัตรประชาชน</th>
															<th scope="col">email</th>
															<th scope="col">advisor_email1</th>
															<th scope="col">จัดการ</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($query as $index => $data)
														{{-- @dump($data->profile); --}}
															<tr>
																<td>
																	@if (method_exists($query, 'firstItem'))
																		{{ $query->firstItem() + $loop->index }}
																	@else
																		{{ $index + 1 }}
																	@endif
																</td>
																<td>{{ @$data->profile->firstname }} {{ @$data->profile->lastname }}</td>
																<td>{{ @$data->profile->identification }}</td>
																<td>{{ @$data->email }}</td>
																<td>{{ @$data->profile->advisor_email1 }}</td>
																<td>
																	<a href="" class="btn btn-info"><i class="bi bi-eye"></i></a>
																	<a href="" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
																	<a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
																</td>
															</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>	
									</div>
									<div class="pagination-main mt-3">
										<nav>
											<ul class="pagination justify-content-end">
												{{ $query->links()}}
											</ul>
										</nav>
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

</body>
@endsection