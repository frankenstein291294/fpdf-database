<?php

require ('./fpdf/fpdf.php');

$data = json_decode( $_POST['data'] );


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Nombre: ' . iconv( 'UTF-8', 'windows-1252', $data->name ), 0, 2);
$pdf->Cell(40, 10, 'Descripcion: '. iconv( 'UTF-8', 'windows-1252', $data->description ), 0, 2);
$pdf->Cell(40, 10, 'Imagen: ', 0, 2);
$pdf->Image( $data->img, null, null, 150 );

$pdf->Output('D');
