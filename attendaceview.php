<?php
echo "<script type='module' src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js'></script>";
echo "<script nomodule src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js'> </script>";
echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css'/>";


if($_POST)
{
  $connect=@mysqli_connect("localhost","root","mysql","student_details");
  if($connect)
  $class=$_POST['class'];




 
   
    
  $q="select COUNT(attendance) from attendance where attendance='present' GROUP BY(admin_no) ";
 $result=mysqli_query($connect,$q);

foreach($coun as $result)
{
    echo "$coun";
}



}
?>