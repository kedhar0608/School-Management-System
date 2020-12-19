<?php
echo "<script type='module' src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js'></script>";
echo "<script nomodule src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js'> </script>";
echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css'/>";


if($_POST)
{
  $connect=@mysqli_connect("localhost","root","mysql","student_details");
  if($connect)
  $section=$_POST['attendance'];

    
  $q="select *from academic_details where section='$section'";
 $result=mysqli_query($connect,$q);
 
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
        <ion-content>
        <form action='attendancemark.php' method='post'>
      <ion-item color='danger'><ion-label>Name</ion-label><ion-label>Admin No</ion-label><ion-label>Roll No</ion-label><ion-label>Attendance</ion-label></ion-item>
        <?php
       
        while($row=mysqli_fetch_array($result))
        {
          $admin=$row['admin_no'];
          echo "<ion-item>";
          echo "<ion-label>".$row['name']."</ion-label>";
          echo "<ion-label>".$row['admin_no']."</ion-label>";
          echo "<ion-label>".$row['roll_no']."</ion-label>";
          echo "<ion-select value='present' name='$admin' placeholder='present' interface='popover'><ion-select-option>Present</ion-select-option><ion-select-option>Absent</ion-select-option></ion-selction>";
          echo "</ion-item>";
          
        
        }
       
        ?>
         <ion-input  name='section'  hidden  value='<?php echo "$section"; ?>' readonly></ion-input>
        <div class='ion-text-right'><ion-button shape='round' fill='outline' type='submit'>submit</ion-button></div>
        </form>
        </ion-content>
      </ion-app>
    </body>
</html>