<?php
 $db_type ='mysql';
 $db_host ="localhost";
 $user_name = "root";
 $user_pass ="";
 $db_name ="Bai1";

 //connect
$conn = new PDO("$db_type:host=$db_host;dbname=$db_name",$user_name,$user_pass);
if ($conn) {
    echo "Connected to the $db_host successfully!";
}
//creating new tables
$state = "CREATE table SV_PDO(
    MaSV varchar(10) not null PRIMARY KEY,
    HoTen varchar(50) not null,
    NgaySinh datetime,
    Lop varchar(10),
    DTB float
    )";
if(!$conn->exec($state))
    die ("Create failed" .mysqli_error());
 else {
    echo "Create success";
 }

 //insert

 $data = [
    [
         'MaSV' => 'SV001',
         'HoTen' => 'Nguyen Van An',
         'NgaySinh' => '2002-06-01',
         'Lop' => 'A1',
         'DTB' => '8.1'
    ],

    [
        'MaSV' => 'SV002',
        'HoTen' => 'Tran Van Binh',
        'NgaySinh' => '2002-01-01',
        'Lop' => 'A1',
        'DTB' => '7.9'
   ],

   [
    'MaSV' => 'SV003',
    'HoTen' => 'Le Van Duc',
    'NgaySinh' => '2002-12-11',
    'Lop' => 'A1',
    'DTB' => '8.4'
   ],

   [
    'MaSV' => 'SV004',
    'HoTen' => 'Nguyen Van Dung',
    'NgaySinh' => '2002-05-07',
    'Lop' => 'A2',
    'DTB' => '7.5'
   ],
   
   [
    'MaSV' => 'SV005',
    'HoTen' => 'Tran Van Bao',
    'NgaySinh' => '2002-01-10',
    'Lop' => 'A2',
    'DTB' => '9.2'
   ]
];

$stmt = $conn->prepare("INSERT INTO SV_PDO (`MaSV`,`HoTen`,`NgaySinh`,`Lop`,`DTB`) values (:MaSV,:HoTen,:NgaySinh,:Lop,:DTB)");

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

$stmt = $conn->prepare("UPDATE SV_PDO SET DTB=:DTB  WHERE MaSV=:MaSV");
$data = [
         'MaSV' => 'SV001',
         'DTB' => '8.5'
];
$result=$stmt-> execute($data);
if (!$result) {
    die("update failed: " . mysqli_error()); 
     
} else {
    echo "update success";
}

//Delete 

$stmt = $conn->prepare("DELETE from SV_PDO WHERE MaSV=:MaSV");
$data = [
         'MaSV' => 'SV003',
];
$result=$stmt-> execute($data);
    
if (!$result) {
    die("delete failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "delete success";
}

?>