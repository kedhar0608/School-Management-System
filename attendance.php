<?
session_start();
$name=$_SESSION['Name'];
$fid=$_SESSION['user'];
?>
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
  <body>
  <ion-app>
    <ion-header>
  <ion-toolbar transulent color='secondary'>
    <ion-title>Student Attendance Marking</ion-title>
</ion-toolbar>
    </ion-header>   
    <ion-content class='myview'>
        <ion-row>
            <ion-col size='4'>
            </ion-col>
            <ion-col size='4'>
                <form action='attendance2.php' method='post'>
                    <ion-card color='secondary'>
                        <ion-card-header>
                            <ion-toolbar color='secondary'>
                                <ion-title>
                                    Attendance
                                </ion-title>
                            </ion-toolbar>
                        </ion-card-header>
                        <ion-card-content>
                            <ion-item color='secondary'>
                            <ion-label>Faculty Name</ion-label>    <ion-label><?php echo "$name" ?></ion-label>
                            </ion-item>
                            <ion-item color='secondary'>
                            <ion-label>FID</ion-label>  <ion-label><?php echo "$fid" ?></ion-label>
                            </ion-item>
                            <ion-item color='secondary'>
          <ion-label>Section</ion-label>
          <ion-select  color='secondary' id="class" name='attendance'   value='d001'  interface="popover">
            <ion-select-option value="d001">D001</ion-select-option>
            <ion-select-option value="d002">D002</ion-select-option>
            <ion-select-option value="d003">D003</ion-select-option>
            <ion-select-option value="d004">D004</ion-select-option>
          </ion-select>
          
        </ion-item>
        <ion-item  color='secondary' class='ion-float-right'>
        <ion-button  fill='outline' type="submit">submit</ion-button>
        </ion-item>
                           
                        </ion-card-content>
                    </ion-card>


                </form>
            </ion-col>
        </ion-row>
    </ion-content>
  </body>
</html>