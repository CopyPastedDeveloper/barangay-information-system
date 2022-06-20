<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require_once 'fpdf/fpdf.php';

$sql="SELECT * FROM tblofficial";
$query = $dbh-> prepare($sql);
$query->execute();

if(isset($_POST['pdf_button'])){


      
$pdf = new FPDF('L','mm','A4'); 
$pdf->AddPage();


$left = 20;
$right = 50;
$width_cell=array(10,50,30,60,20,30,30,30);
$pdf->SetFont('Arial','B',11);

//Background color of header//
$pdf->SetFillColor(193,229,252);
$pdf->SetLeftMargin($left);
$pdf->SetRightMargin($right);
// $pdf->SetTopMargin($top);
// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],12,'#',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],12, 'Name',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],12,'Position',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],12,'Chairmanship',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],12,'Status',1,0,'C',true); 
$pdf->Cell($width_cell[5],12,'Contact #',1,0,'C',true); 
$pdf->Cell($width_cell[6],12,'Term Start',1,0,'C',true); 
$pdf->Cell($width_cell[7],12,'Term End',1,1,'C',true); 
//// header ends ///////
$pdf->SetLeftMargin($left);
$pdf->SetRightMargin($right);
$pdf->SetFont('Arial','',11);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($dbh->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['ID'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['Name'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['Position'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['Chairmanship'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['Status'],1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,$row['ContactNumber'],1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,$row['TermStart'],1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,$row['TermEnd'],1,1,'C',$fill);
// to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records /// 

$pdf->Output();
exit;
}


?>