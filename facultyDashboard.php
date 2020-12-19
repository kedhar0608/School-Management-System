<?

session_start();
$d= date('d-m-y');
$day=  date('D');
$fid=$_SESSION["user"];
$path=$_SESSION["path"];
#displaying profile pic
$connect=@mysqli_connect("localhost","root","mysql","login_details");
$q="select path from profilepics where id='$fid'";

$result=mysqli_query($connect,$q);
while($row=mysqli_fetch_array($result))
{
   $img_path=$row['path'];

}

#reading and stroing personal details of faculty
$connect1=@mysqli_connect("localhost","root","mysql","facultydetails");
$q1="select *from faculty where fid='$fid'";
$result1=mysqli_query($connect1,$q1);
while($row=mysqli_fetch_array($result1))
{
  $name=$row['name'];
  $fname=$row['fname'];
  $mname=$row['mname'];
  $h_no=$row['h_no'];
  $street=$row['street'];
  $city=$row['city'];
  $state=$row['state'];
  $country=$row['country'];
  $pin=$row['pin'];
}

# fetching time table
$Day=strtolower($day);
$connect2=@mysqli_connect("localhost","root","mysql","facultydetails");
$q2="select *from `$Day` where fid='$fid'";
$result2=mysqli_query($connect2,$q2);
while($row=mysqli_fetch_array($result2))
{
    
  $_1=$row['s1'];
  $_2=$row['s2'];
  $_3=$row['s3'];
  $_4=$row['s4'];
  $_5=$row['s5'];
  $_6=$row['s6'];
  $_7=$row['s7'];  
}

function logout()
{
  session_unset();
session_destroy();
header("location:facultylogin.php");
}
if(isset($_GET["logout"]))
{
  $connect->close();
  $connect2->close();
  

  logout();
}
$connect->close();
$connect2->close();




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

      .profilepic
      {
        width:150px;
        height:150px;
      }
      .box1 {
      background-color: lightgrey;
      width: 450px;
      height:420px;
      border: 15px ;
      margin-top: 30px;
      padding:10px;
 
     
    }
    .announcemntBox1 {
      background-color:rgb(45, 15,24);
      color:white;
      
     
     
    }
    .heading {
      background-color:white;
      color:black;
      
     
     

    }
    .myview{
  --background: #fff url("faculty.jpg") no-repeat center center / cover;
}
      </style>

</head>
<body onload="">
    <ion-app>
    <ion-header>
  <ion-toolbar transulent>
  <ion-label color='secondary' slot='end'><?php echo " $d , $day ";?></ion-label>
      <ion-item>
      
    <ion-label slot='start'>Welcome <span style="color:rebeccapurple"><?php echo "$name"?></span></ion-label>
    <ion-button fill='none' href='changepassword2.html'slot='end'>Change Password</ion-button>
    <ion-button fill='none' slot='end'>Dashboard</ion-button>
    <ion-button href='facultyDashboard.php?logout=ture' fill='none' slot='end'>Logout</ion-button>
    
       <ion-avatar slot='end'><ion-img src='<?php echo "$img_path"?>'></ion-img></ion-avatar>
      
  </ion-item>
    
</ion-toolbar>
    </ion-header>   
    <ion-content class='myview'>

        <ion-row>
            <ion-col size='4'>
              <table>
                
                <tr><td colspan='3'><ion-img  class='profilepic' src='<?php echo "$img_path"?>'></ion-img></td></tr>
                <tr><td align='center' colspan='3'><ion-button color='dark' fill='outline' shape='round' onclick='fun1()'>Peronal Details</ion-button></td></tr>
              </table>
    <p  align='center' id='para'></p>
             
            </ion-col>
            <ion-col size-lg="8" onclick="fun2()">
            <ion-row>
            <ion-col size='4'>
            <ion-card color='secondary'>
                    <ion-card-header>
                      <ion-toolbar color='secondary' class='ion-text-center'>
                        <ion-title>
                          Menu
                        </ion-title>
                      </ion-toolbar>
                    </ion-card-header>
                    <ion-card-content>
                      <ion-item>
                   <ion-button fill='none' href='marksUploading.php'>Marks upload</ion-button>
                     </ion-item>
                     <ion-item>
                   <ion-button fill='none' href='attendance.php'>Mark Attendance</ion-button>
                     </ion-item>
                     <ion-item>
                   <ion-button fill='none' href='attendance3.php'>Attendace View</ion-button>
                     </ion-item>
                     <ion-item>
                   <ion-button fill='none' href='assignment.php'>Assignment upload</ion-button>
                     </ion-item>
                     <ion-item>
                   <ion-button fill='none' href='msgs.php'>Send Message</ion-button>
                     </ion-item>
                   </ion-card-content>
      </ion-card>
                </ion-col>
                                   
                <ion-col size='4'>
    
                    <ion-card color='medium'>
                        <ion-card-header color='light'>
                            <ion-toolbar color='light'>
                            <ion-title>
                                Time Table
                            </ion-title>
                            </ion-toolbar>

                        </ion-card-header>
                        <ion-card-content>
                            <ion-item color='medium'>
                             <ion-label>09 - 10 AM</ion-label>   <ion-label><?php echo "$_1" ?></ion-label>
                            </ion-item>
                            <ion-item  color='medium'>
                             <ion-label>10 - 11 AM</ion-label>   <ion-label><?php echo "$_2" ?></ion-label>
                            </ion-item>
                            <ion-item color='medium'>
                             <ion-label>11 - 12 AM</ion-label>   <ion-label><?php echo "$_3" ?></ion-label>
                            </ion-item>
                            <ion-item  color='medium' >
                             <ion-label>12 - 01 PM</ion-label>   <ion-label><?php echo "$_4" ?></ion-label>
                            </ion-item>
                            <ion-item color='medium'>
                             <ion-label>02 - 03 PM</ion-label>   <ion-label><?php echo "$_5" ?></ion-label>
                            </ion-item>
                            <ion-item color='medium'>
                             <ion-label>03 - 04 PM</ion-label>   <ion-label><?php echo "$_6" ?></ion-label>
                            </ion-item>
                            <ion-item color='medium'>
                             <ion-label>04 - 05 PM</ion-label>   <ion-label><?php echo "$_7" ?></ion-label>
                            </ion-item>
                        </ion-card-content>
                    </ion-card>
                  
                </ion-col>
          
                <ion-col size='4'>
        
                     <ion-app>
                       <ion-header>
                         <ion-toolbar color='tertiary'>
                           <ion-title>
                             Announcements
                           </ion-title>
                         </ion-toolbar>
                       </ion-header>
                       <ion-content>
                    <ion-card color='secondary'>
                       <?php 
                     $connect3=@mysqli_connect("localhost","root","mysql","student_details");
                     $q3="select *from  announcements";
                     $result3=mysqli_query($connect3,$q3);
               
                     
                     
                     while($row=mysqli_fetch_array($result3))
                     {
                          $announ=$row['announcement'];
                          $depart=$row['department'];
                          $dates=$row['date'];
                          $headings=$row['heading'];
                        echo "<div class='announcemntBox1'>";
                          echo "<h4 class='heading'>$headings</h4>";
                          echo "<p>$announ</p>";
                          echo "<p>$dates</p>";
                          echo "</div>";


                     }
                    
                   
                     ?>
                    </ion-card>
                     
                     </ion-content>
                     </ion-app>
                   
                </ion-col>
        
            </ion-row>
             
            </ion-col>
        </ion-row>
    </ion-content>
    </ion-app>
  
</body>
<script>
    function  fun1()
      {
        var basic=document.createElement('ion-item');
        basic.innerText='Basic';
        var accom=document.createElement('ion-item');
        accom.innerText="Permenant Adress";
       var fnameH=document.createElement('h4');
      fnameH.innerText="Father's Name";
      
     
      var mnameH=document.createElement('h4');
      mnameH.innerText="Mother's Name";
      var fname=document.createElement('ion-label');
      fname.innerText='<?php echo "$fname" ?>';
      var mname=document.createElement('ion-label');
      mname.innerText='<?php echo "$mname" ?>';
      var h_no=document.createElement('h6');
      h_no.innerText='<?php echo "$h_no" ?>';
      var street=document.createElement('h6');
      street.innerText='<?php echo "$street" ?>';
      var city=document.createElement('h6');
      city.innerText='<?php echo "$city" ?>';
      var state=document.createElement('h6');
      state.innerText='<?php echo "$state" ?>';
      var country=document.createElement('h6');
      country.innerText='<?php echo "$country" ?>';
      var pin=document.createElement('h6');
      pin.innerText='<?php echo "$pin" ?>';
      document.getElementById('para').innerHTML='';
      document.getElementById('para').appendChild(basic);
      document.getElementById('para').appendChild(fnameH);
 
      document.getElementById('para').appendChild(fname);
    
      document.getElementById('para').appendChild(mnameH);
      
      document.getElementById('para').appendChild(mname);
      document.getElementById('para').appendChild(accom);
      document.getElementById('para').appendChild(h_no);
      document.getElementById('para').appendChild(street);
      document.getElementById('para').appendChild(state);
      document.getElementById('para').appendChild(country);
      document.getElementById('para').appendChild(pin);
      }
    function  fun2()
      {
        document.getElementById('para').innerHTML="";
      }
      function notes()
      {
         
      }
      </script>
</html>