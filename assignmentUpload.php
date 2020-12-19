<?php
session_start();
$fid=$_SESSION['user'];
$fName=$_SESSION['Name'];
echo "<script type='module' src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js'></script>";
echo "<script nomodule src='https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js'> </script>";
echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css'/>";

$connect=@mysqli_connect("localhost","root","mysql","student_details");

if (isset($_POST)) { // if save button on the form is clicked
    // name of the uploaded file
    $section=$_POST['class'];
    $subject=$_POST['subject'];
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 6000000) { // file shouldn't be larger than 1Megabyte
        echo "<ion-item color='danger'>File too large! must be less than 6MB </ion-item>";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO `assignments` (`name`, `size`, `path`, `downloads`, `section`, `subject`,`fid`,`faculty_name`) VALUES ('$filename', '$size', '$destination', '0', '$section', '$subject','$fid','$fName');";
            if (mysqli_query($connect, $sql)) {
                echo "<ion-item color='primary'>File uploaded successfully</ion-item>";
            }
            else
            {
                echo "<ion-item color='danger'>File has been   already uploaded </ion-item>"; 
                echo "$fid,$fName";
            }
           
        } else {
            echo "<ion-item color='danger'>Failed to upload file.</ion-item>";
        }
    }
}
?>