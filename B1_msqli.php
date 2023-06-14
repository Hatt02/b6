<?php
 $db_server_name = "localhost";
 $db_user_name ="root";
 $db_password ="";
 $db_name = "Bai1"

 $dbh = mysqli_connect($db_server_name,$db_user_name,$db_password);
 if (!$dbh)     
 die("Unable to connect to MySQL: " . mysqli_error());
    
 if (!mysqli_select_db($dbh,'Bai1'))     
 die("Unable to select database: " . mysqli_error());

 //create table
 $sql_stmt = "CREATE table sinhvien(
    MaSV varchar(10) not null PRIMARY KEY,
    HoTen varchar(50) not null,
    NgaySinh datetime,
    Lop varchar(10),
    DTB float
    );";
$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
    
if (!$result) {
    die("Create failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Create success";
}

 //insert
 $sql_stmt = "INSERT INTO sinhvien
                 values ('SV001','Nguyen Van An','2002-06-01','A1','8.1'),
                 ('SV002','Tran Van Binh','2000-01-01','A1','7.9'),
                 ('SV003','Le Van Duc','2000-12-11','A1','8.4'),
                 ('SV004','Nguyen Van Dung','2000-05-07','A2','7.5'),
                 ('SV005','Tran Van Bao','2000-01-10','A2','9.2')"; 

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
    
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Poseidon has been successfully added to your contacts list";
}

//update
$sql_stmt = "UPDATE sinhvien set DTB = 8.5 where MaSV = 'SV001'";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
    
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Update success";
}

//delete
$sql_stmt = "DELETE from sinhvien where MaSV = 'SV003'";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
    
if (!$result) {
    die("Delete failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Delete success";
}

// create table
$sql_stmt = "CREATE TABLE giaodich
(
    MaGD varchar(10) not null PRIMARY KEY,
    NgayGD datetime,
    Loai varchar (100) not null,
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
?>