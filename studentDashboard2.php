<?php
session_start();
$admin=$_SESSION["user"];
#displaying profile pic
$connect=@mysqli_connect("localhost","root","mysql","login_details");
$q="select path from profilepics where id='$admin'";

$result=mysqli_query($connect,$q);
while($row=mysqli_fetch_array($result))
{
   $img_path=$row['path'];

}
#reading and stroing personal details of student
$connect1=@mysqli_connect("localhost","root","mysql","student_details");
$q1="select *from student where admin_no='$admin'";
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
#reading and storing fee details of student
$connect2=@mysqli_connect("localhost","root","mysql","fee_details");
$q2="select due from fee where admin_no='$admin'";
$result2=mysqli_query($connect2,$q2);
while($row=mysqli_fetch_array($result2))
{
   $due=$row['due'];

}
#reading and stroing attendace details of student
$connect3=@mysqli_connect("localhost","root","mysql","student_details");

$q3="select COUNT(attendance) from att001 GROUP BY(admin_no) ";
$result3=mysqli_query($connect3,$q3);
while($row=mysqli_fetch_array($result3))
{
    $total=$row[0];

}
$q4="select COUNT(attendance) ,admin_no from `att001` where attendance='present' GROUP BY(admin_no) ";
$result4=mysqli_query($connect3,$q4);
while($row=mysqli_fetch_array($result4))
{
    $present=$row[0];
    $temp=$row[1];
    if($admin==$temp)
    {
      $percentage=round(($present/$total)*100);
    }
    
    
   
}
#reading and storing academic details 
$connect5=@mysqli_connect("localhost","root","mysql","student_details");
$q5="select *from academic_details where admin_no='$admin'";
$result5=mysqli_query($connect5,$q5);
while($row=mysqli_fetch_array($result5))
{
    
  $section=$row['section'];
  $class=$row['course'];
}
$q6="select tablename from attendance_tables where section='$section'";
$result6=mysqli_query($connect5,$q6);
while($row=mysqli_fetch_array($result6))
{
    
$attendanceTable=$row['tablename'];
}
# reading and storing number of assignments in student's section
$q7="select COUNT(subject) from assignments GROUP BY('$section')";
$result7=mysqli_query($connect5,$q7);
while($row=mysqli_fetch_array($result7))
{
    
$assignmentNumber=$row[0];
}
# reading and storing total entries in markslist of studnet
$q8="select COUNT(subject) from marks where admin_no='$admin' GROUP BY('$section') ";
$result8=mysqli_query($connect5,$q8);
while($row=mysqli_fetch_array($result8))
{
    
$marksListNumber=$row[0];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      </style>
</head>
<body>
    <ion-app>
        
    <ion-content>
      <ion-header>
  <ion-toolbar transulent>
    
      <ion-item>
    <ion-label>Welcome <span style="color:rebeccapurple"><?php echo "$name"?></span></ion-label>
    <ion-button fill='none' slot='end'>HOME</ion-button>
    <ion-button fill='none' slot='end'>Dashboard</ion-button>
       <ion-avatar slot='end'><ion-img src='<?php echo "$img_path"?>'></ion-img></ion-avatar>
 
  </ion-item>
    
</ion-toolbar>
    </ion-header>
        <ion-row>
            <ion-col size-lg='4'>
              <table>
                
                <tr><td colspan='3'><ion-img  class='profilepic' src='<?php echo "$img_path"?>'></ion-img></td></tr>
                <tr><td align='center' colspan='3'><ion-button color='dark' fill='outline' shape='round' onclick='fun1()'>Peronal Details</ion-button></td></tr>
              </table>
    <p  align='center' id='para'></p>
             
            </ion-col>
            <ion-col size-lg="8" onclick="fun2()">
      <ion-row>
<ion-card>
  <ion-card-header>
    <ion-img src="assignments1.jpg"></ion-img>
  </ion-card-header>
  <ion-card-content text-center>
    <form action='assignmentDownload.php' method='post'>
      <ion-input  id='section' name='section'  value='<?php echo"$section"?>' hidden></ion-input>
      <ion-button type='submit' fill="outline" color="dark" shape="round">Assignments</ion-button>
      <ion-badge><?php echo "$assignmentNumber" ?></ion-badge>
    </form>
  </ion-card-content>
</ion-card>
<ion-card>
  <ion-card-header>
    
  </ion-card-header>
  
  <ion-card-content text-center>
    <form action='studentAttendanceView.php' method='post'>
    <ion-input  id='admin2' name='admin2' hidden value='<?php echo "$admin"?>'></ion-input>
    <ion-input  id='tableName' name='tableName' hidden value='<?php echo "$attendanceTable" ?>'></ion-input>
      <ion-button type='submit' fill="outline" color="dark" shape="round">Attendance</ion-button>
      <ion-badge><?php echo "$percentage"; ?>%</ion-badge>
    </form>
  </ion-card-content>
</ion-card>
<ion-card>
  <ion-card-header>
    <ion-img src="fees1.jpg"></ion-img>
  </ion-card-header>
  <ion-card-content text-center>
    <form action='feestatementread.php' method='post'>
      <ion-input  id='admin' name='admin' hidden value='<?php echo "$admin"?>'></ion-input>
      <ion-button type='submit' fill="outline" color="dark" shape="round">Fee</ion-button><ion-badge>Due:<?php echo "$due"?></ion-badge>
    </form>
  </ion-card-content>
</ion-card> 
  
    <ion-card>
      <ion-card-header>
        <ion-img src="marks1.jpg"></ion-img>
      </ion-card-header>

      <ion-card-content text-center >
      <form action='studentMarksView.php' method='post'>
      <ion-input  id='admin3' name='admin3' hidden value='<?php echo "$admin"?>'></ion-input>
      <ion-button type='submit' fill="outline" color="dark" shape="round">Marks</ion-button>
      <ion-badge><?php echo "$marksListNumber"; ?></ion-badge>
    </form>
      </ion-card-content>
    </ion-card>
    <ion-card>
      <ion-card-header>
        <ion-img src="quiz1.jpg"></ion-img>
      </ion-card-header>
      <ion-card-content text-center >
        <ion-button fill="outline" color="dark" shape="round">Quiz</ion-button>
      </ion-card-content>
    </ion-card>
    <ion-card>
      <ion-card-header>
        <ion-img src="quiz1.jpg"></ion-img>
      </ion-card-header>
      <ion-card-content text-center >
        <ion-button type='submit' fill="outline" color="dark" shape="round">Quiz</ion-button></ion-card-content>
    </ion-card>

  
  

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
      </script>
</html>