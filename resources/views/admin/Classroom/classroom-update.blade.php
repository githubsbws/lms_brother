@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
<head>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
</head>

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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li>จัดการระบบห้องเรียนออนไลน์</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>


				<div class="innerLR">
					<div class="widget" style="margin-top: -1px;">
						<div class="widget-head">
							<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i>จัดการระบบห้องเรียนออนไลน์</h4>
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
                                    <form enctype="multipart/form-data" id="classroom-form" action="{{route('classroom_update',$zoom->id)}}" method="post">
                                        @csrf
                                            <th >ชื่อห้องเรียน</th><td><input id="title" type="text" value="{{$zoom->title}}" name="title"></td>
                                            <th >ลิ้งค์</th><td><input id="title" type="text" value="{{$zoom->join_url}}" name="join_url"></td>
                                            <th >เวลาเริ่มต้น-สิ้นสุด</th><td><input id="title" type="datetime-local" value="{{$zoom->start_date}}" name="start_date"></td>
                                            <div class="row buttons">
                                                <button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>บันทึกข้อมูล</button>
                                                </div>
                                            </form>
                                            </tbody>
                                      </div>
									<div class="pagination pull-right">
										<ul class="" id="yw1">
											<li class="first hidden"><a href="/admin/index.php/news/index">&lt;&lt; หน้าแรก</a></li>
											<li class="previous hidden"><a href="/admin/index.php/news/index">&lt; หน้าที่แล้ว</a></li>
											<li class="page active"><a href="/admin/index.php/news/index">1</a></li>
											<li class="page"><a href="/admin/index.php/news/index?News_page=2">2</a></li>
											<li class="page"><a href="/admin/index.php/news/index?News_page=3">3</a></li>
											<li class="next"><a href="/admin/index.php/news/index?News_page=2">หน้าถัดไป &gt;</a></li>
											<li class="last"><a href="/admin/index.php/news/index?News_page=3">หน้าสุดท้าย &gt;&gt;</a></li>
										</ul>
									</div>
									<div class="keys" style="display:none" title="/admin/index.php/News/index"><span>78</span><span>77</span><span>74</span><span>72</span><span>71</span><span>70</span><span>68</span><span>67</span><span>66</span><span>65</span></div>
									<input type="hidden" name="News[news_per_page]" value="">
								</div>
							</div>
						</div>
					</div>
					<!-- Options -->
					<div class="separator top form-inline small">
						<!-- With selected actions -->
						<div class="buttons pull-left">
							<a class="btn btn-primary btn-icon glyphicons circle_minus" onclick="return multipleDeleteNews('/admin/index.php/News/MultiDelete','News-grid');" href="#"><i></i> ลบข้อมูลทั้งหมด</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
@endsection
