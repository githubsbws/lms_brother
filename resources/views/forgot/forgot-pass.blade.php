<!DOCTYPE html>
<html lang="en">

{{-- <?php include 'include/head.php'; ?> --}}
@extends('layouts.head')
<body>

    <div class="container">
        <div class="page-section login-page">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-xs-12" align="center">
                                <h1>ลืมรหัสผ่าน</h1>
                            </div>
                            <div class="form">
                                <form class="form-horizontal" action="/lms_brother_docker/lms/app/index.php/user/recovery" method="post">

                                    <!-- <div class="row">
		<p class="hint"></p>
	</div> -->
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label"><label for="UserRecoveryForm_login_or_email">Username หรือ อีเมลล์</label></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Username" name="UserRecoveryForm[login_or_email]" id="UserRecoveryForm_login_or_email" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3" style="padding: 0;">
                                            <input class="btn btn-primary" type="submit" name="yt0" value="รีเซ็ตรหัสผ่าน">
                                        </div>
                                    </div>

                                </form>
                            </div><!-- form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@extends('layouts.footer')
{{-- <?php include 'include/footer.php'; ?> --}}


</html>