<?php

if($_POST)
{
    $fid=$_POST['fid'];
    $connect1=@mysqli_connect("localhost","root","mysql","facultydetails");
$q1="select *from faculty where fid='$fid'";
$result1=mysqli_query($connect1,$q1);
while($row=mysqli_fetch_array($result1))
{
  $name=$row['name'];
  $fname=$row['fname'];
  $mname=$row['mname'];
  $dob=$row['dob'];
  $aadhar=$row['aadhar'];
  $passport=$row['passport'];
  $gender=$row['gender'];
  $h_no=$row['h_no'];
  $street=$row['street'];
  $city=$row['city'];
  $state=$row['state'];
  $country=$row['country'];
  $pin=$row['pin'];
  $phone=$row['phone'];
  $email=$row['email'];

}
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
        .mycolor
{
  --background:#00000000;
}
.myview{
  --background: #fff url("bgreg.jpg") no-repeat center center / cover;
}
.myview2{
  --background: #fff url("rgform.jpg") no-repeat center center / cover;
  --color:rgb(160, 86, 86);
}
.mycolor2 {
  --background: #00000000;
  --color:black;
  --placeholder-color:red;
}


    </style>

</head>
  <body>
    <ion-app>
        <ion-header  translucent>
        <ion-toolbar  class='myview2'>
        <ion-title align="center"  position="floating">Faculty Details Deletion</ion-title>      
    </ion-toolbar>
  </ion-header>
<ion-content color='medium'> 

<ion-row>
      <ion-col size-xl="7" >
              

            </ion-col>
           
            <ion-col size-xl="5">
              
                <ion-card class='myview2'>
                    
                        <ion-card-header>
                            <ion-card-title  align="center">
                               Faculty Details
                            </ion-card-title>
                        </ion-card-header>
                        <ion-card-content>
                        <form name='studentForm'   action='' method='post'>
                <ion-item class='mycolor2'>
                    <ion-label position="floating"> Name</ion-label>
                    <ion-icon name="person" slot="start"></ion-icon>
                    <ion-input class='place'  name="name" id="name" type="text" value='<?php echo "$name"; ?>'  ></ion-input>
                  </ion-item>
                  <ion-item class='mycolor2'>
                    <ion-label position="floating">fid No</ion-label>
                    <ion-icon name="person" slot="start"></ion-icon>
                    <ion-input class='place'   name='fid1' id="fid1" type="number" value='<?php echo "$fid"; ?>'   readonly></ion-input>
                  </ion-item>

                  <ion-item class='mycolor2'>
                    <ion-label position="floating" >Father Name</ion-label><ion-icon name="man" slot="start"></ion-icon>
                    <ion-input class='place' name="fname"   id="fname" type="text" value='<?php echo "$fname"; ?>'  ></ion-input>
                  </ion-item>
                  <ion-item  id='m' class='mycolor2'>
                      <ion-label position="floating">Mother Name</ion-label><ion-icon name="woman" slot="start"></ion-icon>
                      <ion-input    name="mname"   id="mname" type="text"  value='<?php echo "$mname"; ?>'  ></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                        <ion-label position="fixed">DOB</ion-label><ion-icon name="bed"slot="start"></ion-icon>
                      <ion-input class='place'  type="date" id='dob' name='dob'  value='<?php echo "$dob"; ?>'  ></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating" >Aadhar Number</ion-label><ion-icon name="bed" slot="start"></ion-icon>
                     <ion-input class='place' type='text' id='aadhar' name='aadhar'  value='<?php echo "$aadhar"; ?>'onkeyup="aadharValidation()"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">Passport Number</ion-label><ion-icon name="bed" slot="start"></ion-icon>
                      <ion-input class='place' type='text'  id='passport' name='passport' value='<?php echo "$passport"; ?>' ></ion-input>
                    </ion-item>
                      <ion-item class='mycolor2'>
                          <ion-label>Gender</ion-label><ion-icon slot="start" name="male"></ion-icon>
          
                            <ion-item class='mycolor2'>
                                <ion-label>Male</ion-label>
                                <input type='radio' value="male" name="gen">
                                </ion-radio>
                            </ion-item>
                                <ion-item class='mycolor2'>
                                <ion-label>Female</ion-label>
                                <input type='radio' value="female" name="gen">
                                    
                                </ion-radio>
                            </ion-item>
                        
                      </ion-item>
                    <ion-item-divider>
                      <ion-label>Current Address</ion-label>
                    </ion-item-divider>
                    <ion-item class='mycolor2' >
                      <ion-label position="floating">House/Flat No</ion-label><ion-icon name="home" slot="start"></ion-icon>
                      <ion-input class='place' name="H_no"   id="H_no" type="text" value='<?php echo "$h_no"; ?>'  ></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating" >Street</ion-label><ion-icon name="contract" slot="start"></ion-icon>
                      <ion-input class='place' name="street"   id="street" type="text"  value='<?php echo "$street"; ?>'  ></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2' >
                      <ion-label position="floating">City</ion-label><ion-icon name="business" slot="start"></ion-icon>
                      <ion-input class='place' name="city"   id="city" type="text"  value='<?php echo "$city"; ?>'  ></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">State</ion-label><ion-icon name="navigate" slot="start"></ion-icon>
                      <ion-input class='place' name="state"   id="state" type="text"  value='<?php echo "$state"; ?>'  ></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">Country</ion-label><ion-icon name="map" slot="start"></ion-icon>
                      <ion-input class='place' name="country"   id="country" type="text" value='<?php echo "$country"; ?>'   ></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">PIN</ion-label><ion-icon name="bus" slot="start"></ion-icon>
                      <ion-input class='place' name="pin"   id="pin" type="number"  value='<?php echo "$pin"; ?>'    ></ion-input>
                    </ion-item>
                    <ion-item-divider>
                      <ion-label>Commmunication</ion-label>
                    </ion-item-divider>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">Phone Number</ion-label><ion-icon name="call" slot='start'></ion-icon></ion-icon>
                      <ion-input class='place' name="phone"   id="phone" type="number"  value='<?php echo "$phone"; ?>'></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">Email</ion-label><ion-icon name="mail" slot='start'></ion-icon></ion-icon>
                      <ion-input class='place' name="email"   id="email" type="email"  value='<?php echo "$email"; ?>'  ></ion-input>
                    </ion-item>
                   
                    
                   <ion-button color='medium' class='mycolor2' type='submit' float-right>Delete</ion-button>
                  </form>
                </ion-card-content>
                </ion-card>
            </ion-col>
         

        </ion-row>
</ion-content>
<script>
   
      
        function fun() {
 alert('Deleted Successfully');
}
      
  
    
    </script>
    </ion-app>

    
  </body>
</html>
<?php
if($_POST){

   

    $connect=@mysqli_connect("localhost","root","mysql","facultydetails");
   
$fid=$_POST['fid1'];




$q="delete from faculty WHERE `fid`=$fid";

$result=mysqli_query($connect,$q);
if($result)
{
  echo "<script type='text/javascript'>
  fun();</script>";
}



}

