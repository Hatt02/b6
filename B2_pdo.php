<?php
 $db_type ='mysql';
 $db_host ="localhost";
 $user_name = "root";
 $user_pass ="";
 $db_name ="Bai2";

 //connect
$conn = new PDO("$db_type:host=$db_host;dbname=$db_name",$user_name,$user_pass);
if ($conn) {
    echo "Connected to the $db_host successfully!";
}
//creating new tables
$state = "CREATE table giaodich_pdo(
    STT int auto_increment PRIMARY KEY ,
    MaGD varchar(10) not null unique,
    NgayGD datetime,
    Loai varchar(100) not null,
    SoTien decimal,
    MoTa varchar(1000)
    )";
if(!$conn->exec($state))
    die ("Create failed" .mysqli_error());
 else {
    echo "Create success";
 }

 //insert
 $data = [
    [
         'MaGD' => 'G01',
         'NgayGD' => '2023-07-05',
         'Loai' => 'Rút tiền',
         'SoTien' => '500',
         'MoTa' => 'Rút tiền ATM'
    ],
    [
        'MaGD' => 'G02',
        'NgayGD' => '2023-7-06',
        'Loai' => 'Rút Tiền',
        'SoTien' => '1200',
        'MoTa' => 'Rút tiền ATM'
   ],
   [
        'MaGD' => 'G03',
        'NgayGD' => '2023-07-07',
        'Loai' => 'Rút Tiền',
        'SoTien' => '1500',
        'MoTa' => 'Rút tiền ATM'
   ],
   [
        'MaGD' => 'G04',
        'NgayGD' => '2023-07-08',
        'Loai' => 'Rút Tiền',
        'SoTien' => '1400',
        'MoTa' => 'Rút tiền ATM'
   ],
   [
        'MaGD' => 'G05',
        'NgayGD' => '2023-07-09',
        'Loai' => 'Rút Tiền',
        'SoTien' => '2000',
        'MoTa' => 'Rút tiền ATM'
   ]
];

$stmt = $conn->prepare("INSERT INTO giaodich_pdo(MaGD,NgayGD,Loai,SoTien,MoTa) values (:MaGD,:NgayGD,:Loai,:SoTien,:MoTa)");

try{
    foreach($data as $row) {
        $stmt->execute($row); 
    }
    echo "Add success";
}
catch (Exception $e) 
{
    echo "Add failed: " . $e->getMessage();
}

//Update

$stmt = $conn->prepare("UPDATE giaodich_pdo SET SoTien=:SoTien  WHERE STT=:STT");
$data = [
         'SoTien' => '1000',
         'STT' => '3'
];
$result=$stmt-> execute($data);
if (!$result) {
    die("update failed: " . mysqli_error()); 
     
} else {
    echo "update success";
}

//Delete
$stmt = $conn->prepare("DELETE from giaodich_pdo WHERE STT=:STT");
$data = [
         'Stt' => '5',
];
$result=$stmt-> execute($data);
    
if (!$result) {
    die("Delete failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Delete success";
}

?>