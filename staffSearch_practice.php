<?php
  echo "<script type='module' src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js'></script>";
   echo "<script nomodule src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js'> </script>";
  echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css'/>";

if($_POST){

    $connect=@mysqli_connect("localhost","root","","staffdetails");
    echo "<ion-app>";
echo "<ion-header ><ion-toolbar color='secondary' position='floating' class='ion-text-center'><ion-title>Staff Details<ion-title></ion-toolbar></ion-header>";

echo "<ion-content>";

$sid=$_POST['sid'];
$q="select *from staff where sid='$sid'";
$result=mysqli_query($connect,$q);

echo "<form action='lab_eva_03.php' method='post'>";
while($row=mysqli_fetch_array($result))
{

    echo "<ion-card>";
    echo "<ion-card-content>";
    echo "<ion-label>".$row['sid']."</ion-label>";
echo "<ion-label  >".$row['name']."</ion-label>";
echo "<ion-label>"."S/D/O".$row['fatherName']."</ion-label>";
echo "<ion-label>".$row['motherName']."</ion-label>";
echo "<ion-label>".$row['DOB']."</ion-label>";
echo "<ion-label>".$row['aadhar']."</ion-label>";
echo "<ion-label>".$row['passport']."</ion-label>";
echo "<ion-label>".$row['gender']."</ion-label>";
echo "<ion-label>".$row['houseNo']."</ion-label>";
echo "<ion-label>".$row['street']."</ion-label>";
echo "<ion-label>".$row['city']."</ion-label>";
echo "<ion-label>".$row['state']."</ion-label>";
echo "<ion-label>".$row['country']."</ion-label>";
echo "<ion-label>".$row['pin']."</ion-label>";
echo "</ion-card-content>";
echo "</ion-card>";


}
echo "</form>";
echo "<ion-content>";

echo "</ion-app>";






}

?>