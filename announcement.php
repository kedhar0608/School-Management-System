<?php
if($_POST)
{
    $heading=$_POST['heading'];
    $announcement=$_POST['announcement'];
    $date=date('d-m-y');
    

    $connect=@mysqli_connect("localhost","root","mysql","student_details");
    $q="INSERT INTO `announcements` ( `announcement`, `date`, `heading`, `department`) VALUES ('$announcement', '$date', '$heading','Principal Office')";
    mysqli_query($connect,$q);
    echo "Announcement made successfully";
    header("location:adminDashboard.php");

    
}
?>