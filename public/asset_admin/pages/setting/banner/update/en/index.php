<!DOCTYPE html>
<html lang="en">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/header.php';  ?>
<style>


</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/navbar.php'; ?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <h4 class="m-0">เเก้ไขป้ายประชาสัมพันธ์</h4>
                    <p class="m-0 text-black-50">เเก้ไขข้อมูลที่ต้องการ</p>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="d-md-flex">
                        <div class="col mx-auto col-md-8 col-lg-6">
                            <div class="card m-0">
                                <div class="card-header bg-primary">
                                    เเก้ไขป้ายประชาสัมพันธ์
                                </div>
                                <div class="card-body">
                                    <p> ค่าที่มี <span class="text-danger"> * </span> จำเป็นต้องใส่ให้ครบ </p>
                                    <div class="form-group">
                                        <label for="namePupUp">ชื่อหัวข้อ ภาษาอังกฤษ <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control" id="namePupUp" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="detailPopUp">รายละเอียดย่อ ภาษาอังกฤษ </label>
                                        <textarea class="form-control" id="detailPopUp" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="detailPopUp"> ชื่อลิ้งค์ ภาษาอังกฤษ</label>
                                        <div>
                                            <input type="checkbox" checked data-toggle="toggle">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="detailPopUp"> ประเภทเเกลลอรี่ ภาษาอังกฤษ</label>
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option selected>-- เลือก --</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0">
                                        <p class="mb-1 font-weight-bold">รูปภาพ ภาษาอังกฤษ</p>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="images">
                                            <label class="custom-file-label" for="images">เลือกรูป</label>
                                            <p class="mt-4"><span class="text-danger"> * รูปภาพควรมีขนาด 1985X671 Pixel </span></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary mt-3"><i class="fas fa-save mr-1"></i>บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/footer.php' ?>
    </div>
</body>

</html>