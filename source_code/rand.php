<?php
function generateRandomString($length = 10) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
    for ($i = 0; $i < $length; $i++) { 
        $randomString .= $characters[rand(0, strlen($characters) - 1)]; 
    } 
    return $randomString; 
}

$a = generateRandomString(30);
$b = generateRandomString(30);

echo $a;
echo $b;


$servername = 'localhost';
$username = 'test1';
$password = 'abc';

// 创建连接
$conn = new mysqli($servername, $username, $password);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功";



$re = mysqli_select_db($conn, 'employees' );

if(!$re)
{
	echo "wrong".mysql_error();
}
else echo "right";

$sql = "select * from employees where first_name = '".$a."' and last_name ='".$b."' order by birth_date desc limit 30";

echo "</br>". $sql;


$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}

#while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
#{
	#echo $row['first_name']." ".$row['last_name']."</br>";
#	$a = $row['first_name'];
#}


mysqli_close($conn);

?>
