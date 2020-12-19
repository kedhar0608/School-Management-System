<?php

if($_POST)
{
    $admin=$_POST['admin'];
    $connect1=@mysqli_connect("localhost","root","mysql","student_details");
$q1="select *from student where admin_no='$admin'";
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

    </style>

</head>
  <body>
    <ion-app>
        <ion-header  translucent>
        <ion-toolbar  class='myview2'>
        <ion-title align="center"  position="floating">Student Details Modification</ion-title>      
    </ion-toolbar>
  </ion-header>
<ion-content>

<ion-row>
      <ion-col size-xl="7" >
              

            </ion-col>
           
            <ion-col size-xl="5">
              
                <ion-card class='myview2'>
                    
                        <ion-card-header>
                            <ion-card-title  align="center">
                               Student Details
                            </ion-card-title>
                        </ion-card-header>
                        <ion-card-content>
                        <form name='studentForm'   action='' onsubmit=' return validateForm()' method='post'>
                <ion-item class='mycolor2'>
                    <ion-label position="floating"> Name</ion-label>
                    <ion-icon name="person" slot="start"></ion-icon>
                    <ion-input class='place'  name="name" id="name" type="text" value='<?php echo "$name"; ?>' onkeyup="validation(id)"></ion-input>
                  </ion-item>
                  <ion-item class='mycolor2'>
                    <ion-label position="floating">Admin No</ion-label>
                    <ion-icon name="person" slot="start"></ion-icon>
                    <ion-input class='place'  placeholder='student Id' name='admin' id="admin" type="number" value='<?php echo "$admin"; ?>' onkeyup="validation(id)" readonly></ion-input>
                  </ion-item>

                  <ion-item class='mycolor2'>
                    <ion-label position="floating" >Father Name</ion-label><ion-icon name="man" slot="start"></ion-icon>
                    <ion-input class='place'  placeholder='Name as in any valid adress proof' name="fname"   id="fname" type="text" value='<?php echo "$fname"; ?>' onkeyup="validation(id)"></ion-input>
                  </ion-item>
                  <ion-item  id='m' class='mycolor2'>
                      <ion-label position="floating">Mother Name</ion-label><ion-icon name="woman" slot="start"></ion-icon>
                      <ion-input    name="mname"   id="mname" type="text"  value='<?php echo "$mname"; ?>' onkeyup="validation(id)"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                        <ion-label position="fixed">DOB</ion-label><ion-icon name="bed"slot="start"></ion-icon>
                      <ion-input class='place'  type="date" id='dob' name='dob'  value='<?php echo "$dob"; ?>' onkeyup="validation(id)"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating" >Aadhar Number</ion-label><ion-icon name="bed" slot="start"></ion-icon>
                     <ion-input class='place' type='text' id='aadhar' name='aadhar'  value='<?php echo "$aadhar"; ?>'onkeyup="aadharValidation()"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">Passport Number</ion-label><ion-icon name="bed" slot="start"></ion-icon>
                      <ion-input class='place' type='text'  id='passport' name='passport' value='<?php echo "$passport"; ?>'onkeyup="validation(id)"></ion-input>
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
                      <ion-input class='place' name="H_no"   id="H_no" type="text" value='<?php echo "$h_no"; ?>' onkeyup="validation(id)"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating" >Street</ion-label><ion-icon name="contract" slot="start"></ion-icon>
                      <ion-input class='place' name="street"   id="street" type="text"  value='<?php echo "$street"; ?>' onkeyup="validation(id)"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2' >
                      <ion-label position="floating">City</ion-label><ion-icon name="business" slot="start"></ion-icon>
                      <ion-input class='place' name="city"   id="city" type="text"  value='<?php echo "$city"; ?>' onkeyup="validation(id)"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">State</ion-label><ion-icon name="navigate" slot="start"></ion-icon>
                      <ion-input class='place' name="state"   id="state" type="text"  value='<?php echo "$state"; ?>' onkeyup="validation(id)"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">Country</ion-label><ion-icon name="map" slot="start"></ion-icon>
                      <ion-input class='place' name="country"   id="country" type="text" value='<?php echo "$country"; ?>' onkeyup="validation(id)" ></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">PIN</ion-label><ion-icon name="bus" slot="start"></ion-icon>
                      <ion-input class='place' name="pin"   id="pin" type="number"  value='<?php echo "$pin"; ?>' onkeyup="pinValidation()" ></ion-input>
                    </ion-item>
                    <ion-item-divider>
                      <ion-label>Commmunication</ion-label>
                    </ion-item-divider>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">Phone Number</ion-label><ion-icon name="call" slot='start'></ion-icon></ion-icon>
                      <ion-input class='place' name="phone"   id="phone" type="number"  value='<?php echo "$phone"; ?>' onkeyup="phValidation()"></ion-input>
                    </ion-item>
                    <ion-item class='mycolor2'>
                      <ion-label position="floating">Email</ion-label><ion-icon name="mail" slot='start'></ion-icon></ion-icon>
                      <ion-input class='place' name="email"   id="email" type="email"  value='<?php echo "$email"; ?>' onkeyup="validation(id)"></ion-input>
                    </ion-item>
                   
                    
                   <ion-button color='medium' class='mycolor2' type='submit' float-right>Modify</ion-button>
                  </form>
                </ion-card-content>
                </ion-card>
            </ion-col>
         

        </ion-row>
</ion-content>
<script>
    function validateForm()
    {
      var fname=document.forms['studentForm']['fname'].value;
      var mname=document.forms['studentForm']['mname'].value;
      var name=document.forms['studentForm']['name'].value;
      var admin=document.forms['studentForm']['admin'].value;
      var dob=document.forms['studentForm']['dob'].value;
      var gender=document.forms['studentForm']['gen'].value;
      var aadhar=document.forms['studentForm']['aadhar'].value;
      var passport=document.forms['studentForm']['passport'].value;
      var h_no=document.forms['studentForm']['H_no'].value;
      var street=document.forms['studentForm']['street'].value;
      var city=document.forms['studentForm']['city'].value;
      var state=document.forms['studentForm']['state'].value;
      var country=document.forms['studentForm']['country'].value;
      var pin=document.forms['studentForm']['pin'].value;
      var phone=document.forms['studentForm']['phone'].value;
      var email=document.forms['studentForm']['email'].value;
var f=document.getElementById('fname');
var m=document.getElementById('mname');
var n=document.getElementById('name');
var fi=document.getElementById('admin');
var d=document.getElementById('dob');
var g=document.getElementById('gen');
var a=document.getElementById('aadhar');
var pa=document.getElementById('passport');
var h=document.getElementById('H_no');
var s=document.getElementById('street');
var c=document.getElementById('city');
var st=document.getElementById('state');
var co=document.getElementById('country');
var p=document.getElementById('pin');
var ph=document.getElementById('phone');
var e=document.getElementById('email');
      
      console.log(mname);
      if(mname==0)
      {
        
        m.classList.add("error");
       
      }
      else
      {
        m.classList.add("noError");
      }
      if(gender==0)
      {
        alert("Please select Gender");
        
      }
      if(name==0)
      {
        n.classList.add("error");
        
      }
      else
      {
        n.classList.add("noError");
      }
      if(admin==0)
      {
        fi.classList.add("error");
        
      }
      else
      {
        fi.classList.add("noError");
      }
      if(fname==0)
      {
        f.classList.add("error");
        
      }
      else
      {
        f.classList.add("noError");
      }
      if(aadhar==0)
      {
        a.classList.add("error");
        
      }
      else
      {
        a.classList.add("noError");
      }
      if(passport==0)
      {
        pa.classList.add("error");
        
      }
      else
      {
        pa.classList.add("noError");
      }
      if(h_no==0)
      {
        h.classList.add("error");
        
      }
      else
      {
        h.classList.add("noError");
      }
      if(street==0)
      {
        s.classList.add("error");
        
      }
      else
      {
        s.classList.add("noError");
      }
      if(city==0)
      {
        c.classList.add("error");
        
      }
      else
      {
        c.classList.add("noError");
      }
      if(state==0)
      {
        st.classList.add("error");
        
      }
      else
      {
        st.classList.add("noError");
      }
      if(country==0)
      {
        co.classList.add("error");
        
      }
      else
      {
        co.classList.add("noError");
      }
      if(pin.length!=6)
      {
        alert('pin number must be 6 digits')
        p.classList.add("error");
        
      }
      else
      {
        p.classList.add("noError");
      }
      if(phone==0)
      {
        ph.classList.add("error");
        
      }
      if(email==0)
      {
        e.classList.add("error");
        
      }
      if(dob==0)
      {
        d.classList.add("error");
        
      }
      else
      {
        d.classList.add("noError");
      }
      if(phone.length!=10)
      {
        alert("Mobile Number should be 10 digits only");
        ph.classList.add("error");
        
      }
      else
      {
        ph.classList.add("noError");
      }
     


      if(fname==0 ||mname==0 || name==0||dob==0 ||gender==0||aadhar==0&&passport==0||h_no==0||street==0||
         city==0||state==0||country==0||phone.length!=10||pin.length!=6||email==0)
         {
           return false;
         }
    }
   
    function validation(mm)
      {
        var l=document.getElementById(mm);
       l.classList.remove("error");
      }
      function phValidation()
      {
        var l=document.getElementById('phone');
        var p=document.forms['studentForm']['phone'].value;
       l.classList.remove("error");
     
        
        if(p.length!=10)
        {
          l.classList.remove("noError");

          l.classList.add('error');
        }
        else
        {
          l.classList.remove("error");
        l.classList.add('noError');
        }
      }
      function aadharValidation()
      {
        var l=document.getElementById('aadhar');
        var p=document.forms['studentForm']['aadhar'].value;
       l.classList.remove("error");
       if(p.length==4)
       {
           l.value=p+' ';
       }
       if(p.length==9)
       {
           l.value=p+' ';
       }
        
        if(p.length!=14)
        {
          l.classList.remove("noError");

          l.classList.add('error');
        }
        else
        {
          l.classList.remove("error");
        l.classList.add('noError');
        }
      }
      function pinValidation()
      {
        var l=document.getElementById('pin');
        var p=document.forms['studentForm']['pin'].value;
       l.classList.remove("error");
        
        
        if(p.length!=6)
        {
          l.classList.remove("noError");

          l.classList.add('error');
        }
        else
        {
          l.classList.remove("error");
        l.classList.add('noError');
        }

      }
      
        function fun() {
 alert('Modification Successful');
}
      
  
    
    </script>
    </ion-app>

    
  </body>
</html>
<?php
if($_POST){

   

    $connect=@mysqli_connect("localhost","root","mysql","student_details");
   
$admin=$_POST['admin'];
$name=$_POST['name'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$dob=$_POST['dob'];
$aadhar=$_POST['aadhar'];
$passport=$_POST['passport'];
$gender=$_POST['gen'];
$h_no=$_POST['H_no'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$pin=$_POST['pin'];
$phone=$_POST['phone'];
$email=$_POST['email'];



$q="UPDATE `student` SET `admin_no`='$admin',`name`='$name',`fname`='$fname',`mname`='$mname',`dob`='$dob',`aadhar`='$aadhar',`passport`='$passport',`gender`='$gender',`h_no`='$h_no',`street`='$street',`city`='$city',`state`='$state',`country`='$country',`pin`='$pin',`phone`='$phone',`email`='$email' WHERE `admin_no`=$admin";

$result=mysqli_query($connect,$q);
if($result)
{
  echo "<script type='text/javascript'>
  fun();</script>";
}



}

