@extends('admin.layouts.mainlayout')
@section('title', 'Admin')
@section('content')
<style>
    .input-error {
        color: white;
        background-color: red;
        padding: 5px;
        margin-top: 5px;
        border-radius: 3px;
        display: inline-block;
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
            <div id="content">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin')}}">หน้าหลัก</a></li> » <li><a >เอกสารและประเภทเอกสาร</a></li> »
                    <li>เพิ่มเอกสาร</li>
                </ul><!-- breadcrumbs -->
                <div class="separator bottom"></div>

                <!-- innerLR -->
                <div class="innerLR">
                    <div class="widget widget-tabs border-bottom-none">
                        <div class="widget-head">
                            <ul>
                                <li class="active">
                                    <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                        <i></i>เพิ่มเอกสาร</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-body">
                            <div class="form">
                                <form enctype="multipart/form-data" id="faq_edit" action="{{route('document.create')}}" method="post">
                                    @csrf
                                    <div class="row">
										<label for="Grouptesting_lesson_id" class="required">หัวข้อเอกสาร <span class="required">*</span></label> 
                                        <select class="span8" name="title" id="document_title_select">
                                                <option value="">--- เลือกชื่อเอกสาร ---</option>
                                                @foreach ($document_title as $title)
                                                    <option value="{{ $title->title_id }}">{{ $title->title_name }}</option>
                                                @endforeach
										</select>
                                         <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_lesson_id_em_" style="display:none"></div>
										</div>
									</div>
                                    <div class="row">
										<label for="Grouptesting_lesson_id" class="required">ประเภทเอกสาร <span class="required">*</span></label> 
                                        <select class="span8" name="download_cate" id="document_type_select">
											<option value="">--- ประเภทเอกสาร ---</option>
                                        <!-- ตัวเลือกประเภทเอกสารจะถูกเติมโดยอัตโนมัติ -->
										</select>
                                         <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_lesson_id_em_" style="display:none"></div>
										</div>
									</div>
                                    <div class="row">
                                        <label for="faq_type_id" class="required">ชื่อไฟล์ <span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="filedoc_name" id="filedoc_name" type="text" >
                                    </div>
                                    <div class="row">
										<label for="News_cms_picture">ไฟล์ที่ดาว์นโหลด</label>
										<div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div id="fileNameDisplay"></div>
												<span class="btn btn-default btn-file">
													<span class="fileupload-new">Select file</span>
													<span class="fileupload-exists">Change</span>
													{{-- <input id="ytNews_cms_picture" type="hidden" value="{{$document->filedocname}}" name="cms_picture"> --}}
													<input name="filedoc" id="imageInput" type="file" onchange="displayFileName()" >
                                                    
												</span>
                                                <script>
                                                    function displayFileName() {
                                                        // Get the file input element
                                                        var input = document.getElementById('imageInput');
                                            
                                                        // Get the file name
                                                        var fileName = input.files[0].name;
                                            
                                                        // Display the file name
                                                        document.getElementById('fileNameDisplay').innerText = 'Selected file: ' + fileName;
                                                    }
                                                </script>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												{{-- <input type="file" id="imageInput" name="image"> --}}
                                                @error('error')
                                                <div class="form-group">
                                                    <div class="col-sm-6 col-sm-offset-3" style="padding: 0;">
                                                        <span class="{{ $errors->has('error') ? 'input-error' : '' }}">{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
											
										</div>
                                    </div>
                                    <div class="row buttons">
                                        <button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div><!-- form -->
                        </div>
                    </div>
                </div>
                <!-- END innerLR -->

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
    <script>
        // ฟังก์ชันเพื่อเรียกและเติมตัวเลือกประเภทเอกสารตามชื่อที่เลือก
        function populateDocumentTypes() {
            var titleId = document.getElementById('document_title_select').value;
            var documentTypeSelect = document.getElementById('document_type_select');
            
            // เคลียร์ตัวเลือกที่มีอยู่ก่อนหน้า
            documentTypeSelect.innerHTML = '<option value="">--- ประเภทเอกสาร ---</option>';
    
            // สร้าง URL ใหม่โดยใช้ชื่อที่เลือก
           
            console.log(titleId)
    
            // เรียกข้อมูลประเภทเอกสารตามชื่อที่เลือก
            fetch('{{ url("getDocumentTypes") }}/' + titleId)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // เพื่อตรวจสอบว่าได้รับข้อมูลแล้วหรือยัง
    
                    // เติมตัวเลือกประเภทเอกสาร
                    data.forEach(item => {
                        var option = document.createElement('option');
                        option.value = item.download_id;
                        option.text = item.download_name;
                        documentTypeSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching document types:', error);
                });
        }
    
        // แนบตัวฟังก์ชันไปยังเลือกชื่อ
        document.getElementById('document_title_select').addEventListener('change', populateDocumentTypes);
    </script>
    
    
</body>

@endsection
