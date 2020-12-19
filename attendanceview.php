<?php
if($_POST)
{
$section=$_POST['section'];
  $connect=@mysqli_connect("localhost","root","mysql","student_details");
  $q1="select *from attendance_tables where section='$section'"; 
  $result1=mysqli_query($connect,$q1); 
  while($row=mysqli_fetch_array($result1))
  {
    $table_name=$row['tablename'];
    
  }


$q2="select COUNT(attendance) from `$table_name` GROUP BY(admin_no) ";
$result2=mysqli_query($connect,$q2);
while($row=mysqli_fetch_array($result2))
{
    $total=$row[0];
break;

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
        <style>
    
          .profilepic
          {
            width:150px;
            height:150px;
          }
          .myview{
  --background: #fff url("faculty.jpg") no-repeat center center / cover;
}
          </style>
    </head>
    <body>
      <ion-app>
       <ion-header>
           <ion-toolbar>
               <ion-title>
                   Attendance view
               </ion-title>
           </ion-toolbar>
       </ion-header>
       <ion-content>
       <?php
$q="select COUNT(attendance),admin_no from `$table_name` where attendance='present' GROUP BY(admin_no) ";
$result=mysqli_query($connect,$q);


while($row=mysqli_fetch_array($result))
{ 
    $present=$row[0];

    $admin=$row[1];
    $q3="select *from academic_details where admin_no='$admin'";
    $result3=mysqli_query($connect,$q3);
    while($row2=mysqli_fetch_array($result3))
{
    $name=$row2['name'];

}
    
    $percentage=round(($present/$total)*100);
    if($percentage<75)
    {
        echo "<ion-item color='danger'><ion-label>$admin</ion-label><ion-label>$name</ion-label><ion-label>Total:$total Attended:$present</ion-label><ion-badge color='light'>$percentage%</ion-badge></ion-item>";
    }
    else
    {
        echo "<ion-item color='primary'><ion-label>$admin</ion-label><ion-label>$name</ion-label><ion-label>Total:$total Attended:$present</ion-label><ion-badge color='light'>$percentage%</ion-badge></ion-item>";

    }

}


       ?>
       </ion-content>
</ion-app>
    </body>
</html>