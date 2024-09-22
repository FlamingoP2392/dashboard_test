<?php
$servername = "localhost";
$username = "root";
$password = "16112004";
$dbname = "db_library";

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);
// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่งข้อมูลค้นหามาหรือไม่
$search_keyword = "";
if (isset($_POST['search'])) {
    $search_keyword = $_POST['search'];
}

// สร้างคำสั่ง SQL สำหรับการค้นหา
$sql = "SELECT * FROM tb_member WHERE m_user LIKE '%$search_keyword%' OR m_name LIKE '%$search_keyword%' OR m_phone LIKE '%$search_keyword%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Library Management</title>
</head>

<body>
    <div class="menu">
        <ul>
            <li><a href="form.html">เพิ่มข้อมูล</a></li>
            <li><a href="dashboard.php">จัดการข้อมูล</a></li>
        </ul>
    </div>
    <h1>การจัดการข้อมูลสมาชิก</h1>
    <div class="search-container">
        <form id="search" method="POST">
            <input id="search" type="search" name="search" value="<?php echo $search_keyword; ?>" placeholder="">
            <button type="submit">ค้นหา</button>
        </form>
    </div>

    <?php
    if ($result->num_rows > 0) {
        $row_number = 1;
        // เริ่มต้นแท็ก <table>
        echo "<table>";

        // แสดงหัวข้อคอลัมน์
        echo "<tr>";
        echo "<th>ลำดับ</th>";
        echo "<th>ชื่อผู้ใช้</th>";
        echo "<th>ชื่อ - สกุล</th>";
        echo "<th>เบอร์โทรศัพท์</th>";
        echo "<th>แก้ไข</th>";
        echo "<th>ลบ</th>";
        echo "</tr>";

        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $m_id = $row["m_id"];
            echo "<tr>";
            echo "<td>" . $row_number . "</td>";
            echo "<td>" . $row["m_user"] . "</td>";
            echo "<td>" . $row["m_name"] . "</td>";
            echo "<td>" . $row["m_phone"] . "</td>";
            echo "<td><a href='update.php?m_id=$m_id'><button>แก้ไข</button></a></td>";
            echo "<td><a href='delete.php?m_id=$m_id'><button>ลบ</button></a></td>";
            echo "</tr>";

            $row_number++;
        }
        echo "</table>";
    } else {
        echo "ไม่พบผลลัพธ์สำหรับคำค้นหา: '$search_keyword'";
    }

    $conn->close();
    ?>
</body>

</html>