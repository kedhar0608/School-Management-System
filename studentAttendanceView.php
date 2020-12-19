<?php

if($_POST)
{
    $admin=$_POST['admin2'];
    $connect5=@mysqli_connect("localhost","root","mysql","student_details");
$q5="select *from academic_details where admin_no='$admin'";
$result5=mysqli_query($connect5,$q5);
while($row=mysqli_fetch_array($result5))
{
    
  $section=$row['section'];
  $class=$row['course'];
  $name=$row['name'];
}
$q6="select tablename from attendance_tables where section='$section'";
$result6=mysqli_query($connect5,$q6);
while($row=mysqli_fetch_array($result6))
{
    
$attendanceTable=$row['tablename'];
}
    $connect=@mysqli_connect("localhost","root","mysql","student_details");
    $q="select *from $attendanceTable where admin_no='$admin'";
    $result=mysqli_query($connect,$q);
    
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/css/ionic.bundle.css"/>
  </head>
  <body>
      <ion-app>
          <ion-header>
              <ion-toolbar transulent color='secondary'>
                  <ion-title>
                      Student Attendace 
                      <ion-item color='secondary'>
                      <ion-label>
                          <?php echo "Name:$name" ?>
                          </ion-label>
                          <ion-label >
                          <?php echo "Section:$section" ?>
                          </ion-label>
                          <ion-label>
                          <?php echo "Class:$class" ?>
                          </ion-label>
                          </ion-item>
                      </ion-title>
              </ion-toolbar>
          </ion-header>
          <ion-content>
        <?php 
        if($result){
          while($row=mysqli_fetch_array($result))
          {    
          $name=$row['name'];
          $attendance=$row['attendance'];
          $roll_no=$row['roll_no'];
          $date=$row['date'] ;
          if($attendance=='present')
          echo "<ion-item color='primary'><ion-label>Roll No: $roll_no </ion-label><ion-label>Section: $section </ion-label><ion-label>Course: $course </ion-label><ion-label>Date: $date</ion-label><ion-label>$attendance</ion-label></ion-item>";
          else
          echo "<ion-item color='danger'><ion-label>Roll No: $roll_no </ion-label><ion-label>Section: $section </ion-label><ion-label>Course: $course </ion-label><ion-label>Date: $date</ion-label><ion-label>$attendance</ion-label></ion-item>";
          }
        }
        else
        {
          echo "<ion-row>";
          echo "<ion-col size='4' offset='4'>";
          echo "<ion-card>";
          echo "<ion-card-header>OOPS</ion-card-header>";
          echo "<ion-img src='oops.gif'></ion-img>";
          echo "</ion-card-content>";
          echo "</ion-card>";
          echo "</ion-col>";
        }
          ?>
          </ion-content>
      </ion-app>
  </body>