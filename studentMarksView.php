<?php
session_start();

if($_POST)
{

    $admin=$_POST['admin3'];
    $_SESSION['admin']=$admin;
   
   
    $q="select *from marks where admin_no='$admin'";
      #reading storing academic details of student
      $connect5=@mysqli_connect("localhost","root","mysql","student_details");
      $q5="select *from academic_details where admin_no='$admin'";
      $result5=mysqli_query($connect5,$q5);
      while($row=mysqli_fetch_array($result5))
      {
          
        $section=$row['section'];
        $class=$row['course'];
        $name=$row['name'];
      }
   $counter=1;
    $result=mysqli_query($connect5,$q);
    
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
                     Marks 
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
                          <ion-button  fill='none' slot='end' href='studentsmarkspdf.php'><ion-icon name='arrow-down'></ion-icon>
                   Generate Pdf
             </ion-button>
                          </ion-item>
                      </ion-title>
              </ion-toolbar>
          </ion-header>
          <ion-content>
     
        <?php 
        if($_SESSION['admin'])
        {
        while($row=mysqli_fetch_array($result))
        {    
        $subject=$row['subject'];
        $test=$row['exam'];
        $marksObt=$row['marks_obtained'];
        $totalMarks=$row['total_marks'];
       
       if($counter%2!=0) 
        echo "<ion-item color='dark'><ion-label> $subject</ion-label><ion-label> $test </ion-label><ion-label>$marksObt</ion-label><ion-label>$totalMarks</ion-label></ion-item>";
        else
        echo "<ion-item color='light'><ion-label> $subject</ion-label><ion-label> $test </ion-label><ion-label>$marksObt</ion-label><ion-label>$totalMarks</ion-label></ion-item>";
    
        $counter=$counter+1;
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
</html>