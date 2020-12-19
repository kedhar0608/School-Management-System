<?php
  echo "<script type='module' src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js'></script>";
   echo "<script nomodule src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js'> </script>";
  echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css'/>";

if($_POST){

    $connect=@mysqli_connect("localhost","root","","staffdetails");
   
$sid=$_POST['sid'];
$name=$_POST['name'];
$fname=$_POST['F_name'];
$mname=$_POST['M_name'];
$dob=$_POST['dob'];
$aadhar=$_POST['aadhar'];
$passport=$_POST['passport'];
$gender=$_POST['gen'];
$h_no=$_POST['H_no'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$pin=$_POST['pin'];

echo "$dob ,$sid,$name,$fname,$mname,$dob,$aadhar,$passport,$gender,$h_no,$street,$city,$state,$country,$pin";

$q="INSERT INTO staff values( '$sid','$name','$fname','$mname','$dob','$aadhar','$passport','$gender','$h_no','$street','$city','$state','$country','$pin')";

$result=mysqli_query($connect,$q);
if($result)
{
  echo "inserted";
}
else
{
  echo " not inserted";
}


}

?>