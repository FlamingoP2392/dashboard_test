<?php
$servername = "localhost";
$username = "root";
$password = "16112004";
$dbname = "db_library";

$m_user = $_GET["m_user"];
$m_name = $_GET["m_name"];
$m_pass = $_GET["m_pass"];
$m_phone = $_GET["m_phone"];
$m_id = $_GET["m_id"];

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);
// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
        <title>Update</title>
    </head>
    <body>
        <h1>การจัดการข้อมูลสมาชิก</h1>
    </body>
</html>

<?php
$sql = "UPDATE tb_member SET
m_user = '$m_user',
m_name = '$m_name',
m_pass = '$m_pass',
m_phone = '$m_phone'
WHERE m_id = '$m_id'";

if ($conn -> query($sql) === TRUE) {
    echo "<h3>Record updated successfully<h3>".'<br>';
    echo "<a href='dashboard.php'><button>กลับ</button></a>";
} else {
    echo "Error updating record: " . $conn->error;
    
}
    
$conn->close();

?>
