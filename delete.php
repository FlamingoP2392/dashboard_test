<?php
$m_id = $_GET ["m_id"];
$servername = "localhost";
$username = "root";
$password = "16112004";
$dbname = "db_library";

//เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
}
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
        <title>Delete</title>
    </head>
    <body>
        <h1>ลบข้อมูลสมาชิก</h1>
    </body>
</html>

<?php
//sql ลบข้อมูล
$sql = "DELETE FROM tb_member WHERE m_id = '$m_id'";

    if($conn -> query($sql)===TRUE){
        echo "ลบข้อมูลเสร็จสิ้น" . "<a href='dashboard.php'<br><button>กลับ</button>";
    }
    else{
        echo "ไม่สามารถลบข้อมูลได้" . $conn->error ;
    }
?>