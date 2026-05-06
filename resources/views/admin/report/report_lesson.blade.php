@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
<style>
	.dataTables_wrapper {
    width: 100%;
    overflow-x: auto;
}
</style>
<body class="">
	<div id="wrapper">
		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">
					<div class="d-flex align-items-center">
						<div class="">
							<h4 class="m-0">ระบบReport</h4>
						</div>
						<div class="ml-3">
							<a href="{{route('report.course')}}">
								<button class="btn btn-warning d-flex align-items-center">
									<i class="fas fa-angle-left mr-2"></i>
									หน้าหลัก
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
							<h4 class="m-0">{{ $course->course->course_title }}</h4>
							<table id="settingTable" class="table table-striped table-bordered nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Username</th>
										<th>Name</th>
										<th>Organization Name</th>
										<th colspan="{{ count($lesson)}}" style="text-align: center;">Lesson</th>
										<th>Pass</th>
										<th>Last Score</th>
									</tr>
									<tr>
										<th></th>
										<th></th>
										<th></th>
										@foreach($lesson as $ls)
										<th>{{ $ls->id}}</th>
										@endforeach
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody id="sortable">
									@foreach ($user as $us)
										@php
										$companyName = $companies[$us->company_id] ?? '-';
										$preScore = $preScores[$us->id] ?? null;
										$postScore = $postScores[$us->id] ?? null;
										$score = $postScore ?? $preScore;
										@endphp
									<tr>
										@if($us != null)
											<td>{{ $us->username }}</td>
											@else
											<td> - </td>
											@endif
											@if($us != null)
											<td>{{ $us->Profiles->firstname ?? '-' }} {{ $us->Profiles->lastname ?? '-' }}</td>
											@else
											<td> - </td>
											@endif
											@if($companyName != null)
											<td>
												{{ $companyName }}
											</td>
											@else
											<td> - </td>
											@endif
											@foreach($lesson as $l)
												@php
												$key = $us->id . '_' . $l->id;
												$learn = $learns[$key] ?? null;
												@endphp
												@if($learn != null)
												<td>{{ $learn->learn_date}}</td>
												@else
												<td></td>
												@endif
											@endforeach
											<td>
												@if($postScore && strtolower($postScore->score_past) == 'y')
													pass
												@endif
											</td>
											<td>
												{{ $score->score_number ?? ''}}
											</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="card-footer">
								<a class="btn btn-primary"   href="{{ route('export.users', $id) }}"><i></i> Export Excel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar">
			</div><!-- sidebar -->
		</div>
	</div>
	<div class="clearfix">
<script>
	$(document).ready(function() {
		// Initialize DataTable
		$('#settingTable').DataTable({
			responsive: true,
			scrollX: true,
			paging: true,
			language: {
				url: '/include/languageDataTable.json',
			}
		});
	});
</script>
</body>
@endsection
