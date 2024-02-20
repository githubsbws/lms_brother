@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')

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
                        <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="{{ url('pgroup') }}">pgroup name</a>
                        </li> » <li>แก้ pgroup name</li>
                    </ul><!-- breadcrumbs -->
                    <div class="separator bottom"></div>


                    <!-- innerLR -->
                    <div class="innerLR">
                        <div class="widget widget-tabs border-bottom-none">
                            <div class="widget-head">
                                <ul>
                                    <li class="active">
                                        <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                            <i></i>แก้ pgroup name </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-body">
                                <div class="form">
                                    <form enctype="multipart/form-data" id="pgroup-form" action="{{route('pgroup_update',$p_group->pgroup_id)}}" method="post">
                                        @csrf
                                        <p class="note">ค่าที่มี <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>จำเป็นต้องใส่ให้ครบ</p>
                                                <p class="help-block">Fields with <span class="required">*</span> are required.</p>
                                                <div class="alert alert-block alert-danger" id="pgroup-grid_es_"
                                                    style="display:none">
                                                    <p>โปรดแก้ไขข้อผิดพลาดทางด้านล่าง:</p>
                                                    <ul>
                                                        <li>dummy</li>
                                                    </ul>
                                                </div>
                                                <div class="form-group"><label class="col-sm-3 control-label required" for="PGroup_group_name">Group Name <span class="required">*</span></label>
                                                    <div class="col-sm-9"><input class="span5 form-control" maxlength="255"
                                                         placeholder="Group Name" name="group_name" id="PGroup_group_name" type="text" value="{{$p_group->group_name}}">
                                                        <div class="help-block error" id="PGroup_group_name_em_" style="display:none">
                                                        </div>
                                                    </div>
                                                </div>

                                                @error('group_name')
										            <div class="my-2">
											            <span class="text-primary">{{$message}}</span>
										            </div>
									            @enderror

                                                {{-- ตั้งค่าระบบพื้นฐาน --}}
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Permission</label>
                                                    <div class="col-sm-9">
                                                        <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9"> ตั้งค่าระบบพื้นฐาน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_setting_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"> 
                                                                            <input id="ytPGroupPermission_setting_action"type="hidden" value="" name="PGroupPermission[setting][action]">
                                                                            <span id="PGroupPermission_setting_action">
                                                                            <label class="checkbox-inline"><input placeholder="[setting]action" id="PGroupPermission_setting_action_0" value="create" type="checkbox" name="setting">ตั้งค่าระบบพื้นฐาน</label>
                                                                            <label class="checkbox-inline"><input placeholder="[setting]action" id="PGroupPermission_setting_action_1" value="update" type="checkbox" name="update">แก้ไข</label>
                                                                            <label class="checkbox-inline"><input placeholder="[setting]action" id="PGroupPermission_setting_action_2" value="delete" type="checkbox" name="delete">ลบ</label></span>
                                                                                <div class="help-block error" id="PGroupPermission_setting_action_em_" style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label"for="PGroupPermission_setting_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9">
                                                                            <input id="ytPGroupPermission_setting_active" type="hidden" value="0" name="PGroupPermission[setting][active]"> 
                                                                                <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_setting_active">
                                                                                    <div class="bootstrap-switch-container">
                                                                                    <span class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span>
                                                                                    <input class="form-control" name="active" id="PGroupPermission_setting_active" value="1" type="checkbox">
                                                                                    <label for="PGroupPermission_setting_active" class="bootstrap-switch-label">&nbsp;</label>
                                                                                    <span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span>
                                                                                    <input class="form-control" name="active" id="PGroupPermission_setting_active" value="0" type="checkbox">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="help-block error" id="PGroupPermission_setting_active_em_"style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- เกียวกับเรา  --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                <label class="control-label col-xs-3">Controller</label>
                                                                <div class="col-xs-9"> เกียวกับเรา </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_about_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9">
                                                                            <input id="ytPGroupPermission_about_action" type="hidden" value="" name="PGroupPermission[about][action]">
                                                                            <span id="PGroupPermission_about_action">
                                                                            <label class="checkbox-inline"><input placeholder="[about]action" id="PGroupPermission_about_action_0" value="update" type="checkbox"name="PGroupPermission[about][action][]">แก้ไขเกียวกับเรา</label>
                                                                            <label class="checkbox-inline"><input placeholder="[about]action" id="PGroupPermission_about_action_1" value="index" type="checkbox" name="PGroupPermission[about][action][]">จัดการเกี่ยวกับเรา</label>
                                                                            <label class="checkbox-inline"><input placeholder="[about]action" id="PGroupPermission_about_action_2" value="create" type="checkbox" name="PGroupPermission[about][action][]">เพิ่ม</label>
                                                                            <label class="checkbox-inline"><input placeholder="[about]action" id="PGroupPermission_about_action_3" value="delete" type="checkbox" name="PGroupPermission[about][action][]">ลบ</label></span>
                                                                                <div class="help-block error" id="PGroupPermission_about_action_em_" style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_about_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input id="ytPGroupPermission_about_active" type="hidden" value="0" name="PGroupPermission[about][active]">
                                                                                <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_about_active">
                                                                                    <div class="bootstrap-switch-container">
                                                                                    <span class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span>
                                                                                    <input class="form-control" name="PGroupPermission[about][active]" id="PGroupPermission_about_active" value="1"type="checkbox">
                                                                                    <label for="PGroupPermission_about_active" class="bootstrap-switch-label">&nbsp;</label>
                                                                                    <span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span>
                                                                                    <input class="form-control" name="PGroupPermission[about][active]" id="PGroupPermission_about_active" value="0"type="checkbox">
                                                                                    <div class="help-block error" id="PGroupPermission_about_active_em_" style="display:none"></div>
                                                                                    </div>    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- เงื่อนไขการใช้งาน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                <label class="control-label col-xs-3">Controller</label>
                                                                <div class="col-xs-9"> เงื่อนไขการใช้งาน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_conditions_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9">
                                                                            <input id="ytPGroupPermission_conditions_action" type="hidden" value="" name="PGroupPermission[conditions][action]">
                                                                            <span id="PGroupPermission_conditions_action">
                                                                            <label class="checkbox-inline"><input placeholder="[conditions]action" id="PGroupPermission_conditions_action_0" value="update" type="checkbox" name="PGroupPermission[conditions][action][]">แก้ไขเงื่อนไขการใช้งาน</label>
                                                                            <label class="checkbox-inline"><input placeholder="[conditions]action" id="PGroupPermission_conditions_action_1" value="delete" type="checkbox" name="PGroupPermission[conditions][action][]">ลบ</label>
                                                                            <label class="checkbox-inline"><input placeholder="[conditions]action" id="PGroupPermission_conditions_action_2" value="view" type="checkbox" name="PGroupPermission[conditions][action][]">ดู</label>
                                                                            <label class="checkbox-inline"><input placeholder="[conditions]action" id="PGroupPermission_conditions_action_3" value="index" type="checkbox" name="PGroupPermission[conditions][action][]">หน้าแรก</label></span>
                                                                                <div class="help-block error" id="PGroupPermission_conditions_action_em_" style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_conditions_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9">
                                                                            <input id="ytPGroupPermission_conditions_active" type="hidden" value="0" name="PGroupPermission[conditions][active]">
                                                                                <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_conditions_active">
                                                                                    <div class="bootstrap-switch-container">
                                                                                        <span class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span>
                                                                                        <input class="form-control" name="PGroupPermission[conditions][active]" id="PGroupPermission_conditions_active" value="1"type="checkbox">
                                                                                        <label for="PGroupPermission_conditions_active" class="bootstrap-switch-label">&nbsp;</label>
                                                                                        <span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span>
                                                                                        <input class="form-control" name="PGroupPermission[conditions][active]" id="PGroupPermission_conditions_active" value="0"type="checkbox">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="help-block error" id="PGroupPermission_conditions_active_em_" style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ติดต่อเรา --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9"> ติดต่อเรา </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_ContactusNew_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9">
                                                                            <input id="ytPGroupPermission_ContactusNew_action" type="hidden" value="" name="PGroupPermission[ContactusNew][action]">
                                                                            <span id="PGroupPermission_ContactusNew_action">
                                                                            <label class="checkbox-inline"><input placeholder="[ Contactus New]action" id="PGroupPermission_ContactusNew_action_0" value="create" type="checkbox" name="PGroupPermission[ContactusNew][action][]">เพิ่ม</label>
                                                                            <label class="checkbox-inline"><input placeholder="[ Contactus New]action" id="PGroupPermission_ContactusNew_action_1" value="delete" type="checkbox" name="PGroupPermission[ContactusNew][action][]">ลบ</label>
                                                                            <label class="checkbox-inline"><input placeholder="[ Contactus New]action" id="PGroupPermission_ContactusNew_action_2" value="sequence" type="checkbox" name="PGroupPermission[ContactusNew][action][]">ย้ายตำแหน่ง</label>
                                                                            <label class="checkbox-inline"><input placeholder="[ Contactus New]action" id="PGroupPermission_ContactusNew_action_3" value="admin" type="checkbox" name="PGroupPermission[ContactusNew][action][]">admin</label>
                                                                            <label class="checkbox-inline"><input placeholder="[ Contactus New]action" id="PGroupPermission_ContactusNew_action_4" value="update" type="checkbox" name="PGroupPermission[ContactusNew][action][]">แก้ไข</label></span>
                                                                                <div class="help-block error" id="PGroupPermission_ContactusNew_action_em_" style="display:none"></div>
                                                                             </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_ContactusNew_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9">
                                                                            <input id="ytPGroupPermission_ContactusNew_active" type="hidden" value="0" name="PGroupPermission[ContactusNew][active]">
                                                                                <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_ContactusNew_active">
                                                                                    <div class="bootstrap-switch-container">
                                                                                    <span class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span>
                                                                                    <input class="form-control"name="PGroupPermission[ContactusNew][active]"id="PGroupPermission_ContactusNew_active"value="1"type="checkbox">
                                                                                    <label for="PGroupPermission_ContactusNew_active" class="bootstrap-switch-label">&nbsp;</label>
                                                                                    <span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span>
                                                                                    <input class="form-control"name="PGroupPermission[ContactusNew][active]"id="PGroupPermission_ContactusNew_active"value="0"type="checkbox">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="help-block error" id="PGroupPermission_ContactusNew_active_em_" style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบVDO --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9"> ระบบVDO </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_vdo_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9">
                                                                            <input id="ytPGroupPermission_vdo_action" type="hidden" value="" name="PGroupPermission[vdo][action]">
                                                                            <span id="PGroupPermission_vdo_action">
                                                                            <label class="checkbox-inline"><input placeholder="[vdo]action" id="PGroupPermission_vdo_action_0" value="index" type="checkbox" name="PGroupPermission[vdo][action][]">จัดการVDO</label>
                                                                            <label class="checkbox-inline"><input placeholder="[vdo]action" id="PGroupPermission_vdo_action_1" value="create" type="checkbox" name="PGroupPermission[vdo][action][]">เพิ่มVDO</label>
                                                                            <label class="checkbox-inline"><input placeholder="[vdo]action" id="PGroupPermission_vdo_action_2" value="update" type="checkbox" name="PGroupPermission[vdo][action][]">แก้ไขVDO</label>
                                                                            <label class="checkbox-inline"><input placeholder="[vdo]action" id="PGroupPermission_vdo_action_3" value="delete" type="checkbox" name="PGroupPermission[vdo][action][]">ลบVDO</label></span>
                                                                            <div class="help-block error" id="PGroupPermission_vdo_action_em_" style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="PGroupPermission_vdo_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9">
                                                                            <input id="ytPGroupPermission_vdo_active" type="hidden" value="0" name="PGroupPermission[vdo][active]">
                                                                                <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_vdo_active">
                                                                                    <div class="bootstrap-switch-container">
                                                                                    <span class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span>
                                                                                    <input class="form-control" name="PGroupPermission[vdo][active]" id="PGroupPermission_vdo_active" value="1" type="checkbox">
                                                                                    <label for="PGroupPermission_vdo_active" class="bootstrap-switch-label">&nbsp;</label>
                                                                                    <span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span>
                                                                                    <input class="form-control" name="PGroupPermission[vdo][active]" id="PGroupPermission_vdo_active" value="0" type="checkbox">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="help-block error" id="PGroupPermission_vdo_active_em_" style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- เอกสาร --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        เอกสาร </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_document_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_document_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[document][action]"><span
                                                                                    id="PGroupPermission_document_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_0"
                                                                                            value="create" type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">เพิ่มเอกสาร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_1"
                                                                                            value="createtype"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">เพิ่มประเภทเอกสาร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_2"
                                                                                            value="update" type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">แก้ไขเอกสาร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_3"
                                                                                            value="delete" type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">ลบเอกสาร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_4"
                                                                                            value="index" type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">จัดการเอกสาร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_5"
                                                                                            value="index_type"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">จัดการประเภทเอกสาร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_6"
                                                                                            value="view" type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">ดู</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_7"
                                                                                            value="update_type"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">แก้ไข
                                                                                        type</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_8"
                                                                                            value="multidelete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">ลบทั้งหมด</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_9"
                                                                                            value="deletetype"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">ลบ
                                                                                        type</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[document]action"
                                                                                            id="PGroupPermission_document_action_10"
                                                                                            value="multdeletetype"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[document][action][]">ลบ
                                                                                        type ทั้งหมด</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_document_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_document_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_document_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[document][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_document_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[document][active]"
                                                                                            id="PGroupPermission_document_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_document_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[document][active]"
                                                                                            id="PGroupPermission_document_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_document_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบจัดการเนื้อหาเว็บไซต์(ข่าวสาร) --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบจัดการเนื้อหาเว็บไซต์(ข่าวสาร) </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_news_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_news_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[news][action]"><span
                                                                                    id="PGroupPermission_news_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[news]action"
                                                                                            id="PGroupPermission_news_action_0"
                                                                                            value="create" type="checkbox"
                                                                                            name="PGroupPermission[news][action][]">เพิ่มข่าวสารและกิจกรรม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[news]action"
                                                                                            id="PGroupPermission_news_action_1"
                                                                                            value="update" type="checkbox"
                                                                                            name="PGroupPermission[news][action][]">แก้ไขข่าวสารและกิจกรรม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[news]action"
                                                                                            id="PGroupPermission_news_action_2"
                                                                                            value="delete" type="checkbox"
                                                                                            name="PGroupPermission[news][action][]">ลบข่าวสารและกิจกรรม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[news]action"
                                                                                            id="PGroupPermission_news_action_3"
                                                                                            value="index" type="checkbox"
                                                                                            name="PGroupPermission[news][action][]">จัดการข่าวสารและกิจกรรม</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_news_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_news_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_news_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[news][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_news_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[news][active]"
                                                                                            id="PGroupPermission_news_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_news_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[news][active]"
                                                                                            id="PGroupPermission_news_active"
                                                                                            value="0"
                                                                                            type="checkbox">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_news_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบหมวดหลักสูตร --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบหมวดหลักสูตร </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_category_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_category_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[category][action]"><span
                                                                                    id="PGroupPermission_category_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[category]action"
                                                                                            id="PGroupPermission_category_action_0"
                                                                                            value="create" type="checkbox"
                                                                                            name="PGroupPermission[category][action][]">เพิ่มหมวดหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[category]action"
                                                                                            id="PGroupPermission_category_action_1"
                                                                                            value="update" type="checkbox"
                                                                                            name="PGroupPermission[category][action][]">แก้ไขหมวดหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[category]action"
                                                                                            id="PGroupPermission_category_action_2"
                                                                                            value="delete" type="checkbox"
                                                                                            name="PGroupPermission[category][action][]">ลบข้อมูล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[category]action"
                                                                                            id="PGroupPermission_category_action_3"
                                                                                            value="index" type="checkbox"
                                                                                            name="PGroupPermission[category][action][]">จัดการหมวดหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[category]action"
                                                                                            id="PGroupPermission_category_action_4"
                                                                                            value="active" type="checkbox"
                                                                                            name="PGroupPermission[category][action][]">จัดการสถานะการแสดงผล</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_category_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_category_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_category_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[category][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_category_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[category][active]"
                                                                                            id="PGroupPermission_category_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_category_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[category][active]"
                                                                                            id="PGroupPermission_category_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_category_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบจัดการหลักสูตร --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบจัดการหลักสูตร </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_courseonline_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_courseonline_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[courseonline][action]"><span
                                                                                    id="PGroupPermission_courseonline_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_0"
                                                                                            value="create" type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">เพิ่มหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_1"
                                                                                            value="update" type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">แก้ไขหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_2"
                                                                                            value="delete" type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">ลบหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_3"
                                                                                            value="control_lesson"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">จัดการบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_4"
                                                                                            value="formcourse"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">เลือกข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_5"
                                                                                            value="updatecourse"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">แก้ไขข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_6"
                                                                                            value="add_teacher"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">เพิ่มผู้สอน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_7"
                                                                                            value="report_course"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">รายงานแบบสอบถาม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_8"
                                                                                            value="index" type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">จัดการหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_9"
                                                                                            value="sortlesson"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">จัดเรียงบท</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_10"
                                                                                            value="active" type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">จัดการการแสดงผล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[courseonline]action"
                                                                                            id="PGroupPermission_courseonline_action_11"
                                                                                            value="multidelete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[courseonline][action][]">ลบหลักสูตรทั้งหมด</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_courseonline_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_courseonline_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_courseonline_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[courseonline][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_courseonline_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[courseonline][active]"
                                                                                            id="PGroupPermission_courseonline_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_courseonline_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[courseonline][active]"
                                                                                            id="PGroupPermission_courseonline_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_courseonline_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบจัดการเนื้อหาบทเรียน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบจัดการเนื้อหาบทเรียน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_lesson_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_lesson_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[lesson][action]"><span
                                                                                    id="PGroupPermission_lesson_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[lesson]action"
                                                                                            id="PGroupPermission_lesson_action_0"
                                                                                            value="create" type="checkbox"
                                                                                            name="PGroupPermission[lesson][action][]">เพิ่มบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[lesson]action"
                                                                                            id="PGroupPermission_lesson_action_1"
                                                                                            value="update" type="checkbox"
                                                                                            name="PGroupPermission[lesson][action][]">แก้ไขบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[lesson]action"
                                                                                            id="PGroupPermission_lesson_action_2"
                                                                                            value="delete" type="checkbox"
                                                                                            name="PGroupPermission[lesson][action][]">ลบบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[lesson]action"
                                                                                            id="PGroupPermission_lesson_action_3"
                                                                                            value="vdomanage"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[lesson][action][]">จัดการจัดเรียงเนื้อหา</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[lesson]action"
                                                                                            id="PGroupPermission_lesson_action_4"
                                                                                            value="vdocontent"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[lesson][action][]">ซิ้งค์เนื่อหา</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[lesson]action"
                                                                                            id="PGroupPermission_lesson_action_5"
                                                                                            value="index" type="checkbox"
                                                                                            name="PGroupPermission[lesson][action][]">จัดการบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[lesson]action"
                                                                                            id="PGroupPermission_lesson_action_6"
                                                                                            value="updatelesson"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[lesson][action][]">แก้ไขชุดข้อสอบก่อนเรียน/หลังเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[lesson]action"
                                                                                            id="PGroupPermission_lesson_action_7"
                                                                                            value="formlesson"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[lesson][action][]">เลือกชุดข้อสอบก่อนเรียน/หลังเรียน</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_lesson_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_lesson_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_lesson_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[lesson][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_lesson_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[lesson][active]"
                                                                                            id="PGroupPermission_lesson_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_lesson_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[lesson][active]"
                                                                                            id="PGroupPermission_lesson_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_lesson_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบชุดข้อสอบบทเรียน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบชุดข้อสอบบทเรียน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_grouptesting_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_grouptesting_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[grouptesting][action]"><span
                                                                                    id="PGroupPermission_grouptesting_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[grouptesting]action"
                                                                                            id="PGroupPermission_grouptesting_action_0"
                                                                                            value="create" type="checkbox"
                                                                                            name="PGroupPermission[grouptesting][action][]">เพิ่มชุดข้อสอบบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[grouptesting]action"
                                                                                            id="PGroupPermission_grouptesting_action_1"
                                                                                            value="update" type="checkbox"
                                                                                            name="PGroupPermission[grouptesting][action][]">แก้ไขชุดข้อสอบบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[grouptesting]action"
                                                                                            id="PGroupPermission_grouptesting_action_2"
                                                                                            value="delete" type="checkbox"
                                                                                            name="PGroupPermission[grouptesting][action][]">ลบชุดข้อสอบบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[grouptesting]action"
                                                                                            id="PGroupPermission_grouptesting_action_3"
                                                                                            value="index" type="checkbox"
                                                                                            name="PGroupPermission[grouptesting][action][]">จัดการข้อสอบบทเรียน</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_grouptesting_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_grouptesting_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_grouptesting_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[grouptesting][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_grouptesting_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[grouptesting][active]"
                                                                                            id="PGroupPermission_grouptesting_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_grouptesting_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[grouptesting][active]"
                                                                                            id="PGroupPermission_grouptesting_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_grouptesting_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบชุดข้อสอบหลักสูตร --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบชุดข้อสอบหลักสูตร </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_coursegrouptesting_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_coursegrouptesting_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[coursegrouptesting][action]"><span
                                                                                    id="PGroupPermission_coursegrouptesting_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[coursegrouptesting]action"
                                                                                            id="PGroupPermission_coursegrouptesting_action_0"
                                                                                            value="create" type="checkbox"
                                                                                            name="PGroupPermission[coursegrouptesting][action][]">เพิ่มชุดข้อสอบหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursegrouptesting]action"
                                                                                            id="PGroupPermission_coursegrouptesting_action_1"
                                                                                            value="update" type="checkbox"
                                                                                            name="PGroupPermission[coursegrouptesting][action][]">แก้ไขข้อมูล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursegrouptesting]action"
                                                                                            id="PGroupPermission_coursegrouptesting_action_2"
                                                                                            value="delete" type="checkbox"
                                                                                            name="PGroupPermission[coursegrouptesting][action][]">ลบข้อมูล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursegrouptesting]action"
                                                                                            id="PGroupPermission_coursegrouptesting_action_3"
                                                                                            value="index" type="checkbox"
                                                                                            name="PGroupPermission[coursegrouptesting][action][]">จัดการชุดข้อสอบหลักสูตร</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_coursegrouptesting_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_coursegrouptesting_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_coursegrouptesting_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[coursegrouptesting][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_coursegrouptesting_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[coursegrouptesting][active]"
                                                                                            id="PGroupPermission_coursegrouptesting_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_coursegrouptesting_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[coursegrouptesting][active]"
                                                                                            id="PGroupPermission_coursegrouptesting_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_coursegrouptesting_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบชุดข้อสอบบท/เพิ่มข้อสอบ/จัดการข้อสอบ  --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบชุดข้อสอบบท/เพิ่มข้อสอบ/จัดการข้อสอบ </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_question_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_question_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[question][action]"><span
                                                                                    id="PGroupPermission_question_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[question]action"
                                                                                            id="PGroupPermission_question_action_0"
                                                                                            value="create" type="checkbox"
                                                                                            name="PGroupPermission[question][action][]">เพิ่มข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[question]action"
                                                                                            id="PGroupPermission_question_action_1"
                                                                                            value="update" type="checkbox"
                                                                                            name="PGroupPermission[question][action][]">แก้ไขข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[question]action"
                                                                                            id="PGroupPermission_question_action_2"
                                                                                            value="delete" type="checkbox"
                                                                                            name="PGroupPermission[question][action][]">ลบข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[question]action"
                                                                                            id="PGroupPermission_question_action_3"
                                                                                            value="import" type="checkbox"
                                                                                            name="PGroupPermission[question][action][]">Import
                                                                                        excel ข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[question]action"
                                                                                            id="PGroupPermission_question_action_4"
                                                                                            value="index" type="checkbox"
                                                                                            name="PGroupPermission[question][action][]">จัดการข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[question]action"
                                                                                            id="PGroupPermission_question_action_5"
                                                                                            value="export" type="checkbox"
                                                                                            name="PGroupPermission[question][action][]">export</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_question_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_question_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_question_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[question][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_question_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[question][active]"
                                                                                            id="PGroupPermission_question_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_question_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[question][active]"
                                                                                            id="PGroupPermission_question_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_question_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- จัดการระบบชุดข้อสอบหลักสูตร --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        จัดการระบบชุดข้อสอบหลักสูตร </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_coursequestion_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_coursequestion_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[coursequestion][action]"><span
                                                                                    id="PGroupPermission_coursequestion_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[coursequestion]action"
                                                                                            id="PGroupPermission_coursequestion_action_0"
                                                                                            value="import"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursequestion][action][]">Import
                                                                                        excel ข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursequestion]action"
                                                                                            id="PGroupPermission_coursequestion_action_1"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursequestion][action][]">เพิ่มข้อสอบชุด
                                                                                        test</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursequestion]action"
                                                                                            id="PGroupPermission_coursequestion_action_2"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursequestion][action][]">แก้ไขข้อสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursequestion]action"
                                                                                            id="PGroupPermission_coursequestion_action_3"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursequestion][action][]">ลบข้อสอบ</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_coursequestion_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_coursequestion_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_coursequestion_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[coursequestion][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_coursequestion_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[coursequestion][active]"
                                                                                            id="PGroupPermission_coursequestion_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_coursequestion_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[coursequestion][active]"
                                                                                            id="PGroupPermission_coursequestion_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_coursequestion_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบแบบประเมิน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบแบบประเมิน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_questionnaire_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_questionnaire_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[questionnaire][action]"><span
                                                                                    id="PGroupPermission_questionnaire_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">เพิ่มแบบประเมิน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">แก้ไขแบบประเมิน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">ลบแบบประเมิน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_3"
                                                                                            value="addcourse_teacher"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">กำหนดวิทยากรหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_4"
                                                                                            value="editcourse_teacher"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">แก้ไขผู้สอน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_5"
                                                                                            value="addlesson_teacher"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">กำหนดวิทยากรบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_6"
                                                                                            value="editlesson_teacher"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">แก้ไขผู้สอบบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_7"
                                                                                            value="example"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">ตัวอย่างแบบประเมิน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_8"
                                                                                            value="report_list"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">รายงานสรุปความคิดเห็นของผู้เรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_9"
                                                                                            value="report_course"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">รายงานแบบสอบถาม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_10"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">จัดการแบบประเมิน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaire]action"
                                                                                            id="PGroupPermission_questionnaire_action_11"
                                                                                            value="choose"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaire][action][]">เลือกแบบสอบถาม</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_questionnaire_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_questionnaire_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_questionnaire_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[questionnaire][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_questionnaire_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[questionnaire][active]"
                                                                                            id="PGroupPermission_questionnaire_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_questionnaire_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[questionnaire][active]"
                                                                                            id="PGroupPermission_questionnaire_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_questionnaire_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบจัดการระดับชั้นเรียน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบจัดการระดับชั้นเรียน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_orgchart_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_orgchart_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[orgchart][action]"><span
                                                                                    id="PGroupPermission_orgchart_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[orgchart]action"
                                                                                            id="PGroupPermission_orgchart_action_0"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[orgchart][action][]">จัดการOrgChart</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_orgchart_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_orgchart_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_orgchart_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[orgchart][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_orgchart_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[orgchart][active]"
                                                                                            id="PGroupPermission_orgchart_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_orgchart_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[orgchart][active]"
                                                                                            id="PGroupPermission_orgchart_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_orgchart_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ห้องเรียนออนไลน์ --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ห้องเรียนออนไลน์ </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_virtualclassroom_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_virtualclassroom_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[virtualclassroom][action]"><span
                                                                                    id="PGroupPermission_virtualclassroom_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_0"
                                                                                            value="view"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">ดู</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_1"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">เพิ่ม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_2"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">แก้ไข</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_3"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">ลบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_4"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">หน้าแรก</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_5"
                                                                                            value="multidelete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">ลบทั้งหมด</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_6"
                                                                                            value="admin"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">admin</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_7"
                                                                                            value="roomstatus"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">สถานะห้อง</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_8"
                                                                                            value="createroom"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">สร้างห้อง</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_9"
                                                                                            value="endroom"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">จบห้อง</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_10"
                                                                                            value="sendmailuser"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">ส่งemail</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_11"
                                                                                            value="getuser"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">ดึงUser</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_12"
                                                                                            value="sequence"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">ลำดับ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_13"
                                                                                            value="checkexists"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">เช็ค</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_14"
                                                                                            value="uploadifive"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">อัพโหลด</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_15"
                                                                                            value="checklearn"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">เช็คเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[virtualclassroom]action"
                                                                                            id="PGroupPermission_virtualclassroom_action_16"
                                                                                            value="logmeeting"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[virtualclassroom][action][]">log</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_virtualclassroom_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_virtualclassroom_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_virtualclassroom_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[virtualclassroom][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_virtualclassroom_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[virtualclassroom][active]"
                                                                                            id="PGroupPermission_virtualclassroom_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_virtualclassroom_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[virtualclassroom][active]"
                                                                                            id="PGroupPermission_virtualclassroom_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_virtualclassroom_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบตรวจข้อสอบบรรยาย --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบตรวจข้อสอบบรรยาย </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_checklecture_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_checklecture_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[checklecture][action]"><span
                                                                                    id="PGroupPermission_checklecture_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_0"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">รายการ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_1"
                                                                                            value="saveexamconfirm"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">บันทึก1</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_2"
                                                                                            value="savecourseexamconfirm"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">บันทึก2</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_3"
                                                                                            value="courecheck"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">ตรวจสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_4"
                                                                                            value="get_dialog_exam"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">แสดงรายการ1</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_5"
                                                                                            value="get_dialog_result"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">แสดงรายการ2</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_6"
                                                                                            value="get_dialog_resultcourse"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">แสดงรายการ3</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_7"
                                                                                            value="get_dialog_exam_course"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">แสดงรายการ4</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_8"
                                                                                            value="saveexam"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">บันทึก3</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_9"
                                                                                            value="saveexamcourse"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">บันทึก4</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_10"
                                                                                            value="loglecture"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">แสดงรายการ
                                                                                        log</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[checklecture]action"
                                                                                            id="PGroupPermission_checklecture_action_11"
                                                                                            value="getlessondata"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[checklecture][action][]">ดึงบทเรียน</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_checklecture_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_checklecture_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_checklecture_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[checklecture][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_checklecture_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[checklecture][active]"
                                                                                            id="PGroupPermission_checklecture_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_checklecture_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[checklecture][active]"
                                                                                            id="PGroupPermission_checklecture_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_checklecture_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- จัดการลายเซนต์ --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        จัดการลายเซนต์ </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_signature_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_signature_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[signature][action]"><span
                                                                                    id="PGroupPermission_signature_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[signature]action"
                                                                                            id="PGroupPermission_signature_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[signature][action][]">เพิ่มลายเซนต์</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[signature]action"
                                                                                            id="PGroupPermission_signature_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[signature][action][]">แก้ไขลายเซนต์</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[signature]action"
                                                                                            id="PGroupPermission_signature_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[signature][action][]">ลบลายเซนต์</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[signature]action"
                                                                                            id="PGroupPermission_signature_action_3"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[signature][action][]">รายการ</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_signature_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_signature_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_signature_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[signature][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_signature_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[signature][active]"
                                                                                            id="PGroupPermission_signature_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_signature_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[signature][active]"
                                                                                            id="PGroupPermission_signature_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_signature_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- แบบประเมินผลการฝึกอบรม --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        แบบประเมินผลการฝึกอบรม </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_questionnaireout_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_questionnaireout_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[questionnaireout][action]"><span
                                                                                    id="PGroupPermission_questionnaireout_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[questionnaireout]action"
                                                                                            id="PGroupPermission_questionnaireout_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaireout][action][]">เพิ่มแบบสอบถาม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaireout]action"
                                                                                            id="PGroupPermission_questionnaireout_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaireout][action][]">แก้ไขแบบสอบถาม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaireout]action"
                                                                                            id="PGroupPermission_questionnaireout_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaireout][action][]">ลบแบบสอบถาม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[questionnaireout]action"
                                                                                            id="PGroupPermission_questionnaireout_action_3"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[questionnaireout][action][]">จัดการแบบสอบถาม</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_questionnaireout_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_questionnaireout_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_questionnaireout_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[questionnaireout][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_questionnaireout_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[questionnaireout][active]"
                                                                                            id="PGroupPermission_questionnaireout_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_questionnaireout_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[questionnaireout][active]"
                                                                                            id="PGroupPermission_questionnaireout_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_questionnaireout_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- Captcha --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        Captcha </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_captcha_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_captcha_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[captcha][action]"><span
                                                                                    id="PGroupPermission_captcha_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[captcha]action"
                                                                                            id="PGroupPermission_captcha_action_0"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[captcha][action][]">จัดการ
                                                                                        Captcha</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[captcha]action"
                                                                                            id="PGroupPermission_captcha_action_1"
                                                                                            value="view"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[captcha][action][]">ดูรายละเอียด
                                                                                        Captcha</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[captcha]action"
                                                                                            id="PGroupPermission_captcha_action_2"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[captcha][action][]">แก้ไขข้อมูล
                                                                                        Captcha</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[captcha]action"
                                                                                            id="PGroupPermission_captcha_action_3"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[captcha][action][]">ลบข้อมูล
                                                                                        Captcha</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[captcha]action"
                                                                                            id="PGroupPermission_captcha_action_4"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[captcha][action][]">สร้าง
                                                                                        Captcha</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[captcha]action"
                                                                                            id="PGroupPermission_captcha_action_5"
                                                                                            value="courseModal"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[captcha][action][]">จัดการคอร์ส</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[captcha]action"
                                                                                            id="PGroupPermission_captcha_action_6"
                                                                                            value="saveCourseModal"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[captcha][action][]">บันทึกคอร์ส</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[captcha]action"
                                                                                            id="PGroupPermission_captcha_action_7"
                                                                                            value="multidelete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[captcha][action][]">ลบทั้งหมด</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_captcha_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_captcha_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_captcha_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[captcha][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_captcha_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[captcha][active]"
                                                                                            id="PGroupPermission_captcha_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_captcha_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[captcha][active]"
                                                                                            id="PGroupPermission_captcha_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_captcha_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบ Reset  --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบ Reset </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_LearnReset_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_LearnReset_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[LearnReset][action]"><span
                                                                                    id="PGroupPermission_LearnReset_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[ Learn Reset]action"
                                                                                            id="PGroupPermission_LearnReset_action_0"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LearnReset][action][]">หน้าหลัก</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_LearnReset_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_LearnReset_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_LearnReset_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[LearnReset][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_LearnReset_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[LearnReset][active]"
                                                                                            id="PGroupPermission_LearnReset_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_LearnReset_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[LearnReset][active]"
                                                                                            id="PGroupPermission_LearnReset_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_LearnReset_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบปัญหาการใช้งาน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบปัญหาการใช้งาน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_reportproblem_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_reportproblem_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[reportproblem][action]"><span
                                                                                    id="PGroupPermission_reportproblem_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[reportproblem]action"
                                                                                            id="PGroupPermission_reportproblem_action_0"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[reportproblem][action][]">จัดการระบบปัญหาการใช้งาน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[reportproblem]action"
                                                                                            id="PGroupPermission_reportproblem_action_1"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[reportproblem][action][]">เพิ่มระบบปัญหาการใช้งาน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[reportproblem]action"
                                                                                            id="PGroupPermission_reportproblem_action_2"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[reportproblem][action][]">แก้ไขระบบปัญหาการใช้งาน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[reportproblem]action"
                                                                                            id="PGroupPermission_reportproblem_action_3"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[reportproblem][action][]">ลบระบบปัญหาการใช้งาน</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_reportproblem_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_reportproblem_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_reportproblem_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[reportproblem][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_reportproblem_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[reportproblem][active]"
                                                                                            id="PGroupPermission_reportproblem_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_reportproblem_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[reportproblem][active]"
                                                                                            id="PGroupPermission_reportproblem_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_reportproblem_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- คำถามที่พบบ่อย --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        คำถามที่พบบ่อย </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_faq_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_faq_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[faq][action]"><span
                                                                                    id="PGroupPermission_faq_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[faq]action"
                                                                                            id="PGroupPermission_faq_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[faq][action][]">เพิ่มคำถามที่พบบ่อย</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[faq]action"
                                                                                            id="PGroupPermission_faq_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[faq][action][]">แก้ไขคำถามที่พบบ่อย</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[faq]action"
                                                                                            id="PGroupPermission_faq_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[faq][action][]">ลบคำถามที่พบบ่อย</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_faq_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_faq_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_faq_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[faq][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_faq_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[faq][active]"
                                                                                            id="PGroupPermission_faq_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_faq_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[faq][active]"
                                                                                            id="PGroupPermission_faq_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_faq_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ข้อมูลผู้ดูแลระบบ --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ข้อมูลผู้ดูแลระบบ </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_adminuser_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_adminuser_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[adminuser][action]"><span
                                                                                    id="PGroupPermission_adminuser_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[adminuser]action"
                                                                                            id="PGroupPermission_adminuser_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[adminuser][action][]">เพิ่มผู้ดูแลระบบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[adminuser]action"
                                                                                            id="PGroupPermission_adminuser_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[adminuser][action][]">แก้ไขผู้ดูแลระบบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[adminuser]action"
                                                                                            id="PGroupPermission_adminuser_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[adminuser][action][]">ลบผู้ดูแลระบบ</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_adminuser_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_adminuser_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_adminuser_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[adminuser][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_adminuser_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[adminuser][active]"
                                                                                            id="PGroupPermission_adminuser_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_adminuser_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[adminuser][active]"
                                                                                            id="PGroupPermission_adminuser_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_adminuser_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบวิธีการใช้งาน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบวิธีการใช้งาน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_usability_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_usability_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[usability][action]"><span
                                                                                    id="PGroupPermission_usability_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[usability]action"
                                                                                            id="PGroupPermission_usability_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[usability][action][]">เพิ่มวิธีการใช้งาน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[usability]action"
                                                                                            id="PGroupPermission_usability_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[usability][action][]">แก้ไขวิธีการใช้งาน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[usability]action"
                                                                                            id="PGroupPermission_usability_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[usability][action][]">ลบวิธีการใช้งาน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[usability]action"
                                                                                            id="PGroupPermission_usability_action_3"
                                                                                            value="multidelete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[usability][action][]">ลบวิธีการใช้งานหลายรายการ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[usability]action"
                                                                                            id="PGroupPermission_usability_action_4"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[usability][action][]">จัดการวิธีการใช้งาน</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_usability_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_usability_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_usability_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[usability][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_usability_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[usability][active]"
                                                                                            id="PGroupPermission_usability_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_usability_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[usability][active]"
                                                                                            id="PGroupPermission_usability_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_usability_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- กลุ่มผู้ใช้งาน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        กลุ่มผู้ใช้งาน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_pgroup_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_pgroup_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[pgroup][action]"><span
                                                                                    id="PGroupPermission_pgroup_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[pgroup]action"
                                                                                            id="PGroupPermission_pgroup_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[pgroup][action][]">เพิ่มกลุ่มผู้ใช้</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[pgroup]action"
                                                                                            id="PGroupPermission_pgroup_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[pgroup][action][]">แก้ไขกลุ่มผู้ใช้</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[pgroup]action"
                                                                                            id="PGroupPermission_pgroup_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[pgroup][action][]">ลบกลุ่มผู้ใช้</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_pgroup_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_pgroup_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_pgroup_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[pgroup][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_pgroup_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[pgroup][active]"
                                                                                            id="PGroupPermission_pgroup_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_pgroup_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[pgroup][active]"
                                                                                            id="PGroupPermission_pgroup_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_pgroup_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ข้อมูลสมาชิก --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ข้อมูลสมาชิก </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_admin_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_admin_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[admin][action]"><span
                                                                                    id="PGroupPermission_admin_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_0"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">แก้ไข</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_1"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">เพิ่มข้อมูล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_2"
                                                                                            value="settingregis"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">ตั้งค่าการลงทะเบียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_3"
                                                                                            value="excel"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">เพิ่มสมาชิกจาก
                                                                                        Excle</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_4"
                                                                                            value="status"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">รายงานการสมัครสมาชิก</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_5"
                                                                                            value="resetpassword"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">รีเซ็ตรหัสผ่าน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_6"
                                                                                            value="access"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">จัดการการเข้าใช้งาน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_7"
                                                                                            value="membership_personal"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">อนุมัติการสมัครสมาชิกทั่วไป</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_8"
                                                                                            value="membership"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">อนุมัติการสมัครสมาชิกคนประจำเรือ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_9"
                                                                                            value="approve"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">อนุมัติยืนยันการสมัคร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_10"
                                                                                            value="accessPersonal"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">จัดการการเข้าใช้งานบุคคลทั่วไป</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_11"
                                                                                            value="open_employee"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">เปิดการใช้งานผู้ที่ไม่เข้าใช้งานระหว่างกำหนด</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_12"
                                                                                            value="changePasswordUser"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">เปลี่ยนรหัสผ่าน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_13"
                                                                                            value="changeposition"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">แก้ไขตำแหน่งเรือ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_14"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">ลบข้อมูล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_15"
                                                                                            value="view"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">ดูข้อมูล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[admin]action"
                                                                                            id="PGroupPermission_admin_action_16"
                                                                                            value="delete_employee"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[admin][action][]">ลบพนักงาน</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_admin_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_admin_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_admin_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[admin][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_admin_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[admin][active]"
                                                                                            id="PGroupPermission_admin_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_admin_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[admin][active]"
                                                                                            id="PGroupPermission_admin_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_admin_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ป้ายประชาสัมพันธ์ --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ป้ายประชาสัมพันธ์ </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_imgslide_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_imgslide_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[imgslide][action]"><span
                                                                                    id="PGroupPermission_imgslide_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[imgslide]action"
                                                                                            id="PGroupPermission_imgslide_action_0"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[imgslide][action][]">จัดการป้ายประชาสัมพันธ์</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[imgslide]action"
                                                                                            id="PGroupPermission_imgslide_action_1"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[imgslide][action][]">เพิ่มป้ายประชาสัมพันธ์</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[imgslide]action"
                                                                                            id="PGroupPermission_imgslide_action_2"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[imgslide][action][]">แก้ไขป้ายประชาสัมพันธ์</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[imgslide]action"
                                                                                            id="PGroupPermission_imgslide_action_3"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[imgslide][action][]">ลบป้ายประชาสัมพันธ์</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_imgslide_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_imgslide_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_imgslide_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[imgslide][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_imgslide_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[imgslide][active]"
                                                                                            id="PGroupPermission_imgslide_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_imgslide_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[imgslide][active]"
                                                                                            id="PGroupPermission_imgslide_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_imgslide_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ประเภทห้องสมุด --}}
                                                        
                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ประเภทห้องสมุด </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_LibraryType_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_LibraryType_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[LibraryType][action]"><span
                                                                                    id="PGroupPermission_LibraryType_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[ Library Type]action"
                                                                                            id="PGroupPermission_LibraryType_action_0"
                                                                                            value="multidelete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryType][action][]">ลบทั้งหมด</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library Type]action"
                                                                                            id="PGroupPermission_LibraryType_action_1"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryType][action][]">หน้าแรก</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library Type]action"
                                                                                            id="PGroupPermission_LibraryType_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryType][action][]">ลบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library Type]action"
                                                                                            id="PGroupPermission_LibraryType_action_3"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryType][action][]">แก้ไข</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library Type]action"
                                                                                            id="PGroupPermission_LibraryType_action_4"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryType][action][]">เพิ่ม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library Type]action"
                                                                                            id="PGroupPermission_LibraryType_action_5"
                                                                                            value="admin"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryType][action][]">admin</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library Type]action"
                                                                                            id="PGroupPermission_LibraryType_action_6"
                                                                                            value="view"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryType][action][]">ดู</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library Type]action"
                                                                                            id="PGroupPermission_LibraryType_action_7"
                                                                                            value="sequence"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryType][action][]">โยกย้าย</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_LibraryType_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_LibraryType_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_LibraryType_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[LibraryType][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_LibraryType_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[LibraryType][active]"
                                                                                            id="PGroupPermission_LibraryType_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_LibraryType_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[LibraryType][active]"
                                                                                            id="PGroupPermission_LibraryType_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_LibraryType_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ห้องสมุด --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ห้องสมุด </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_LibraryFile_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_LibraryFile_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[LibraryFile][action]"><span
                                                                                    id="PGroupPermission_LibraryFile_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">เพิ่ม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">แก้ไข</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">ลบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_3"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">หน้าแรก</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_4"
                                                                                            value="multidelete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">ลบทั้งหมด</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_5"
                                                                                            value="admin"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">admin</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_6"
                                                                                            value="view"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">ดู</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_7"
                                                                                            value="sequence"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">โยกย้าย</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_8"
                                                                                            value="download"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">รายการดาวน์โหลด</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_9"
                                                                                            value="accept"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">อนุมัติ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_10"
                                                                                            value="reject"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">ปฏิเสธ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Library File]action"
                                                                                            id="PGroupPermission_LibraryFile_action_11"
                                                                                            value="approveall"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[LibraryFile][action][]">อนุมัติทั้งหมด</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_LibraryFile_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_LibraryFile_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_LibraryFile_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[LibraryFile][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_LibraryFile_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[LibraryFile][active]"
                                                                                            id="PGroupPermission_LibraryFile_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_LibraryFile_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[LibraryFile][active]"
                                                                                            id="PGroupPermission_LibraryFile_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_LibraryFile_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบตั้งค่าการแจ้งเตือนบทเรียน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบตั้งค่าการแจ้งเตือนบทเรียน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_coursenotification_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_coursenotification_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[coursenotification][action]"><span
                                                                                    id="PGroupPermission_coursenotification_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[coursenotification]action"
                                                                                            id="PGroupPermission_coursenotification_action_0"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursenotification][action][]">เพิ่มระบบแจ้งเตือนบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursenotification]action"
                                                                                            id="PGroupPermission_coursenotification_action_1"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursenotification][action][]">แก้ไขแจ้งเตือนบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursenotification]action"
                                                                                            id="PGroupPermission_coursenotification_action_2"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursenotification][action][]">ลบแจ้งเตือนบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursenotification]action"
                                                                                            id="PGroupPermission_coursenotification_action_3"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursenotification][action][]">จัดการแจ้งเตือนบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[coursenotification]action"
                                                                                            id="PGroupPermission_coursenotification_action_4"
                                                                                            value="view"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[coursenotification][action][]">ดูรายละเอียดการแจ้งเตือนบทเรียน</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_coursenotification_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_coursenotification_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_coursenotification_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[coursenotification][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_coursenotification_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[coursenotification][active]"
                                                                                            id="PGroupPermission_coursenotification_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_coursenotification_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[coursenotification][active]"
                                                                                            id="PGroupPermission_coursenotification_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_coursenotification_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบพิมพ์ใบประกาศนียบัตร --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบพิมพ์ใบประกาศนียบัตร </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_Passcours_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_Passcours_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[Passcours][action]"><span
                                                                                    id="PGroupPermission_Passcours_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[ Passcours]action"
                                                                                            id="PGroupPermission_Passcours_action_0"
                                                                                            value="PasscoursLog"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Passcours][action][]">รายงานสถิติจำนวนผู้พิมพ์ใบประกาศฯ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Passcours]action"
                                                                                            id="PGroupPermission_Passcours_action_1"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Passcours][action][]">รายงานผู้ผ่านการเรียน</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_Passcours_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_Passcours_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_Passcours_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[Passcours][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_Passcours_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[Passcours][active]"
                                                                                            id="PGroupPermission_Passcours_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_Passcours_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[Passcours][active]"
                                                                                            id="PGroupPermission_Passcours_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_Passcours_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- Log การส่งอีเมล์  --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        Log การส่งอีเมล์ </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_logemail_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_logemail_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[logemail][action]"><span
                                                                                    id="PGroupPermission_logemail_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[logemail]action"
                                                                                            id="PGroupPermission_logemail_action_0"
                                                                                            value="email"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[logemail][action][]">
                                                                                        ดูรายละเอียดการส่งอีเมล์</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_logemail_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_logemail_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_logemail_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[logemail][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_logemail_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[logemail][active]"
                                                                                            id="PGroupPermission_logemail_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_logemail_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[logemail][active]"
                                                                                            id="PGroupPermission_logemail_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_logemail_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบการยืนยันการเข้าเรียนของผู้เรียน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบการยืนยันการเข้าเรียนของผู้เรียน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_Student_photo_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_Student_photo_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[Student_photo][action]"><span
                                                                                    id="PGroupPermission_Student_photo_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[ Student Photo]action"
                                                                                            id="PGroupPermission_Student_photo_action_0"
                                                                                            value="Index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Student_photo][action][]">หน้าแรก</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Student Photo]action"
                                                                                            id="PGroupPermission_Student_photo_action_1"
                                                                                            value="Create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Student_photo][action][]">เพิ่ม</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Student Photo]action"
                                                                                            id="PGroupPermission_Student_photo_action_2"
                                                                                            value="View"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Student_photo][action][]">ดู</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Student Photo]action"
                                                                                            id="PGroupPermission_Student_photo_action_3"
                                                                                            value="Update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Student_photo][action][]">แก้ไข</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Student Photo]action"
                                                                                            id="PGroupPermission_Student_photo_action_4"
                                                                                            value="Delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Student_photo][action][]">ลบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Student Photo]action"
                                                                                            id="PGroupPermission_Student_photo_action_5"
                                                                                            value="Active"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Student_photo][action][]">เปิดใช้งาน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Student Photo]action"
                                                                                            id="PGroupPermission_Student_photo_action_6"
                                                                                            value="CourseModal"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Student_photo][action][]">เลือกหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[ Student Photo]action"
                                                                                            id="PGroupPermission_Student_photo_action_7"
                                                                                            value="SaveCourseModal"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[Student_photo][action][]">บันทึกหลักสูตร</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_Student_photo_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_Student_photo_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_Student_photo_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[Student_photo][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_Student_photo_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[Student_photo][active]"
                                                                                            id="PGroupPermission_Student_photo_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_Student_photo_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[Student_photo][active]"
                                                                                            id="PGroupPermission_Student_photo_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_Student_photo_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบจัดการภาพถ่ายนักเรียน --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบจัดการภาพถ่ายนักเรียน </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_capture_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_capture_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[capture][action]"><span
                                                                                    id="PGroupPermission_capture_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[capture]action"
                                                                                            id="PGroupPermission_capture_action_0"
                                                                                            value="Index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[capture][action][]">จัดการ</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_capture_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_capture_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_capture_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[capture][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_capture_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[capture][active]"
                                                                                            id="PGroupPermission_capture_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_capture_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[capture][active]"
                                                                                            id="PGroupPermission_capture_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_capture_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- Log การใช้งานระบบ  --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        Log การใช้งานระบบ </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_logadmin_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_logadmin_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[logadmin][action]"><span
                                                                                    id="PGroupPermission_logadmin_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[logadmin]action"
                                                                                            id="PGroupPermission_logadmin_action_0"
                                                                                            value="users"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[logadmin][action][]">Log
                                                                                        การใช้งานผู้เรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[logadmin]action"
                                                                                            id="PGroupPermission_logadmin_action_1"
                                                                                            value="index"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[logadmin][action][]">Log
                                                                                        การใช้งานผู้ดูแลระบบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[logadmin]action"
                                                                                            id="PGroupPermission_logadmin_action_2"
                                                                                            value="api"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[logadmin][action][]">Log
                                                                                        การส่งข้อมูล API</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[logadmin]action"
                                                                                            id="PGroupPermission_logadmin_action_3"
                                                                                            value="approve"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[logadmin][action][]">Log
                                                                                        การยืนยันสมัครสมาชิก</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[logadmin]action"
                                                                                            id="PGroupPermission_logadmin_action_4"
                                                                                            value="register"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[logadmin][action][]">Log
                                                                                        การตรวจสอบการสมัครสมาชิก</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[logadmin]action"
                                                                                            id="PGroupPermission_logadmin_action_5"
                                                                                            value="approvePersonal"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[logadmin][action][]">Log
                                                                                        การยืนยันสมัครสมาชิกบุคคลทั่วไป</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_logadmin_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_logadmin_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_logadmin_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[logadmin][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_logadmin_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[logadmin][active]"
                                                                                            id="PGroupPermission_logadmin_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_logadmin_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[logadmin][active]"
                                                                                            id="PGroupPermission_logadmin_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_logadmin_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- ระบบรีพอร์ต --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        ระบบรีพอร์ต </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_report_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_report_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[report][action]"><span
                                                                                    id="PGroupPermission_report_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_0"
                                                                                            value="reportanscaptcha"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานการตอบแคปช่า</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_1"
                                                                                            value="attendprint"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานภาพรวมสถิติจำนวนผู้เข้าเรียนและพิมพ์ใบรับรอง</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_2"
                                                                                            value="status"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานติดตามผู้เรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_3"
                                                                                            value="registercourse"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานสมัครเรียนหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_4"
                                                                                            value="summarytest"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานผลการสอบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_5"
                                                                                            value="posttest"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานผลคะแนนก่อนเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_6"
                                                                                            value="update"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">แก้ไข</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_7"
                                                                                            value="delete"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">ลบ</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_8"
                                                                                            value="create"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">เพิ่มข้อมูล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_9"
                                                                                            value="bycourse"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานผู้เรียนตามรายหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_10"
                                                                                            value="bylesson"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานผู้เรียนตามหัวข้อวิชา</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_11"
                                                                                            value="byuser"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานผู้เรียนรายบุคคล</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_12"
                                                                                            value="beforandafter"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานผลการสอบก่อนเรียนและหลังเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_13"
                                                                                            value="courselearning"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานผู้ใช้งานที่กำลังเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_14"
                                                                                            value="coursepass"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานผ่านการเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_15"
                                                                                            value="testcoursescore"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานการสอบหลักสูตร</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_16"
                                                                                            value="testscore"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงานการสอบบทเรียน</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_17"
                                                                                            value="genpdfbeforeandafter"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงาน
                                                                                        pdf</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_18"
                                                                                            value="ajaxfindgen"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">ค้นหารุ่น</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_19"
                                                                                            value="logreset"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงาน
                                                                                        รีเซต</label>
                                                                                    <label class="checkbox-inline"><input
                                                                                            placeholder="[report]action"
                                                                                            id="PGroupPermission_report_action_20"
                                                                                            value="loadgen"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[report][action][]">รายงาน
                                                                                        รีเซต (โหลดรุ่น)</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_report_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_report_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_report_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[report][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_report_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[report][active]"
                                                                                            id="PGroupPermission_report_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_report_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[report][active]"
                                                                                            id="PGroupPermission_report_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_report_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- TEST CONTROLLER 01  --}}

                                                        {{-- <div class="entry input-group col-xs-12">
                                                            <div class="well bg-white">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-xs-3">Controller</label>
                                                                    <div class="col-xs-9">
                                                                        TEST CONTROLLER 01 </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_TEST_CONTROLLER_0_action">Action</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_TEST_CONTROLLER_0_action"
                                                                                    type="hidden" value=""
                                                                                    name="PGroupPermission[TEST CONTROLLER 0][action]"><span
                                                                                    id="PGroupPermission_TEST_CONTROLLER_0_action"><label
                                                                                        class="checkbox-inline"><input
                                                                                            placeholder="[ Test  Controller 0]action"
                                                                                            id="PGroupPermission_TEST_CONTROLLER_0_action_0"
                                                                                            value="CONTROLLER"
                                                                                            type="checkbox"
                                                                                            name="PGroupPermission[TEST CONTROLLER 0][action][]">CONTROLLER</label></span>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_TEST_CONTROLLER_0_action_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group"><label
                                                                                class="col-sm-3 control-label"
                                                                                for="PGroupPermission_TEST_CONTROLLER_0_active">Active</label>
                                                                            <div class="col-sm-5 col-sm-9"><input
                                                                                    id="ytPGroupPermission_TEST_CONTROLLER_0_active"
                                                                                    type="hidden" value="0"
                                                                                    name="PGroupPermission[TEST CONTROLLER 0][active]">
                                                                                <div
                                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-animate bootstrap-switch-id-PGroupPermission_TEST_CONTROLLER_0_active">
                                                                                    <div
                                                                                        class="bootstrap-switch-container">
                                                                                        <span
                                                                                            class="bootstrap-switch-handle-on bootstrap-switch-primary">ON</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[TEST CONTROLLER 0][active]"
                                                                                            id="PGroupPermission_TEST_CONTROLLER_0_active"
                                                                                            value="1"
                                                                                            type="checkbox"><label
                                                                                            for="PGroupPermission_TEST_CONTROLLER_0_active"
                                                                                            class="bootstrap-switch-label">&nbsp;</label><span
                                                                                            class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                                                            class="form-control"
                                                                                            name="PGroupPermission[TEST CONTROLLER 0][active]"
                                                                                            id="PGroupPermission_TEST_CONTROLLER_0_active"
                                                                                            value="0"
                                                                                            type="checkbox"></div>
                                                                                </div>
                                                                                <div class="help-block error"
                                                                                    id="PGroupPermission_TEST_CONTROLLER_0_active_em_"
                                                                                    style="display:none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                    </div>
                                                </div>
                                                <div class="row buttons">
                                                    <button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>สมัครสมาชิก</button>
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
    </body>
@endsection
        