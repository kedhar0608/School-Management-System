<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
    <style>
      .mycolor
{
  --background:#00000000;
}
.mycolor2
{
  --background:#00000080;
}

.myview{
  --background: #fff url("loginImg.jpg") no-repeat center center / cover;
}
.fancy-button {
  --background: #00000000;
}
.dan
{
    color:white;
    background-color:red;
}
    </style>
      <script>
        function al()
        {
            var el=document.getElementById('myid');
            var item=document.createElement('p');
            item.setAttribute('class', 'dan');
            item.innerText="Wrong Password";
            el.appendChild(item);

        }
        </script>
  </head>
<body>
<ion-app>
<ion-content class='myview'>
  <ion-header>
    <ion-toolbar  class='mycolor2' transulent>
    <ion-title  color='secondary'  class='ion-text-center'>Holy Path Secondary High School</ion-title>
  </ion-toolbar>
  </ion-header>
<ion-row>
  <ion-col size='4'>

  </ion-col>
  <ion-col size='4'>
    <ion-card class='myview'>
      <ion-card-header>
        <ion-title color='danger'>Login </ion-title>
      </ion-card-header>
      <ion-card-content>
  

  
<form action="" method="post">
   <ion-item class='mycolor'>
       <ion-label  color='light' position='floating'>USER ID</ion-label>
       <ion-input type='number' id='lid' name='lid' ></ion-input>
   </ion-item>
   <ion-item id='myid' class='mycolor'>
    <ion-label color='light' position='floating'>PASSWORD</ion-label>
    <ion-input type='password' id='psw' name='psw' ></ion-input>
</ion-item>
<div class='ion-float-right'>
<ion-button color='mycolor' type='submit'>Login</ion-button>
</div>
</form>
</ion-card-content>
</ion-card>

</form>
</ion-row>
</ion-content>
</ion-app>
</body>
</html>

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
    echo "<script type='text/javascript'> al(); </script>";
}




}

?>
