<?php
include_once("dbconn.php");
$conn=database_connect();
$uname=$_POST["email"];
$pass=$_POST["pass"];

$selectsql="select * from user where email='".$uname."'";

$qget=mysqli_query($conn,$selectsql);

$err=true;
if(mysqli_num_rows($qget)>0){
	$res=mysqli_fetch_array($qget,MYSQLI_ASSOC);
	$get_email=$res["email"];
	$get_pass=$res["password"];
	$get_name=$res["name"];

	if($get_pass==$pass){
		$err=false;
		$msg="Successful login";

		$j_array=array('email'=>$get_email, 'name'=>$get_name);
	}else{
		$err=true;
		$msg="Password or username may wrong";
	}
}else{
	$err=true;
	$msg="User not registered";
}


if($err){
	$json_out=json_encode(array('error'=>$err,'message'=>$msg));	
}else{
	$json_out=json_encode(array('error'=>$err,'message'=>$msg,'data'=>$j_array));
}
echo $json_out;
?>