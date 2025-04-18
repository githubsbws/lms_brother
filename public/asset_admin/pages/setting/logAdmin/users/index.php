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
                    <h4 class="m-0">ประวัติการใช้งานผู้เรียน</h4>
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
                                        <th>ลำดับ</th>
                                        <th>ชื่อ - นามสกุล</th>
                                        <th>ฟังก์ชั่นการใช้งาน</th>
                                        <th>รายละเอียด</th>
                                        <th>วันเเละเวลา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>CHANON PONGCHAIPRASIT</td>
                                        <td>ระบบข่าวประกาศ</td>
                                        <td>รายละเอียด</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>THANYAPORN NUCHPRAMOOL</td>
                                        <td>ระบบข่าวประกาศ</td>
                                        <td>รายละเอียด</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>THANYAPORN NUCHPRAMOOL</td>
                                        <td>ระบบข่าวประกาศ</td>
                                        <td>รายละเอียด</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>THANYAPORN NUCHPRAMOOL</td>
                                        <td>เข้าสู่ระบบ</td>
                                        <td>หน้าหลัก</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>THANYAPORN NUCHPRAMOOL</td>
                                        <td>หลักสูตร</td>
                                        <td>รายละเอียด</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>THANYAPORN NUCHPRAMOOL</td>
                                        <td>หลักสูตร</td>
                                        <td>รายละเอียด</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>CHANON PONGCHAIPRASIT</td>
                                        <td>หลักสูตร</td>
                                        <td>รายละเอียด</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>8</td>
                                        <td>CHANON PONGCHAIPRASIT</td>
                                        <td>ระบบข่าวประกาศ</td>
                                        <td>รายละเอียด</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>9</td>
                                        <td>CHANON PONGCHAIPRASIT</td>
                                        <td>หลักสูตร</td>
                                        <td>หน้าหลัก</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>10</td>
                                        <td>CHANON PONGCHAIPRASIT</td>
                                        <td>หลักสูตร</td>
                                        <td>หน้าหลัก</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>11</td>
                                        <td>PREEDA KATEKAEW</td>
                                        <td>เข้าสู่ระบบ</td>
                                        <td>หน้าหลัก</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>12</td>
                                        <td>PREEDA KATEKAEW</td>
                                        <td>เข้าสู่ระบบ</td>
                                        <td>หน้าหลัก</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                    <tr>
                                        <td>13</td>
                                        <td>PREEDA KATEKAEW</td>
                                        <td>เข้าสู่ระบบ</td>
                                        <td>หน้าหลัก</td>
                                        <td>2024-09-03 11:48:56</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Demo-LMS-New/admin/component/footer.php' ?>
    </div>
</body>

</html>