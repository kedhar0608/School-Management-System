<?php
 echo "<script type='module' src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js'></script>";
 echo "<script nomodule src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js'> </script>";
echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css'/>";
$connect=@mysqli_connect("localhost","root","mysql","student_details");

if (isset($_POST)) { // if save button on the form is clicked
    // name of the uploaded file
    $section=$_POST['section'];
    $q="select *from assignments where section='$section'";
    $counter=1;
    $result=mysqli_query($connect,$q);
}
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function goBack() {
            try
            {
            var content=document.getElementById('content');
            content.classList.remove('myanm');
            content.classList.add('myanm2');
            }
            finally
            {
            go();
            }
 
}
function go()
{
    window.history.back();
}
        </script>
        <style>
            @keyframes myEffect {
    from {
    margin-bottom: 100%;
    width: 300%; 
  }

  to {
    margin-bottom: 0%;
    width: 100%;
  }
}
@keyframes myEffect2 {
    from {
    margin-top:100%;
    width: 300%; 
  }

  to {
    margin-top: 0%;
    width: 100%;
  }
}
.myanm
{
    animation-name:myEffect;
  animation-duration: 4s;
}
.myanm2
{
    animation-name:myEffect2;
  animation-duration: 0.5s;
}
            </style>
    </head>
    <body>
        <ion-app>
            <ion-content  id='content' class='myanm'>
            <ion-toolbar color='tertiary' class='ion-text-center'>
            <ion-button  fill=none; slot='start' onclick='goBack()'>
            <ion-icon name="arrow-back"></ion-icon>
            </ion-button>
            <ion-title>Assignments</ion-title>
            </ion-toolbar>
             <?php
                while($row=mysqli_fetch_array($result)){
                    $path=$row['path'];

             if($counter%2!=0)
             echo "<ion-item color='medium'><ion-label>".$row['name']."</ion-label><ion-label>".$row['subject']."</ion-label><a href='$path' download><ion-icon color='danger' name='arrow-down-outline'></ion-icon></a></ion-item>";
             else
             echo "<ion-item><ion-label>".$row['name']."</ion-label><ion-label>".$row['subject']."</ion-label><a href='$path' download><ion-icon name='arrow-down-outline'></ion-icon></a></ion-item>";

             $counter=$counter+1;

                }
            
             ?>
            </ion-content>
        </ion-app>
    </body>
</html>

