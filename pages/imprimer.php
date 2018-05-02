<?php
require '../admin/lib/php/PgConnect.php';
require '../admin/lib/php/classes/Connexion.class.php';
require '../admin/lib/php/classes/Activites.class.php';
require '../admin/lib/php/classes/ActivitesBD.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

$act = new ActivitesBD($cnx);
$tabAct = $act->getListeActivites();
$nbr = count($tabAct);

require('../admin/lib/php/fpdf181/fpdf.php');

$pdf = new FPDF('P','cm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->SetX(3);
$pdf->SetTextColor(220,10,100);
$pdf->SetDrawColor(220,10,100);
$pdf->Cell(16,2,utf8_decode('Nos activités'),1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$y=3;$x=3;

for($i=0;$i<$nbr;$i++){
    $pdf->SetXY($x,$y);// à 3 cm du bord gauche
    $pdf->Cell(5,3.5,utf8_decode($tabAct[$i]->nom_activite),1,0,'L');
    //$pdf->SetX($x);
    $image='../admin/images/'.$tabAct[$i]->image;
    $pdf->Image($image,null,null,3.5,3.5);
    $pdf->SetXY($x+8.5,$y);
    $pdf->Cell(7.5,3.5,utf8_decode($tabAct[$i]->description),1,0,'L');
    $y+=2;
}

$pdf->Output();
