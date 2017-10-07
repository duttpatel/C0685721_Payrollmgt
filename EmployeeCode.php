<?php
include("EmployeeClass.php");
session_start();
//$con=mysqli_connect("localhost","root","","pms") or die ("error");
/*$name="";
$gender="";
$dob="";
$add="";
$city="";
$province="";
$pincode="";
$email="";
$weblink="";
$doj="";
$basic="";*/
//$eid=0;
$edit_state=false;
$e1=new EmployeeClass;
$e1->createDataBase();
$e1->createTable();
if(isset($_POST['save']))
{	
	
$e1->name=$_POST['name'];
$e1->gender=$_POST['gender'];
$e1->dob=$_POST['dob'];
$e1->add=$_POST['add'];
$e1->city=$_POST['City'];
$e1->province=$_POST['province'];
$e1->pincode=$_POST['pincode'];
$e1->email=$_POST['email'];
$e1->weblink=$_POST['weblink'];
$e1->doj=$_POST['doj'];
$e1->basic=$_POST['basic'];
$e1->insertData();
//$query="insert into employee values (null,'$name','$gender','$dob','$add','$city','$province','$pincode','$email','$weblink','$doj','$basic')";
//$result=mysqli_query($con,$query);
$_SESSION['msg']="Employee saved";
//header('location:Employee.php');
}
$result=$e1->selectData();		
if(isset($_POST['update']))
{
		
	$e1->name=$_POST['name'];
	$e1->gender=$_POST['gender'];
	$e1->dob=$_POST['dob'];
	$e1->add=$_POST['add'];
	$e1->city=$_POST['City'];
	$e1->province=$_POST['province'];
	$e1->pincode=$_POST['pincode'];
	$e1->email=$_POST['email'];
	$e1->weblink=$_POST['weblink'];
	$e1->doj=$_POST['doj'];
	$e1->basic=$_POST['basic'];
	$e1->eid=mysql_real_escape_string($_POST['eid']);
	$e1->updateData();
	//mysqli_query($con,"update employee set Name='$name',Gender='$gender',DOB='$dob',Address='$add',City='$city',Province='$province',PostalCode='$pincode',Email='$email',webLink='$weblink',DOJ='$doj',BasicPay='$basic' where EId=$eid");
	$_SESSION['msg']="Employee Updated";
	//header('location:Employee.php');
}
		
if(isset($_GET['del']))
{
	$e1->eid=$_GET['del'];
	$e1->deleteData();
	$_SESSION['msg']="Employee Deleted";
}
?>