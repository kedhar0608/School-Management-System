<?php
session_start();
$admin=$_SESSION["admin"];
$q="select *from fee_statement where admin_no='$admin'";
$connect=@mysqli_connect("localhost","root","mysql","fee_details");
$result=mysqli_query($connect,$q);
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
require('./fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetDrawColor(23,23,23);
$pdf->Line(10,46,190,46);
$pdf->Line(10,53,190,53);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,3,'');$pdf->Cell(40,3,'');
$pdf->Cell(40,3,' Studnet Fee Statement');

$pdf->ln(7);
$pdf->Cell(47,3,"Admin No");
$pdf->Cell(47,3,"$admin");
$pdf->ln(7);
$pdf->Cell(47,3,"Name");
$pdf->Cell(47,3,"$name");
$pdf->ln(7);
$pdf->Cell(47,3,"Section");
$pdf->Cell(47,3,"$section");
$pdf->ln(7);
$pdf->Cell(47,3,"Class");
$pdf->Cell(47,3,"$class");
$pdf->ln(10);

$pdf->SetTextColor(120,20,20);
$pdf->Cell(47,3,"Date");
$pdf->Cell(47,3,"Credit");
$pdf->Cell(47,3,"Debit");
$pdf->Cell(47,3,"Due");
$pdf->ln(9);
$pdf->SetTextColor(20,20,20);


while($row=mysqli_fetch_array($result))
{

   
$credit=$row['credit'];
$debit=$row['debit'];
$due=$row['due'];
$date=$row['date'];
$pdf->SetFont('Arial','',12);
$pdf->Cell(47,3,"$date");
$pdf->Cell(47,3,"$credit");
$pdf->Cell(47,3,"$debit");
$pdf->Cell(47,3,"$due");
$pdf->ln(7);
}

$pdf->output();



?>