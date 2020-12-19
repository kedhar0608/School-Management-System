<?php
if($_POST){

    $connect=@mysqli_connect("localhost","root","mysql","facultydetails");
   
$fid=$_POST['fid'];
$name=$_POST['name'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
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
$phone=$_POST['phone'];
$email=$_POST['email'];

echo "$fid,$name,$fname,$mname,$dob,$aadhar,$passport,$gender,$h_no,$street,$city,$state,$country,$pin";

$q="INSERT INTO `faculty` (`fid`, `name`, `fname`, `mname`, `dob`, `aadhar`, `passport`, `gender`, `h_no`, `street`, `city`, `state`, `country`, `pin`,`phone`,`email`) VALUES ('$fid', '$name', '$fname', '$mname', '$dob', '$aadhar', '$passport', '$gender', '$h_no', '$street', '$city', '$state', '$country', '$pin','$phone','$email')";

$result=mysqli_query($connect,$q);
if($result)
{
  echo "inserted";
}



}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
  <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
    <script>
    function presentAlert() {

 alert('Registration Succesful');
 open('adminFacultyRegistartion.html')
  
}
    </script>
  </head>
  <body>
  <ion-app>
    <script>
      presentAlert()
      </script>
    <ion-content>
      

    </ion-content>
  </ion-app>
  </body>
</html>