

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
  --background: #fff url("lgbgimg.jpg") no-repeat center center / cover;
}
.fancy-button {
  --background: #00000000;
}
.dan
{
    color:white;
    background-color:red;
   
}
.textcolor
{
 color:white;
}
    </style>
    <script>
        function al() //gives alert for wrong password
        {
            var el=document.getElementById('myid'); // stroing input filed using it's id
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
       <ion-label  color='medium' position='floating'>ADMIN ID</ion-label>
       <ion-input class='textcolor' type='number' id='lid' name='lid' ></ion-input>
   </ion-item>
   <ion-item id='myid' class='mycolor'>
    <ion-label color='medium' position='floating'>PASSWORD</ion-label>
    <ion-input  class='textcolor' type='password' id='psw' name='psw' ></ion-input>
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

if($_POST){
  session_start();

    $connect=@mysqli_connect("localhost","root","mysql","login_details");

    $lid=$_POST['lid'];
$_SESSION["user"]=$lid;
    $psw=$_POST['psw'];
$q="select *from admin where id='$lid' ";
$result=mysqli_query($connect,$q);
while($row=mysqli_fetch_array($result))
{
    $password=$row['password'];
    
}

if($password===$psw)
{
    header("location:adminDashboard.php");
}
else
{
    echo "<script type='text/javascript'> al(); </script>";

}





}

?>
