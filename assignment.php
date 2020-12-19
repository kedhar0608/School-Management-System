<?php
session_start();
$connect=@mysqli_connect("localhost","root","mysql","student_details");


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
    <style>
         .myview{
  --background: #fff url("faculty.jpg") no-repeat center center / cover;
}
        </style>
  </head>
</style>
  <body>
    <ion-app>
<ion-header>
  <ion-toolbar>
    <ion-title>
      Assignment upload
    </ion-title>
  </ion-toolbar>
</ion-header>

    <ion-content class='myview'>
      <ion-row>
        <ion-col size='4'>

        </ion-col>
        <ion-col size='4'>
     <ion-card>
    <form action="assignmentUpload.php" method="post" enctype="multipart/form-data" >
        <h3>Upload File</h3>
        <ion-item> <ion-label>Class</ion-label>
           <ion-select name='class'>
            <ion-select-option value='d001'>D001</ion-select-option>
            <ion-select-option value='d002'>D002</ion-select-option>
            
          </ion-select>
          </ion-item>
          <ion-item> <ion-label>subject</ion-label>
           <ion-select name='subject'>
           <ion-select-option value='English'>English</ion-select-option>
            <ion-select-option value='Maths'>Maths</ion-select-option> 
        
          </ion-select>
          </ion-item>
          
        <ion-input type="file" name="myfile"></ion-input>
        <ion-item class='ion-float-right'>
        <ion-button type="submit" shape='round' fill='outline' name="save">upload</ion-button>
        </ion-item>
      </form>
     </ion-card>
        </ion-col>
      </ion-row>

    </ion-content>
    
    </body>
    </ion-app>
</html>

