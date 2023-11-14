<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank</title>
    {{-- CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- css -->
    @vite('resources/css/app.css')
</head>

<body>

    <nav class="navbar">
        <div class="container-fluid">
            <H2 class="" style="color:#276678">Banking</H2>
            <button class="btn" id="insertt" onclick="showPopup()"
                style="background-color: #276678; color: #F6F1F1;">เพิ่มข้อมูล</button>
        </div>
    </nav>

    <div class="container py-3">

        @if (count($banks) > 0)
            <h3>รายชื่อเจ้าของบัญชี</h3><br>
            <div class="">
                @foreach ($banks as $item)
                    <div class="">
                        ชื่อเจ้าของบัญชี : {{ $item->bank_user }}<br>
                        ชื่อธนาคาร : {{ $item->bank_name }}<br>
                        สาขา : {{ $item->bank_branch }}<br>
                        เลขบัญชี : {{ $item->bank_number }}<br>
                        รูป<br>
                        <a href="{{ route('edit', $item->bank_id) }}" name="edit_in" id="edit_in" class="btn"
                            style="background-color: #1687A7; color: #F6F1F1;">แก้ไข</a>
                        <a href="{{ route('delete', $item->bank_id) }}" name="de_in" id="de_in" class="btn"
                            style="background-color: #ce0000; color: #F6F1F1;"
                            onclick="return confirm('คุณต้องการลบชื่อ {{ $item->bank_user }} หรือไม่ ?')">ลบ</a>
                    </div><br>
                @endforeach
            </div><br><br>
            {{ $banks->links() }}
        @else
            <h2>ไม่พบรายชื่อ</h2>
        @endif
    </div>
    <div id="popup" style="display: none;">
        <h3>เพิ่มข้อมูล</h3><br>
        <form id="popupForm" method="POST" action="insert" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="group">
                    <input type="text" name="bank_user" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>ชื่อเจ้าของบัญชี</label>
                </div>
                @error('bank_user')
                    <div class="my-2">
                        <span class="text text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="group">
                    <input type="text" name="bank_name" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>ชื่อธนาคาร</label>
                </div>
                @error('bank_name')
                    <div class="my-2">
                        <span class="text text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="group">
                    <input type="text" name="bank_branch" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>สาขา</label>
                </div>
                @error('bank_branch')
                    <div class="my-2">
                        <span class="text text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="group">
                    <input type="text" name="bank_number" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>เลขบัญชี</label>
                </div>
                @error('bank_number')
                    <div class="my-2">
                        <span class="text text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="group">
                    <input type="file" name="bank_picture" id="bank_picture" required>
                    <label>รูป</label>
                </div>

                @error('bank_picture')
                    <div class="my-2">
                        <span class="text text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <br>
                <button type="submit" class="btn" >Save</button>
                <button class="btn" onclick="hidePopup()">Close</button>
            </div>
        </form>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function showPopup() {
        document.getElementById('popup').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('popup').style.display = 'none';
    }

    // function saveData() {
    //     $.ajax({
    //         url: 'insert',
    //         method: 'POST',
    //         data: $('#popupForm').serialize(),
    //         success: function(response) {
    //             console.log(response);
    //             hidePopup();
    //         },
    //         error: function(error) {
    //             console.error(error);
    //         }
    //     });
    // }
</script>

</html>
