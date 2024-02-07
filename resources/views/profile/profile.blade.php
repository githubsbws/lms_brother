@extends('layout/mainlayout')
@section('title', 'Dashboard')
@section('content')
<div class="parallax overflow-hidden page-section bg-blue-300">
    <div class="container parallax-layer" data-opacity="true">
        <div class="media media-grid v-middle">
            <div class="media-left">
                <span class="icon-block half bg-blue-500 text-white" style="height: 45px;"><i
                        class="fa fa-fw fa-user"></i></span>
            </div>
            <div class="media-body">
                <h3 class="text-display-2 text-white margin-none">{{ $profile->firstname }}</h3>

                <p class="text-white text-subhead" style="font-size: 1.6rem;">ดูประวัติส่วนตัว</p>
            </div>
        </div>
    </div>
</div>
<style>
    .label-deteil {
        margin-bottom: 15px;
        font-size: 22px;
    }

    .label-edit {
        font-size: 23px;
        margin-bottom: 15px;
        font-weight: bold;
        color: #363636;
    }
</style>
<div class="container">
    <div class="page-section">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                <!-- Tabbable Widget -->
                <div class="tabbable paper-shadow relative" data-z="0.5">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs"
                                                                                     style="font-size: 23px;">{{ $profile->firstname}} {{ $profile->lastname}}</span></a>
                        </li>
                    </ul>
                    <!-- // END Tabs -->
                    <!-- Panes -->
                    <div class="tab-content">
                        <div id="account" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-3">
                                    
                                    
                                </div>
                                <div class="col-md-9" style="padding-top: 40px;">
                                   
                                    <div class="col-xs-4 label-edit">หน่วยงาน</div>
                                    <div class="col-xs-8 label-deteil"></div>
                                    <div class="col-xs-4 label-edit">แผนก</div>
                                    <div class="col-xs-8 label-deteil"></div>
                                    <div
                                        class="col-xs-4 label-edit"></div>
                                    <div
                                        class="col-xs-8 label-deteil"></div>
                                    
                                    <div
                                        class="col-xs-4 label-edit"></div>
                                    <div class="col-xs-8 label-deteil"></div>
                                    <div
                                        class="col-xs-4 label-edit"></div>
                                    <div class="col-xs-8 label-deteil"></div>
                                    <div
                                        class="col-xs-4 label-edit"></div>
                                    
                                    
                                    <div class="col-xs-8 label-deteil"></div>
                                    <div
                                        class="col-xs-4 label-edit"></div>
                                    <div
                                        class="col-xs-8 label-deteil"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // END Panes -->
                </div>
                <!-- // END Tabbable Widget -->
                <br/>
                <br/>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">console.log("1111")</script>
@endsection