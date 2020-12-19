<?

session_start();
$d= date('d-m-y');
$day=  date('D');
$id=$_SESSION["user"];
#displaying profile pic
$connect=@mysqli_connect("localhost","root","mysql","login_details");
$q="select path from profilepics where id='$id'";

$result=mysqli_query($connect,$q);
while($row=mysqli_fetch_array($result))
{
   $img_path=$row['path'];

}
#reading and stroing personal details of admin
$connect1=@mysqli_connect("localhost","root","mysql","facultydetails");
$q1="select *from admin where id='$id'";
$result1=mysqli_query($connect1,$q1);
while($row=mysqli_fetch_array($result1))
{
  $name=$row['name'];

}
function logout()
{
  session_unset();
session_destroy();


header("location:adminLogin.php");
}
if(isset($_GET["logout"]))
{
  
  logout();
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
    <style>
        :root {
      --ion-safe-area-top:15px;
      --ion-safe-area-bottom: 22px;
    }
    
      .box1 {
        background-color:#00000000;
      width: 200px;
      height:100px;
      border: 15px ;
      padding: 20px;
     
    }
    a:link, a:visited {

color:#00080000;
padding: 14px 25px;
text-align: center;
text-decoration: none;
display: inline-block;
}
.mycolor
{
  --background:#00000000;
}
.myview{
  --background: #fff url("bgreg.jpg") no-repeat center center / cover;
  animation-name: myEffect1;
  animation-duration: 1.5s;
}
.myview2{
  --background: #fff url("rgform.jpg") no-repeat center center / cover;
  --color:rgb(160, 86, 86);
  animation-name: myEffect2;
  animation-duration: 1.5s;
}
.mycolor2 {
  --background: #00000000;
  --color:black;
  --placeholder-color:red;
}
.error {
  background: #00000000;
  
  border-radius:5px;
  border:solid red;
  border-left-width:5px;
  border-right-width:5px;
  border-top-width:0px;
  border-bottom-width:0px;
}
.noError
{
  background: #00000000;
  
  border-radius:5px;
  border:solid green;
  border-left-width:5px;
  border-right-width:5px;
  border-top-width:0px;
  border-bottom-width:0px;
}
.place{
  --placeholder-color:#ffffff90;
  --placeholder-font-style:oblique 60deg;
  --placeholder-font-weight:lighter;
  font-size:14px;
}
@keyframes myEffect1 {
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
    margin-top: 100%;
    width: 300%; 
  }

  to {
    margin-top: 0%;
    width: 100%;
  }
}
.ff {
    width:220px;
    height:200px;

    --color:white;
  
  --background: rgb(40, 59, 59);
  transition: background  0.2s ;
  transition: width .2s;
}
.ff4 {
  

    --color:white;
  
  --background: rgb(140, 159, 159);
 
}

.ff:hover {
    
  
  --background:rgb(69, 107, 143);
  width:250px;

}
.ff2 {
    width:220px;
    height:200px;
    
        --color:white;
  
  --background: rgb(120, 89, 129);
  transition: background  0.2s ;
  transition: width .2s;
}

.ff2:hover {
    
  
    --background:rgb(69, 107, 143);
  width:250px;

}
.ff3 {
    width:220px;
    height:200px;
   
    --color:white;
  
  --background: rgb(220, 59, 59);
  transition: background  0.2s ;
  transition: width .2s;
}

.ff3:hover {
    
  
  --background:rgb(69, 107, 143);
  width:250px;

}

.carditem {

  
  --background: rgb(240, 240,240);
  --placeholder-color:black;

  
}
.carditem:hover {
    --background:rgb(69, 107, 143);
 
  

}
.cardinput {

  
    
--placeholder-color:black;
--color:black;


}



    </style>
  </head>
  <body>
      <ion-app>
          
          <ion-header>
  <ion-toolbar transulent class='ff4'>
  
      <ion-item class='ff4'>   
    <ion-label slot='start'>Welcome <span style="color:rebeccapurple"><?php echo "$name"?></span></ion-label>
    <ion-button fill='none' slot='end'>Dashboard</ion-button>
    <ion-button fill='none' href='adminDashboard.php?logout=ture' slot='end'>Logout</ion-button>
       <ion-avatar slot='end'><ion-img src='<?php echo "$img_path"?>'></ion-img></ion-avatar>    
  </ion-item>
  <ion-label color='secondary' slot='end'><?php echo " $d , $day ";?></ion-label>
</ion-toolbar>
    </ion-header>  
    <ion-content class='myview'> 
        <ion-row>
            <ion-col size-lg='4'>
                <form  method='post' action='announcement.php'>
                <ion-item>
                <ion-label position='floating'>Heading</ion-label>
                <ion-input id='heading' name='heading' type='text'></ion-input>
  <ion-label position='floating'>Announcement</ion-label>
  <ion-textarea  id='announcement' name='announcement' rows="6" cols="20" ></ion-textarea>
</ion-item>
<ion-item>
<ion-button slot='end' fill='outline' shape='round' color='medium' type='submit'>Send</ion-button>
</ion-item>
                </form>
<br>
<br>
<br>
                <form method='post' action='message.php'>
                <ion-item>
  <ion-label position='floating'>Recipient</ion-label>
  <ion-input type='text' id='recipient' name='recipient'></ion-input>
  <ion-label position='floating'>Message</ion-label>
  <ion-textarea  id='msg' name='msg' rows="6" cols="12" ></ion-textarea>
</ion-item>
<ion-item>
<ion-button slot='end' fill='outline' shape='round' color='medium' type='submit'>Send</ion-button>
</ion-item>
                </form>
    
            </ion-col>
    <ion-col size-lg='8'>
        <ion-row>
        <ion-card class='ff'>
            <ion-card-header>
                Registration
            </ion-card-header>
            <ion-card-content>
               <ion-item class='carditem'>
                   <ion-button  class='carditem' fill='none' shape='round' href='adminFacultyRegistration.php'>Faculty Registration</ion-button>
               </ion-item>
               <ion-item class='carditem'>
                   <ion-button class='carditem' fill='none' shape='round' href='adminStaffRegistration.php'>Staff Registration</ion-button>
               </ion-item>
               <ion-item class='carditem'>
                   <ion-button class='carditem' fill='none' shape='round' href='adminStudentRegistration.php'>Student Registration</ion-button>
               </ion-item>
            </ion-card-content>
        </ion-card>
        <ion-card class='ff2'>
            <ion-card-header>
               Modify
            </ion-card-header>
            <ion-card-content>
             
            <form action='facultyModify.php' method='post'>
                   <ion-item class='carditem'>
                   <ion-input class='cardinput' title='Enter FID' type='number' id='fid' name='fid' ></ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Faculty</ion-button>
                      
                   </ion-item>
                   </form>
                   <form action='studentModify.php' method='post'>
               <ion-item  class='carditem'>
                      <ion-input  title='Enter Admin No'class='cardinput'  type='number' id='admin' name='admin' > </ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Student</ion-button>
                  </ion-item>
                  </form>
                
                  <form action='staffModify.php' method='post'>
               <ion-item  class='carditem'>  
                      <ion-input title='Enter SID' class='cardinput'  type='number' id='sid' name='sid' ></ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Staff</ion-button>
                  </ion-item>
                  </form>
                
            </ion-card-content>
        </ion-card>
        <ion-card class='ff3'>
            <ion-card-header>
               Delete
            </ion-card-header>
            <ion-card-content>            
            <form action='facultyDelete.php' method='post'>
                   <ion-item class='carditem'>
                      <ion-input class='cardinput' title='Enter FID' type='number' id='fid' name='fid' ></ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Faculty</ion-button>
                     </ion-item>
                   </form>
                   <form action='studentDelete.php' method='post'>
               <ion-item  class='carditem'>
                      <ion-input  title='Enter Admin No'class='cardinput'  type='number' id='admin' name='admin' ></ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Student</ion-button>
                  </ion-item>
                  </form>
                  <form action='staffDelete.php' method='post'>
               <ion-item  class='carditem'>   
                      <ion-input title='Enter SID' class='cardinput'  type='number' id='sid' name='sid' ></ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Staff</ion-button>
                      
                  </ion-item>
                  </form>
                
            </ion-card-content>
        </ion-card>
        <ion-card class='ff'>
            <ion-card-header>
               DETAILS
            </ion-card-header>
            <ion-card-content>
                  <form action='facultySearch.php' method='post'>
                  <ion-item class='carditem'>
                      <ion-input class='cardinput' title='Enter FID' type='number' id='fid' name='fid' >
                      
                      </ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Faculty</ion-button>
                      </ion-item> 
                  </form>
                  <form action='studentSearch.php' method='post'>
                  <ion-item  class='carditem'>
                      <ion-input  title='Enter Admin No'class='cardinput'  type='number' id='admin' name='admin' >
    
                      </ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Student</ion-button>
                      </ion-item>
</form>
                  <form action='staffSearch.php' method='post'>
                  <ion-item  class='carditem'>
                      <ion-input title='Enter SID' class='cardinput'  type='number' id='sid' name='sid' >
                
                      </ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Staff</ion-button>
                  </ion-item>
                  </form>
                  
                
            </ion-card-content>
        </ion-card>
        <ion-card class='ff2'>
            <ion-card-header>
               Student Reports
            </ion-card-header>
            <ion-card-content>
          <form action='studentAttendanceView.php' method='post'>
                  <ion-item  class='carditem'>
                      <ion-input  title='Enter Admin No'class='cardinput'  type='number' id='admin2' name='admin2' >
                      
                      </ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Attendance</ion-button>
                      </ion-item>
                  </form>
                  
                  <form action='studentMarksView.php' method='post'>
               <ion-item  class='carditem'>
                   
                 
                      <ion-input title='Enter admin No' class='cardinput'  type='number' id='admin3' name='admin3' >
                     
                      </ion-input>
                      
                      <ion-button  type='submit'  fill='none' shape='round' >Marks</ion-button>
                  </ion-item>
                  </form>
                  <form action='feestatementread.php' method='post'>
                  <ion-item class='carditem'>
                      <ion-input class='cardinput' title='Enter admin no' type='number' id='admin' name='admin' >
                      </ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Fee</ion-button>
                      </ion-item> 
                  </form>
                   
                
            </ion-card-content>
        </ion-card>
        <ion-card class='ff'>
            <ion-card-content>
                Fee Payment
            </ion-card-content>
            <form action='fee.php' method='post'>
                <ion-item>
                <ion-input title='admin no' id='admin' name='admin' type='number'>
                
                </ion-input>
                <ion-button  type='submit'  fill='none' shape='round' >Pay</ion-button>
                </ion-item>
            </form>
        </ion-card>
        <ion-card class='ff2'>
            <ion-card-header>
               Class Reports
            </ion-card-header>
            <ion-card-content>
             
        
          <form action='attendanceview.php' method='post'>
                  <ion-item  class='carditem'>
                      <ion-input  title='Enter section'class='cardinput'  type='text' id='section' name='section' >
                      
                      </ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Attendance</ion-button>
                      </ion-item>
                  </form>
                  
                  <form action='marksview.php' method='post'>
               <ion-item  class='carditem'>
                   
                 
                      <ion-input title='Enter Section' class='cardinput'  type='text' id='section1' name='section1' >
                     
                      </ion-input>
                      
                      <ion-button  type='submit'  fill='none' shape='round' >Marks</ion-button>
                  </ion-item>
                  </form>
                  <form action='feereport.php' method='post'>
                  <ion-item class='carditem'>
                      <ion-input class='cardinput' title='Enter Section' type='text' id='section2' name='section2' >
                      </ion-input>
                      <ion-button  type='submit'  fill='none' shape='round' >Fee</ion-button>
                      </ion-item> 
                  </form>
                   
                
            </ion-card-content>
        </ion-card>
        </ion-row>
    </ion-col>
        </ion-row>
          </ion-content>
      </ion-app>
  </body>
</html>