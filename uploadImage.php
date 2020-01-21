<?php
include_once("dbconn.php");
$conn=database_connect();

$updpath='/profile/';
$id=$_POST['id'];
$file=$_FILES['image']['tmp_name'];
$fileinfo=pathinfo($_FILES['image']['name']);
$ext=$fileinfo['extension'];

$filename=round(microtime(true)*100).'.'.$ext;
$host='https://'.$_SERVER['SERVER_NAME'];
$filedest=dirname(__FILE__).$updpath.$filename;
$fileurl=$host.'/android'.$updpath.$filename;

	move_uploaded_file($file,$filedest);
	$strq="UPDATE vaa_prof SET pic='$fileurl' WHERE id=$id";
	$imgquery=mysqli_query($conn,$strq);
    
    if($imgquery>0){
        $err=false;
        $msg=$fileurl;
	}
	else{
        $msg="Failed!";
        $err=true;
    }
    
$json_out=json_encode(array('error'=>$err,'message'=>$msg));
echo $json_out;
?>