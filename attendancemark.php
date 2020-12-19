<?php
if($_POST)
{
  
  $section=$_POST['section'];
  $connect=@mysqli_connect("localhost","root","mysql","student_details");  
  $q="select *from academic_details where section='$section'";
  $q1="select *from attendance_tables where section='$section'"; 
  $result1=mysqli_query($connect,$q1); 
  while($row=mysqli_fetch_array($result1))
  {
    $table_name=$row['tablename'];
    
  }



 $result=mysqli_query($connect,$q);
$date=date("y-m-d");

$result=mysqli_query($connect,$q);
while($row=mysqli_fetch_array($result))
{
  $name=$row['name'];
  $admin=$row['admin_no']; 
$roll_no=$row['roll_no'];


$attendance=$_POST[$admin];
$q2="INSERT INTO `$table_name` (`admin_no`, `name`, `roll_no`, `attendance`, `date`) VALUES ('$admin', '$name', '$roll_no', '$attendance', '$date');";
$query=mysqli_query($connect,$q2);
  

}

 

 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
        <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
     
    </head>
    <body>
      <ion-app>
        <ion-content>
          <?php
          if($query)
          {
            echo "<h2 align='center'> Attendance marked succesfully </h2>";

          }
          else
          {
            echo "<h2 align='center'> Attendance has been marked already </h2>";
          }
          ?>

        </ion-content>
      </ion-app>
    </body>
</html>