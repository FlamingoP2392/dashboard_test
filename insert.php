<?php
$m_user = $_GET["m_user"];
$m_pass = $_GET["m_pass"];
$m_name = $_GET["m_name"];
$m_phone = $_GET["m_phone"];

$servername = "localhost";
$username = "root";
$password = "16112004";
$dbname = "db_library";

//เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);
//ตรวจสอบการเชื่อมต่อ
if($conn -> connect_error) {
    die("Connection failed: " .$conn -> connect_error);
}
$sql = "INSERT INTO tb_member (m_id, m_user, m_pass, m_name, m_phone) VALUES ('', '$m_user', '$m_pass', '$m_name', '$m_phone')";

if($conn -> query($sql) === TRUE) {
    $last_id = $conn -> insert_id;
    echo "New record created successfully. Last inserted ID is: $last_id";
}
else{
    echo "Error :". $sql . "<br>" . $conn -> error;
}
$conn -> close();
?>