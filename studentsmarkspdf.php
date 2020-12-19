<?php
session_start();
$admin=$_SESSION["admin"];
$q="select *from marks where admin_no='$admin'";
#reading storing academic details of student
$connect5=@mysqli_connect("localhost","root","mysql","student_details");
$q5="select *from academic_details where admin_no='$admin'";
$result5=mysqli_query($connect5,$q5);
while($row=mysqli_fetch_array($result5))
{
    
  $section=$row['section'];
  $class=$row['course'];
  $name=$row['name'];
}

$result=mysqli_query($connect5,$q); 
require('./fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetDrawColor(23,23,23);
$pdf->Line(10,46,190,46);
$pdf->Line(10,53,190,53);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,3,'');$pdf->Cell(40,3,'');
$pdf->Cell(40,3,' Studnet Marks Report');

$pdf->ln(7);
$pdf->Cell(25,3,"Admin No");
$pdf->Cell(25,3,"$admin");
$pdf->ln(7);
$pdf->Cell(25,3,"Name");
$pdf->Cell(25,3,"$name");
$pdf->ln(7);
$pdf->Cell(25,3,"Section");
$pdf->Cell(25,3,"$section");
$pdf->ln(7);
$pdf->Cell(25,3,"Class");
$pdf->Cell(25,3,"$class");
$pdf->ln(10);

$pdf->SetTextColor(120,20,20);


$pdf->Cell(25,3,"Exam");
$pdf->Cell(25,3,"Subject");
$pdf->Cell(25,3,"Score");
$pdf->Cell(25,3,"Total");
$pdf->Cell(25,3,"Topic");
$pdf->Cell(25,3,"Percentage",0,0,'R');
$pdf->ln(9);
$pdf->SetTextColor(20,20,20);


while($row=mysqli_fetch_array($result))
{  
 
$subject=$row['subject'];
$exam=$row['exam'];
$marksObt=$row['marks_obtained'];
$totalMarks=$row['total_marks'];
$topic=$row['topic'];
$percentage=$marksObt/$totalMarks*100;


$pdf->SetFont('Arial','',12);


$pdf->Cell(25,3,"$exam");
$pdf->Cell(25,3,"$subject");
$pdf->Cell(25,3,"$marksObt");
$pdf->Cell(25,3,"$totalMarks");
$pdf->Cell(25,3,"$topic");
$pdf->Cell(25,3,"$percentage",0,0,'R');
$pdf->ln(7);
}

$pdf->output();



?>