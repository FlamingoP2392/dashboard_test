<?php
$servername = "localhost";
$username = "root";
$password = "16112004";
$dbname = "db_library";
$m_id = $_GET["m_id"];

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);
// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_member WHERE m_id=$m_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $m_user = $row["m_user"];
        $m_name = $row["m_name"];
        $m_pass = $row["m_pass"];
        $m_phone = $row["m_phone"];
    }
} else {
    echo "0 results";
}

$conn->close();
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
        <h1>อัพเดต / แก้ไขข้อมูล</h1>
        <form action="updatecheck.php" method="get">
            <p>ชื่อผู้ใช้<br><input type="text" name="m_user" value="<?php echo $m_user; ?>"><br></p>
            <p>ชื่อ-สกุล<br><input type="text" name="m_name" value="<?php echo $m_name; ?>"><br></p>
            <p>รหัสผ่าน<br><input type="password" name="m_pass" value="<?php echo $m_pass; ?>"><br></p>
            <p>เบอร์โทรศัพท์<br><input type="text" name="m_phone" value="<?php echo $m_phone; ?>"><br></p>
            <input type="hidden" name="m_id" value="<?php echo $m_id;?>">
            <button id="f" type="submit">แก้ไขข้อมูล</button>
        </form>
</body>

</html>