<?php
include '../../config/connection.php';
require_once('./fpdf/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(200, 10, 'BOOKS COLLECTION', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(30, 7, 'ISBN', 1, 0, 'C');
$pdf->Cell(75, 7, 'TITLE', 1, 0, 'C');
$pdf->Cell(30, 7, 'PRICE', 1, 0, 'C');
$pdf->Cell(40, 7, 'AUTHOR', 1, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);

$no = 1;
$data = mysqli_query($con, "SELECT b.isbn AS isbn, b.title AS title, b.price AS price, CONCAT(a.first_name, ' ', a.last_name) AS author FROM books AS b JOIN authors AS a ON b.fk_author_id = a.id ORDER BY b.id DESC;");
while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(30, 6, $d['isbn'], 1, 0);
    $pdf->Cell(75, 6, $d['title'], 1, 0);
    $pdf->Cell(30, 6, 'USD ' . $d['price'], 1, 0);
    $pdf->Cell(40, 6, $d['author'], 1, 1);
}

$pdf->Output();
