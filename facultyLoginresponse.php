<?php
session_start();

  

if($_POST){

    $connect=@mysqli_connect("localhost","root","mysql","login_details");

    $fid=$_POST['lid'];
   
$_SESSION["user"]=$fid;

    $psw=$_POST['psw'];
$q="select *from faculty where fid='$fid' ";
$result=mysqli_query($connect,$q);
while($row=mysqli_fetch_array($result))
{
    $password=$row['password'];
  
}

$q2="select path from profilepics where id='$fid'";

$result2=mysqli_query($connect,$q2);
while($row=mysqli_fetch_array($result2))
{
   $img_path=$row['path'];

}
$_SESSION["path"]=$img_path;
$connect1=@mysqli_connect("localhost","root","mysql","facultydetails");
$q1="select *from faculty where fid='$fid'";
$result1=mysqli_query($connect1,$q1);
while($row=mysqli_fetch_array($result1))
{
  $name=$row['name'];
  $fname=$row['fname'];
  $mname=$row['mname'];
  $h_no=$row['h_no'];
  $street=$row['street'];
  $city=$row['city'];
  $state=$row['state'];
  $country=$row['country'];
  $pin=$row['pin'];
}
$_SESSION['Name']=$name;
if($password===$psw)
{
    header("location:facultyDashboard.php");
}
else
{
   header('location:loginfailed.php');
}




}

?>