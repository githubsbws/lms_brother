@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Learn;
use App\Models\Score;
use App\Models\Company;
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
					<div class="hero-unit well">
						<hr class="separator">
						<!-- Row -->
						<div class="overflow-table">
							<div style="margin-top: -1px;" id="Vdo-grid" class="grid-view">
								<table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
									<thead>
										<tr>
											<th><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_title">Username</a></th>
											<th><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">Name</a></th>
											<th><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">User group</a></th>
											<th><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">Organization Name</a></th>
											<th colspan="3" style="text-align: center;"><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">PRE</a></th>
											<th colspan="{{ count($lesson)}}" style="text-align: center;"><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">Lesson</a></th>
											<th colspan="3" style="text-align: center;"><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">POST</a></th>
											<th><a class="sort-link" style="color:white;" href="/admin/index.php/vdo/index?Vdo_sort=vdo_path">Pass</a></th>
										</tr>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th>Date</th>
											<th>Score</th>
											<th>Total</th>
											@foreach($lesson as $ls)
											<th>{{ $ls->id}}</th>
											@endforeach
											<th>Date</th>
											<th>Score</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($user as $us)
										@php
										$com = Company::find($us->company_id);
										$score_pre = Score::where('user_id',$us->id)->where('course_id',$id)->where('type','pre')->first();
										$score_post = Score::where('user_id',$us->id)->where('course_id',$id)->where('type','post')->first();
										@endphp
										<tr class="odd selectable">
											@if($us != null)
											<td>{{ $us->username }}</td>
											@else
											<td> - </td>
											@endif
											@if($us != null)
											<td>{{ $us->firstname }} {{ $us->lastname }}</td>
											@else
											<td> - </td>
											@endif
											@if($com != null)
											<td>
												{{ $com->company_title }}
											</td>
											@else
											<td> - </td>
											@endif
											<td>-</td>
											@if($score_pre != null)
											<td>{{ $score_pre->create_date}}</td>
											<td>{{ $score_pre->score_number}}</td>
											<td>{{ $score_pre->score_total}}</td>
											@else
											<td></td>
											<td></td>
											<td></td>
											@endif
											@foreach($lesson as $l)
												@php
												$learn = Learn::where('lesson_id',$l->id)->where('user_id',$us->id)->first();
												@endphp
												@if($learn != null)
												<td>{{ $learn->learn_date}}</td>
												@else
												<td></td>
												@endif
											@endforeach
											@if($score_post != null)
											<td>{{ $score_post->create_date}}</td>
											<td>{{ $score_post->score_number}}</td>
											<td>{{ $score_post->score_total}}</td>
											@else
											<td></td>
											<td></td>
											<td></td>
											@endif
											@if($score_pre != null)
											<td>{{ $score_pre->score_past === 'n' ? '' : 'pass'}}</td>
											@elseif($score_post != null)
											<td>{{ $score_post->score_past === 'n' ? '' : 'pass'}}</td>
											@else
											<td></td>
											@endif
										</tr>
										@endforeach
									</tbody>
								</table>
								
								<div class="pagination pull-right">
									<ul class="pagination margin-top-none" id="yw0">
										<li class="first"><a href="{{url('report_lesson',['id' => $id])}}">&lt;&lt; หน้าแรก</a></li>
										@if ($user->currentPage() > 1)
											<li class="previous"><a href="{{ $user->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
										@endif
										@for ($i = max(1, $user->currentPage() - 3); $i <= min($user->lastPage(), $user->currentPage() + 3); $i++)
											<li class="page"><a href="{{ $user->url($i) }}" class="pagination-link {{ ($i == $user->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
										@endfor
										@if ($user->currentPage() < $user->lastPage())
											<li class="next"><a href="{{ $user->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
										@endif
										@if ($user->currentPage() < $user->lastPage())
											<li class="last"><a href="{{ url('report_lesson/'.$id.'?page='.$user->lastPage()) }}" class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
										@endif
									</ul>
								</div>
								<div class="separator top form-inline small">
									<!-- With selected actions -->
									<div class="buttons pull-left">
										<a class="btn btn-primary"  href="#"><i></i> Export Excel</a>
									</div>
									<!-- // With selected actions END -->
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
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
		<div class="clearfix">

			
		</div>
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
