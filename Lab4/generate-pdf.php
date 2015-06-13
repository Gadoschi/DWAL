<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Menu',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

$pretraga = $_POST['pretraga'];

//Connect to database
mysql_connect('localhost','root','123');
mysql_select_db('baza');

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table("SELECT * FROM menu WHERE tip = '$pretraga' ORDER BY id DESC");

$pdf->Output();
?>