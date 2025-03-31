@extends('admin.layouts.mainlayout')
@section('title', 'Admin')
@section('content')
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
    <div id="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <h4 class="m-0">ระบบบทเรียน</h4>
                        </div>
                        <div class="ml-3">
                            <a href="{{route('lesson')}}">
                                <button class="btn btn-warning d-flex align-items-center">
                                    <i class="fas fa-angle-left mr-2"></i>
                                    กลับหน้าหลัก
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        แก้ไขระบบบทเรียน
                    </div>
                    <div class="card-body">
                        <form action="{{ route('lesson.edit', ['id' =>$lesson->id]) }}" enctype="multipart/form-data" method="post" id="question-form">
                            @csrf
                            <div class="form-group">
                                <label for="cate_id">หลักสูตรอบรมออนไลน์</label>
                                <select class="form-control" name="course_id">
                                    <option value="">เลือกหลักสูตร</option>
                                    @foreach ($course_online as $course_id => $course_title)
                                        <option value="{{ $course_title->course_id }}"
                                            {{ $lesson->course_id == $course_title->course_id ? 'selected' : '' }}>
                                            {{ $course_title->course_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">ชื่อบทเรียน</label>
                                <input type="text" name="title" class="form-control" value="{!!  htmlspecialchars_decode($lesson->title) !!}">
                            </div>

                            <div class="form-group">
                                <label for="course_short_title">รายละเอียดย่อ</label>
                                <textarea name="course_short_title" id="summernote" class="form-control">{!!  htmlspecialchars_decode($lesson->description) !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="view_all">สิทธิ์การดูบทเรียนนี้</label>
                                <div>
                                    @php
                                        $checked = $lesson->view_all ?? '-' == 'y' ? 'checked' : '';
                                    @endphp
                                    <input type="checkbox" name="view_all" value="y" data-toggle="toggle" data-on="ดูได้ทั้งหมด" data-off="ดูได้เฉพาะกลุ่ม" data-onstyle="success" data-offstyle="danger" {{ $checked }} />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cate_amount">จำนวนครั้งที่สามารถทำข้อสอบได้</label>
                                <input type="text" name="cate_amount" class="form-control" value="{{ $lesson->cate_amount }}">
                            </div>

                            <div class="form-group">
                                <label for="time_test">เวลาในการทำข้อสอบ</label>
                                <input type="text" name="time_test" class="form-control" value="{{ $lesson->time_test }}">
                            </div>

                            <div class="form-group">
                                <label for="content">เนื้อหา </label>
                                <textarea name="content" id="summernote2" class="form-control">{{ htmlspecialchars_decode(htmlspecialchars_decode($lesson->content)) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="File_filename">ไฟล์บทเรียน (mp3,mp4)</label>
                                @if($file != null)
                                
                                            <div class="col-md-6">
                                                <video id="example_video_1" class="video-js vjs-default-skin" controls="" preload="none" data-setup="{}" controlsList="nodownload">
                                                    {{-- <source src="/../images/storage/uploads/lesson/{{$lesson->filename}}" type="video/mp4"> --}}
                                                    <source src="{{asset('images/uploads/lesson/'.$file->filename)}}" type="video/mp4">
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
                                                <button type="button" class="btn btn-danger btn-sm delete-button" data-id="{{ $file->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        
                                            @else
                                            <h5>ไม่มีวิดีโอ</h5>
                                
                                        @endif
                                <div id="queue"></div>
                                <div class="form-group">
									<label for="filedoc_name">ไฟล์บทเรียน</label>
									<div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div id="fileNameDisplay"></div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-new">Select file</span>
                                            <span class="fileupload-exists">Change</span>
                                            {{-- <input id="ytNews_cms_picture" type="hidden" value="{{$document->filedocname}}" name="cms_picture"> --}}
                                            <input name="filename" id="imageInput" type="file" onchange="displayFileName()" >
                                            
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
                                        {{-- <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> --}}
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
                                
                            </div>

                            <div class="form-group">
                                <label for="FileDoc_doc">ไฟล์ประกอบบทเรียน (pdf,docx,pptx)</label>
                                @if($filedoc !== null)
                                <h5>{{ $filedoc->file_name}}</h5>
                    
                                @else
                                <h5>ไม่มีไฟล์</h5>
                                @endif
                                <div id="docqueue"></div>
                                <div class="form-group">
									<label for="filedoc_name">ไฟล์ประกอบบทเรียน</label>
									<div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div id="fileNameDisplay"></div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-new">Select file</span>
                                            <span class="fileupload-exists">Change</span>
                                            {{-- <input id="ytNews_cms_picture" type="hidden" value="{{$document->filedocname}}" name="cms_picture"> --}}
                                            <input name="doc" id="imageInput" type="file" onchange="displayFileName()" >
                                            
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
                                        {{-- <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> --}}
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
                            </div>

                            <div class="form-group">
                                <div id="picture_show" style="">
                                    ภาพประกอบ <br>
                                    <img src="{{ asset('images/uploads/lesson/'.$lesson->id.'/original/'. $lesson->image) }}" name="course_picture"><br><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="course_picture">รูปภาพ</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input span3">
                                            <i class="icon-file fileupload-exists"></i> 
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <img id="previewImage" src="#" alt="Preview Image" style="display: none;">
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-new">Select file</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input id="ytNews_cms_picture" type="hidden" value="{{$lesson->image}}" name="course_picture">
                                            <input name="image" id="imageInput"  type="file" >
                                        </span>
                                        {{-- <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> --}}
                                        {{-- <input type="file" id="imageInput" name="image"> --}}

                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var imageInput = document.getElementById('imageInput');
                                            var previewImage = document.getElementById('previewImage');
                                
                                            imageInput.addEventListener('change', function() {
                                                previewImageFile(this);
                                            });
                                
                                            function previewImageFile(input) {
                                                var file = input.files[0];
                                                if (file) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        previewImage.src = e.target.result;
                                                        previewImage.style.display = 'block';
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <font color="#990000">
                                    รูปภาพควรมีขนาด 250x180(แนวนอน) หรือ ขนาด 250x(xxx) (แนวยาว)
                                </font>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>บันทึก</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="sidebar">
            </div><!-- sidebar -->
        </div>
    </div>
    <div class="clearfix"></div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
        });

    $(document).ready(function() {
        $('#summernote2').summernote();
        });

        $(document).ready(function() {
				// ตรวจสอบว่า jQuery โหลดหรือไม่
				if (typeof jQuery === "undefined") {
					console.error("jQuery is not loaded!");
					return;
				}

				// ตั้งค่า CSRF Token
				$.ajaxSetup({
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
					}
				});

				// ตรวจสอบว่าโค้ดนี้ทำงานจริงไหม
				console.log("Delete button script loaded");

				// ใช้ Event Delegation เผื่อปุ่มถูกโหลดใหม่
				$(document).on("click", ".delete-button", function(e) {
					e.preventDefault();

					var id = $(this).data("id");
					var url = "/lesson_delete_video/" + id;

					console.log("Clicked delete button with ID:", id); // ตรวจสอบว่า ID ถูกต้องไหม

					Swal.fire({
						title: "คุณแน่ใจหรือไม่?",
						text: "ข้อมูลนี้จะถูกลบออก!",
						icon: "warning",
						showCancelButton: true,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "ใช่, ลบเลย!",
						cancelButtonText: "ยกเลิก"
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								url: url,
								type: "POST", // ใช้ DELETE ตาม Laravel
								success: function(response) {
									console.log("Success:", response);
									Swal.fire({
										title: "สำเร็จ!",
										text: response.message || "ลบข้อมูลสำเร็จ",
										icon: "success",
										confirmButtonText: "OK"
									}).then(() => {
										location.reload();
									});
								},
								error: function(xhr) {
									console.error("Error:", xhr);
									Swal.fire(
										"เกิดข้อผิดพลาด!",
										xhr.responseJSON?.message || "ไม่สามารถลบข้อมูลได้",
										"error"
									);
								}
							});
						}
					});
				});
			});

			@if(session('success'))
			Swal.fire({
				title: "{{ session('alert') }}",
				text:"บันทึกข้อมูลสำเร็จ",
				icon: "success",
				confirmButtonText: 'ตกลง' // เพิ่มปุ่มยืนยัน
			});
		@endif
</script>
</body>

@endsection
