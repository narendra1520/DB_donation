<?php
include_once("dbconn.php");
$conn=database_connect();
$uname=$_POST["uname"];

	$selectsql="select * from vaa_prof where emailID='".$uname."'";

	$qget=mysqli_query($conn,$selectsql);

	$res=mysqli_fetch_array($qget,MYSQLI_ASSOC);

$id=$res["id"];
$enrollNo=$res["enrollNo"];
$firstName=$res["firstName"];
$middleName=$res["middleName"];
$lastName=$res["lastName"];
$gender=$res["gender"];
$dob=$res["dob"];
$email=$res["emailID"];
$mobile=$res["mobile"];
$address=$res["address"];
$city=$res["city"];
$district=$res["district"];
$state=$res["state"];
$postalcode=$res["postalcode"];
$branch=$res["branch"];
$pic=$res["pic"];
$intro=$res["introduction"];

$j_array=array('id'=>$id,'enroll'=>$enrollNo,'fname'=>$firstName,'mname'=>$middleName,'lname'=>$lastName,'gender'=>$gender,'dob'=>$dob,'email'=>$email,'mob'=>$mobile,'address'=>$address,'city'=>$city,'district'=>$district,'state'=>$state,'pincode'=>$postalcode,'branch'=>$branch,'pic'=>$pic,'intro'=>$intro);

$err=mysqli_error($conn);
$json_out=json_encode(array('error'=>false,'message'=>"Data Fetched",'data'=>$j_array));
header("Content-Type:application/json");
echo $json_out;
?>