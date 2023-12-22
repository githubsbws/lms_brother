@extends('layout/mainlayout')
@section('title', 'Brother e-learning')
@section('content')
<body>
    <div class="page-cover">
        <img src="{{asset('assets/images/screen1.png')}}" alt="">
    </div>

    <div class="container">
        <div class="page-section-heading">
            <div class="row">
                <div class="col-lg-8 col-md-8 pd-20">
                    <!-- start con 8 -->
                    <h2 class="title-layout">
                        <span>ข่าวสาร</span> <small>รวมข่าวสารของ Brother </small>
                        <a href="{{url('new')}}" class="pull-right btn btn-xs btn-light text-1 text-uppercase">ดูทั้งหมด <i class="fa fa-" aria-hidden="true"></i>
                        </a>
                    </h2>
                    <div class="row">
                        @foreach ($news as $new)
                        <div class="col-lg-6 col-md-6">
                            <div class="news-box gridalicious" data-toggle="gridalicious">

                                <div class="galcolumn" id="item02grJH" style="width: 95.7983%; padding-left: 15px; padding-bottom: 15px; float: left; box-sizing: border-box;">
                                    <div class="card" style="margin-bottom: 15px; zoom: 1; opacity: 1;">

                                        <div class="img-news" style="background: url('/../images/storage/uploads/news/78/thumb/17122021085656_Picture.JPG');"></div>
                                        <div class="card-body">
                                            <div class="text-headline">{{ \Illuminate\Support\Str::limit($new->cms_title, $limit = 40, $end = '...') }}</div>
                                            <?php 
                                            $detail =  htmlspecialchars_decode($new->cms_detail);
                                            $data = \Illuminate\Support\Str::limit($new->cms_short_title, $limit = 100, $end = '...');
                                            ?>
                                            <p class="detail-news">{{ $data }}</p>
                                            <span class="d-block mt-2">
                                                <a href="{{ route('new_detail', ['id' => $new->cms_id]) }}" class="btn btn-xs btn-light text-1 text-uppercase">เพิ่มเติม
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="clear2grJH" style="clear: both; height: 0px; width: 0px; display: block;"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div>

                        <div class="card card-default">
                            <h2 class="title-layout-2"><span>ดาวน์โหลดไฟล์เอกสาร</span>
              
                      <!--         <button href="/index.php/document/index" class="pull-right btn btn-xs btn-light text-1 text-uppercase ">ดูทั้งหมด <i class="fa fa-" aria-hidden="true"></i>
                              </button> </h2> -->
              
                               <button href="#modal-ckeck-key-file" data-toggle="modal" class="pull-right btn btn-xs btn-light text-1 text-uppercase " fdprocessedid="fyzyev">ดูทั้งหมด <i class="fa fa-" aria-hidden="true"></i>
                              </button> </h2>

                            
                                                             <br>
                                              <!-- <button type="button" class="accordion mg-0 download-dc" data-toggle="modal" data-target="#exampleModal"><img src="/themes/bws/images/icons8-pdf-48.png">                 </button>
                              <div class="form-group">
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1127">
                                      SM_PJ623_663.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1128">
                                      SM_PJ763_763MFI.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1129">
                                      SM_PJ673.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                </div> -->
                              @if(Auth::check())
                              <div class="panel panel-default paper-shadow download-group" data-z="0.5" style="margin-bottom: 5px;">
                                <ul class=" list-group">
                                <li class="list-group-item">
                                  <div class="media v-middle">
                                    <div class="media-body">
                                      <h4 class="text-headline margin-none" style="font-size: 26px;font-weight: bold;">หัวข้อ - คู่มือการซ่อม</h4>
                                    </div>
                                    <div class="media-right">
                                    </div>
                                  </div>
                                </li>
                                <li class="list-group-item media v-middle">
              
                                  <div class="panel panel-default" data-toggle="panel-collapse" data-open="false">
                                    <div class="panel-heading dowload-header panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#b74e4a3b-6f85-2ec9-da17-65a158dc1d73" aria-expanded="true" style="">
                                      <h3 class="panel-title" style="font-size: 22px;">หมวดหมุ่ - เครื่องพิมพ์แบบพกพา</h3>
                                    </div>
              
                                    
                                  <div id="b74e4a3b-6f85-2ec9-da17-65a158dc1d73" class="collapse"><div class="panel-body list-group">
              
                                      <div class="panel panel-default">
                                        <div class="panel-heading detail-change-icon">
                                          <a data-toggle="collapse" class="download-change0" href="#collapse-0">
                                            <h4 class="panel-title dowload-title">
                                                                              <!-- <span class="pull-right"><i class="icon-change-2 fa fa-plus " aria-hidden="true"></i></span> -->
                                            </h4>
                                          </a>
              
              
              
                                        </div>
                                        <div id="collapse-0" class="panel-collapse collapse in">
                                          <ul class="list-group list-group-menu">
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1127"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1127" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  SM_PJ623_663.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1127">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1127">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1128"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1128" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  SM_PJ763_763MFI.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1128">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1128">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1129"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1129" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  SM_PJ673.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1129">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1129">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                        </ul>
                                        </div>
              
              
                                      </div>
              
                                    </div></div></div>
              
                                </li>
              
                                </ul>
                              </div>
              
              
                                                             <br>
                                              <!-- <button type="button" class="accordion mg-0 download-dc" data-toggle="modal" data-target="#exampleModal"><img src="/themes/bws/images/icons8-pdf-48.png">                 </button>
                              <div class="form-group">
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1124">
                                      PL_PJ673.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1125">
                                      PL_PJ623_663.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1126">
                                      PL_PJ763_763MFI.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                </div> -->
              
                              <div class="panel panel-default paper-shadow download-group" data-z="0.5" style="margin-bottom: 5px;">
                                <ul class=" list-group">
                                <li class="list-group-item">
                                  <div class="media v-middle">
                                    <div class="media-body">
                                      <h4 class="text-headline margin-none" style="font-size: 26px;font-weight: bold;">หัวข้อ - รายการอะไหล่</h4>
                                    </div>
                                    <div class="media-right">
                                    </div>
                                  </div>
                                </li>
                                <li class="list-group-item media v-middle">
              
                                  <div class="panel panel-default" data-toggle="panel-collapse" data-open="false">
                                    <div class="panel-heading dowload-header panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#cf79710a-a57f-ef2d-6a9b-a66b4d1421ca" aria-expanded="true" style="">
                                      <h3 class="panel-title" style="font-size: 22px;">หมวดหมุ่ - เครื่องพิมพ์แบบพกพา</h3>
                                    </div>
              
                                    
                                  <div id="cf79710a-a57f-ef2d-6a9b-a66b4d1421ca" class="collapse"><div class="panel-body list-group">
              
                                      <div class="panel panel-default">
                                        <div class="panel-heading detail-change-icon">
                                          <a data-toggle="collapse" class="download-change1" href="#collapse-1">
                                            <h4 class="panel-title dowload-title">
                                                                              <!-- <span class="pull-right"><i class="icon-change-2 fa fa-plus " aria-hidden="true"></i></span> -->
                                            </h4>
                                          </a>
              
              
              
                                        </div>
                                        <div id="collapse-1" class="panel-collapse collapse in">
                                          <ul class="list-group list-group-menu">
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1124"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1124" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PJ673.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1124">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1124">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1125"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1125" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PJ623_663.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1125">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1125">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1126"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1126" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PJ763_763MFI.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1126">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1126">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                        </ul>
                                        </div>
              
              
                                      </div>
              
                                    </div></div></div>
              
                                </li>
              
                                </ul>
                              </div>
              
              
                                                             <br>
                                              <!-- <button type="button" class="accordion mg-0 download-dc" data-toggle="modal" data-target="#exampleModal"><img src="/themes/bws/images/icons8-pdf-48.png">                 </button>
                              <div class="form-group">
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1091">
                                      PL_NV750E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1092">
                                      PL_NV18E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1093">
                                      PL_NV800E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1094">
                                      PL_V3.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1095">
                                      PL_NV880E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1096">
                                      PL_NV95E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1097">
                                      PL_PR620.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1098">
                                      PL_PR650e.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1099">
                                      PL_PR655.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1100">
                                      PL_PR1000e.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1101">
                                      PL_PR670E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1102">
                                      PL_PR1050X.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1103">
                                      PL_PRS100, VR.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                    <li class="list-group-item"><a href="/index.php/site/download?file_id=1104">
                                      PL_PR680W.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span></a></li>
                                                </div> -->
              
                              <div class="panel panel-default paper-shadow download-group" data-z="0.5" style="margin-bottom: 5px;">
                                <ul class=" list-group">
                                <li class="list-group-item">
                                  <div class="media v-middle">
                                    <div class="media-body">
                                      <h4 class="text-headline margin-none" style="font-size: 26px;font-weight: bold;">หัวข้อ - รายการอะไหล่</h4>
                                    </div>
                                    <div class="media-right">
                                    </div>
                                  </div>
                                </li>
                                <li class="list-group-item media v-middle">
              
                                  <div class="panel panel-default" data-toggle="panel-collapse" data-open="false">
                                    <div class="panel-heading dowload-header panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#01a2c8a6-2c6e-09dd-1b84-f04c5a6d6566" aria-expanded="true" style="">
                                      <h3 class="panel-title" style="font-size: 22px;">หมวดหมุ่ - จักรเย็บผ้า</h3>
                                    </div>
              
                                    
                                  <div id="01a2c8a6-2c6e-09dd-1b84-f04c5a6d6566" class="collapse"><div class="panel-body list-group">
              
                                      <div class="panel panel-default">
                                        <div class="panel-heading detail-change-icon">
                                          <a data-toggle="collapse" class="download-change2" href="#collapse-2">
                                            <h4 class="panel-title dowload-title">
                                                                              <!-- <span class="pull-right"><i class="icon-change-13 fa fa-plus " aria-hidden="true"></i></span> -->
                                            </h4>
                                          </a>
              
              
              
                                        </div>
                                        <div id="collapse-2" class="panel-collapse collapse in">
                                          <ul class="list-group list-group-menu">
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1091"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1091" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_NV750E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1091">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1091">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1092"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1092" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_NV18E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1092">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1092">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1093"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1093" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_NV800E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1093">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1093">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1094"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1094" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_V3.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1094">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1094">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1095"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1095" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_NV880E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1095">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1095">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1096"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1096" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_NV95E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1096">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1096">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1097"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1097" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PR620.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1097">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1097">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1098"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1098" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PR650e.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1098">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1098">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1099"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1099" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PR655.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1099">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1099">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1100"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1100" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PR1000e.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1100">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1100">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1101"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1101" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PR670E.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1101">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1101">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1102"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1102" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PR1050X.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              {{-- ยืนยันตัวตน --}}
                                            <div class="modal fade" id="modal-ckeck-key-filedow1102">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1102">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1103"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1103" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PRS100, VR.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1103">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1103">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                            <li class="list-group-item">
              <!-- 
                                                <a href="/index.php/site/download?file_id=1104"> -->
              
                                                    <a href="#modal-ckeck-key-filedow1104" data-toggle="modal">
              
                                                  <img src="/themes/bws/images/icons8-pdf-48.png" alt="person" style="width: 22px;">
                                                  PL_PR680W.pdf <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด </span>
                                                </a>
                                              </li>
              
              
                                            <div class="modal fade" id="modal-ckeck-key-filedow1104">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                      <h4 class="modal-title modalhead"><i class="fa fa-sign-in" aria-hidden="true"></i> ยืนยันรหัสผ่าน</h4>
                                                    </div>
                                                    <form action="/index.php/site/Chkkey" method="post" enctype="multipart/form-data">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col-sm-8 col-sm-offset-2 text-center">
                                                            <h3 class="font-weight-bold">กรุณากรอกรหัส key เพื่่อยืนยันตัวตน</h3>
                                                            <input type="hidden" name="id" class="form-control" value="filedow">
                                                            <input type="hidden" name="valfile" class="form-control" value="1104">
              
                                                            <input type="password" name="check_key" class="form-control" autocomplete="off">
              
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                                        <button class="btn btn-warning" href="#" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
              
              
              
                                                                        </ul>
                                        </div>
              
              
                                      </div>
              
                                    </div></div></div>
              
                                </li>
              
                                </ul>
                              </div>
                              @else
                              <li class="list-group-item">
                                <div class="media v-middle">
                                  <div class="media-body">
                                    <h4 class="text-headline margin-none" style="font-size: 26px;">กรุณาเข้าสู่ระบบ</h4>
                                  </div>
                                  <div class="media-right">
                                  </div>
                                </div>
                              </li>
                              @endif
              
                            
              
                          </div>



                    </div>
                </div> <!-- end con 8 -->


                <div class="col-lg-4 col-md-4 box-video login pd-20">
                    <!-- start con 4 -->


                    <h2 class="title-layout"><span>วีดีโอแนะนำ</span> </h2>
                    <video width="100%" controls="">
                        <source src=" /lms_brother_docker/lms/app/themes/bws/video/brother-video-1.mp4" type="video/mp4">
                        <source src="mov_bbb.ogg" type="video/ogg">
                        Your browser does not support HTML5 video.
                    </video>

                    <h2 class="title-layout"><span>เกี่ยวกับบริษัท</span> </h2>

                    <div class="group-link">
                        <div class="depart-well-regis">
                            <a href="/lms_brother_docker/lms/app/index.php/contactus/index"> ติดต่อเรา </a>
                        </div>
                        <div class="depart">
                            <a href="/lms_brother_docker/lms/app/index.php/conditions/index"> เงื่อนไขการใช้งาน </a>
                        </div>
                    </div>
                </div> <!-- end con 4 -->
            </div>
        </div>
    </div>
</body>
@endsection
