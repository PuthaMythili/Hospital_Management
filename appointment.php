<?php
if(isset($_POST['submit']))
    print_r($_FILES['file']);
$fileName=$_FILES['file']['name'];
$fileType=$_FILES['file']['type'];
$fileSize=$_FILES['file']['size'];
$fileTmpName=$_FILES['file']['tmp_name'];
$fileError=$_FILES['file']['error'];
$fileExt=explode('.',$fileName);
$fileActualExtension=strtolower(end($fileExt));
$allowed=array("jpeg","jpg","png");
if(in_array($fileActualExtension,$allowed))
	echo "allowed only photos";
    if($fileError==0)
        if($fileSize<100000)
		echo "your file is too large";
            if(move_uploaded_file($fileTmpName,"upload/".$fileName))
                echo "success";
session_start();
$_SESSION['name']=$_POST['name'];
$_SESSION['age']=$_POST['age'];
$name=$_SESSION['name'];
$age=$_SESSION['age'];
$_SEESION['gender']=$_POST['gender'];
$gender=$_SEESION['gender'];
$_SESSION['mobile']=$_POST['mobile'];
$mobile=$_SESSION['mobile'];
$_SESSION['address']=$_POST['address'];
$address=$_SESSION['address'];
$_SESSION['date']=$_POST['date'];
$date=$_SESSION['date'];
$_SESSION['time']=$_POST['time'];
$time=$_SESSION['time'];
echo "<br/><h1 align='center' style='background-color:skyblue'>YOUR DEATILS:<br/><br/><br/></h1><h3 align='center' style='background-color:pink'>Name: ".$name."<br/><br/> Age:".$age."<br/> <br/>Gender:".$gender."<br/><br/>Mobile number: ".$mobile."<br/><br/>Address: ".$address."<br/> <br/>Appointment Date:".$date."<br/><br/>Appointment Time:".$time." </h3><br/><h2 align='center' style='background-color:lightgreen'><br/>THANK YOU FOR FILLING!</h2>";

$conn=mysqli_connect("localhost","root","");
$r1=mysqli_select_db($conn,'mythrihospital');
$q3="insert into patient values('$name',$age,'$gender',$mobile,'$address');";
$r3=mysqli_query($conn,$q3);
$q4="select * from patient order by gender ;";
$r4=mysqli_query($conn,$q4);
$r5=mysqli_num_rows($r4);

mysqli_close($conn);
?>
