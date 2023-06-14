<?php
 $db_server_name = "localhost";
 $db_user_name ="root";
 $db_password ="";
 $db_name = "Bai2"

 $dbh = mysqli_connect($db_server_name,$db_user_name,$db_password);
 if (!$dbh)     
 die("Unable to connect to MySQL: " . mysqli_error());
    
 if (!mysqli_select_db($dbh,'Bai2'))     
 die("Unable to select database: " . mysqli_error());

 //create table
 $sql_stmt = "CREATE TABLE giaodich
(
    STT int auto_increment PRIMARY KEY,
    MaGD varchar(10) not null, 
    NgayGD datetime,
    Loai varchar (100),
    SoTien decimal,
    MoTa varchar (1000)
);";
$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
    
if (!$result) {
    die("Create failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Create success";
}

//insert
$sql_stmt = "INSERT INTO giaodich(MaGD, NgayGD, Loai, SoTien,MoTa)
values ('G01','2023-07-05','Rút tiền','500','Rút tiền ATM'),
('G02','2023-07-06','Rút tiền','1200','Rút tiền ATM'),
('G03','2023-07-07','Rút tiền','1500','Rút tiền ATM'),
('G04','2023-07-08','Rút tiền','1400','Rút tiền ATM'),
('G05','2023-07-09','Rút tiền','2000','Rút tiền ATM'),
";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
die("Adding record failed: " . mysqli_error()); 
// Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
echo "Poseidon has been successfully added to your list";
}

//update
$sql_stmt = "UPDATE giaodich set SoTien = 1000 where STT = ' 3'";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
die("Adding record failed: " . mysqli_error()); 
// Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
echo "Update success";
}

//delete
$sql_stmt = "DELETE from giaodich where STT = '5'";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
die("Delete failed: " . mysqli_error()); 
// Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
echo "Delete success";
}

?>
