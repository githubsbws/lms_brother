<!DOCTYPE html>
<html lang="en">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/header.php';  ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/navbar.php'; ?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <h4 class="m-0">จัดการเงื่อนไขการใช้งาน</h4>
                    <p class="m-0 text-black-50">เลือกรายการที่ต้องการจัดการ</p>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="card m-0">
                        <div class="card-body">
                            <table id="settingTable" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>หัวข้อเงื่อนไข (ภาษาอังกฤษ)</th>
                                        <th class="w-25">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Terms Title & Terms Detail</td>
                                        <td>
                                            <a href="en">
                                                <button class="btn btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                    แก้ไข EN
                                                </button>
                                            </a>
                                            <a href="th">
                                                <button class="btn btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                    แก้ไข TH
                                                </button>
                                            </a>
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/footer.php' ?>
        
    </div>
    <script>
        $(document).ready(function() {
            $('#settingTable').DataTable({
                responsive: true,
                scrollX: true,
                language: {
                    url: '/includes/languageDataTable.json',
                }
            });
        });
    </script>
</body>
</html>