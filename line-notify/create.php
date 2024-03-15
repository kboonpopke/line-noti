<?php 
session_start();
?>
<?php   
    require 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Notify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Warehouse:รายการเบิกสินค้า</h1>

        <hr>

        <form  action="sendinfo.php" method="post"><?php
                if(isset($_SESSION['success'])){
            ?>
            <div class="alert alert-success" role="alert">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
            <?php } ?>


            <div class="mb-3">
                <label class="form-label">ชื่อผู้เบิก</label>
                <input type="text" class="form-control" name="name" aria-describedby="name">
            </div>
            <div class="mb-3">
                <label class="form-label">แผนก</label>
                <input type="text" class="form-control" name="department" aria-describedby="department">
            </div>
            <div class="mb-3">
                <label class="form-label">รายการเบิก</label>
                <input type="text" class="form-control" name="goods" aria-describedby="goods">
            </div>
            <div class="mb-3">
                <label class="form-label">จำนวน</label>
                <input type="text" class="form-control" name="amount" aria-describedby="amount">
            </div>

            <div class="row g-1">
                <label class="form-label">วันที่และเวลาที่ทำรายการ</label>
                <div class="col">
                    <input type="date" class="form-control" name="date2" aria-describedby="date2">
                </div>
                <div class="col">
                    <input type="time" class="form-control" name="time2" aria-describedby="time2">
                </div>
            </div>

            <div class="row g-1">
                <label class="form-label">วันที่และเวลาที่ต้องการสินค้า/ของ</label>
                <div class="col">
                    <input type="date" class="form-control" name="date1" aria-describedby="date1">
                </div>
                <div class="col">
                    <input type="time" class="form-control" name="time1" aria-describedby="time1">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">หมายเหตุ</label>
                <input type="text" class="form-control" name="note" aria-describedby="note">
            </div>
            <div class="mb-3">
                <button type="submit" name="save_line" class="btn btn-primary">Save</button>
            </div>
        </form>
        
    </div>

    <script>
    document.getElementById('submitForm').addEventListener('submit', function(event) {
        // ส่งข้อมูลไปยัง coded.php
        fetch('code.php', {
            method: 'POST',
            body: new FormData(this)
        });

        // ส่งข้อมูลไปยัง sendinfo.php
        fetch('sendinfo.php', {
            method: 'POST',
            body: new FormData(this)
        });

        // ยกเลิกการส่งฟอร์มเพื่อไม่ให้เกิดการโหลดหน้าใหม่หลังจากส่งข้อมูล
        event.preventDefault();
    });
    </script>
</body>

</html>