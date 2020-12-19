<?php
  echo "<script type='module' src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js'></script>";
   echo "<script nomodule src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js'> </script>";
  echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css'/>";

if($_POST){

    $connect=@mysqli_connect("localhost","root","mysql","student_details");
    echo "<ion-app>";
echo "<ion-header ><ion-toolbar color='secondary' position='floating' class='ion-text-center'><ion-title>Student Details<ion-title></ion-toolbar></ion-header>";

echo "<ion-content>";

$admin=$_POST['admin'];
$q="select *from student where admin_no='$admin'";
$result=mysqli_query($connect,$q);



while($row=mysqli_fetch_array($result))
{

    echo "<ion-card>";
    echo "<ion-card-content>";
    echo "<ion-item color='dark'>"."<ion-label>Admission Number</ion-label>".$row['admin_no']."</ion-item>";
echo "<ion-item>"."<ion-label>Name</ion-label>".$row['name']."</ion-item>";
echo "<ion-item color='dark'>"."<ion-label>Father's Name</ion-label>".$row['fname']."</ion-item>";
echo "<ion-item>"."<ion-label>Mother's Name:</ion-label>".$row['mname']."</ion-item>";
echo "<ion-item color='dark'>"."<ion-label>DOB</ion-label>".$row['dob']."</ion-item>";
echo "<ion-item>"."<ion-label>Aadhar number</ion-label>".$row['aadhar']."</ion-item>";
echo "<ion-item color='dark'>"."<ion-label>Passport number</ion-label>".$row['passport']."</ion-item>";
echo "<ion-item>"."<ion-label>Gender</ion-label>".$row['gender']."</ion-item>";
echo "<ion-item color='dark'>"."<ion-label>House No</ion-label>".$row['h_no']."</ion-item>";
echo "<ion-item>"."<ion-label>Street</ion-label>".$row['street']."</ion-item>";
echo "<ion-item color='dark'>"."<ion-label>City</ion-label>".$row['city']."</ion-item>";
echo "<ion-item>"."<ion-label>State</ion-label>".$row['state']."</ion-item>";
echo "<ion-item color='dark'>"."<ion-label>Country</ion-label>".$row['country']."</ion-item>";
echo "<ion-item>"."<ion-label>PIN</ion-label>".$row['pin']."</ion-item>";
echo "</ion-card-content>";
echo "</ion-card>";


}

echo "</ion-content>";
echo "</ion-app>";






}

?>