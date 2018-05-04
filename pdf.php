<?php
session_start();
require('fpdf/fpdf.php');
$server = 'localhost';
$user= 'root';
$password= '';
$database_name='canteen';
$i=0;
$conn= mysqli_connect($server,$user,$password,$database_name);
if(!$conn){
	
	
	die("cannot connect");
}
$userid=$_SESSION['idnum'];


class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial','B',25);

		
		//dummy cell to put logo
		$this->Image('logo.jpg',10,13,40);
		//is equivalent to:
		$this->Cell(60);
		
		//put logo
		
		
		$this->Cell(100,18,'Order History',20,10);
		 $this->Cell(80);
		 
		
		//dummy cell to give line spacing
		
		//is equivalent to:
		$this->Ln(5);
		
		$this->SetFont('Arial','B',13);
		
		$this->SetFillColor(20,200,100);
		$this->SetDrawColor(10,10,30);
		$this->Cell(50,10,'Time',1,0,'',true);
		$this->Cell(30,10,'User Name',1,0,'',true);
		$this->Cell(30,10,'Food',1,0,'',true);
		$this->Cell(20,10,'Quantity',1,0,'',true);
		$this->Cell(40,10,'Amount',1,0,'',true);
		$this->Cell(20,10,'Stall',1,1,'',true);
		$this->SetFont('Arial','B',25);

		
	}
	function Footer(){
		//add table's bottom line
		$this->Cell(190,0,'','T',1,'',true);
		
		//Go to 1.5 cm from bottom
		$this->SetY(-15);
				
		$this->SetFont('Arial','',8);
		
		//width = 0 means the cell is extended up to the right margin
		$this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');
	}
}


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF('P','mm','A4'); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(10,10,30);

$query=mysqli_query($conn,"select * from history WHERE userid='$userid'");
while($data=mysqli_fetch_array($query)){
	$pdf->Cell(50,5,$data['time'],'LR',0);
	$pdf->Cell(30,5,$data['username'],'LR',0);
	$pdf->Cell(30,5,$data['food'],'LR',0);
	$pdf->Cell(20,5,$data['quantity'],'LR',0);
	$pdf->Cell(40,5,$data['amount'],'LR',0);
	$pdf->Cell(20,5,'SCR','LR',1);
}











$pdf->Output();
?>
