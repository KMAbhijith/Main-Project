<?Php
include('connect.php');
require('../../../fpdf184/fpdf.php');


// Instanciation of inherited class
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$bookid = $_GET['bid'];
$pid = $_GET['pid'];
$sel = mysqli_query($con, "select * from priscription p,booking b,medicine m where m.Medi_id=p.Medi_id and p.B_id=$bookid  and  b.B_id=$bookid  and b.P_id=$pid and b.D_id=b.D_id");

$detail = mysqli_query($con, "select * from booking b,patient p,doctor d ,schedule s where d.D_id=b.D_id and p.P_id=$pid and b.P_id=$pid and b.B_id=$bookid and b.S_id=s.S_id");
$ft = mysqli_fetch_assoc($detail);
$pdf->Cell(0, 10, 'Patients Name :' . $ft['P_name'], 0, 1, 'C'); // First header column 
$pdf->Cell(0, 10,  'Doctors Name :' . $ft['D_name'], 0, 2, 'C'); // Second header column
$pdf->Cell(0, 10,  'Date :' . $ft['W_day'], 0, 3, 'C'); // Third header column 

$width_cell = array(10, 20, 30);
// Background color of header 
// Header starts /// 

$pdf->Cell($width_cell[0], 10, 'Medicine', 0, 1, 'C', true); // First header column 
$pdf->Cell($width_cell[1], 10, 'Dosage', 0, 1, 'C', true); // Second header column
$pdf->Cell($width_cell[2], 10, 'Quantity', 0, 1, 'C', true); // Third header column 

//// header is over ///////


// First row of data 
while ($result = mysqli_fetch_array($sel)) {
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell($width_cell[0], 10, $result['Med_name'], 0, 1, 'C', false); // First column of row 1 
    $pdf->Cell($width_cell[1], 10, $result['meddose'], 0, 1, 'C', false); // Second column of row 1 
    $pdf->Cell($width_cell[2], 10, $result['medqty'], 0, 1, 'C', false); // Third column of row 1 
}

$pdf->Output('my_file.pdf', 'I');
