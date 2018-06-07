<?php
require '../admin/lib/php/PgConnect.php';
require '../admin/lib/php/classes/Connexion.class.php';
require '../admin/lib/php/classes/Produit.class.php';
require '../admin/lib/php/classes/ProduitDB.class.php';
$cnx = Connexion :: getInstance($dsn, $user, $pass);
$produit = new ProduitDB($cnx);
$listeProduit = $produit->getProduit();
$nbr = count($listeProduit);
//var_dump($listeProduit);

require('../admin/lib/php/fpdf181/fpdf.php');

$pdf = new FPDF('P','cm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->SetX(3);
$pdf->SetTextColor(220,10,100);
$pdf->SetDrawColor(220,10,100);
$pdf->Cell(16,2,utf8_decode('Nos Produits'),1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$y=3;$x=3;

for($i=0;$i<$nbr;$i++){
    $pdf->SetXY($x,$y);
    $pdf->Cell(5,3.5,utf8_encode($listeProduit[$i]['nom']),1,0,'L');
    //$pdf->SetX($x);
    //$image='../admin/images/'.$listeProduit[$i]['image'];
    
    $pdf->SetXY($x+8.5,$y);
    $pdf->Cell(7.5,3.5,utf8_encode($listeProduit[$i]['prix']),1,0,'L');
    $y+=2;
}

$pdf->Output();
?>