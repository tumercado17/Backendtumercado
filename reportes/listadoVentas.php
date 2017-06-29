<?php

require_once("../logica/sesiones.php");
require_once('../clases/Persona.php');
require_once('../logica/funciones.php');
require_once('fpdf.php');

/*
select id,cipersona,nombre,apellido,email,nombrepubli,descripcion,categoria,stock,tipo
from publicacion,persona,permuta,subasta,vendecompra
where cipersona=ci group by id order by ci;

class PDF extends FPDF{

function getSales(){

	$conex=conectar();
	$sql ="select id,cipersona,nombre,apellido,email,nombrepubli,descripcion,categoria,stock,tipo
				 from publicacion,persona,permuta,subasta,vendecompra where cipersona=ci group by id order by ci;";
	$result=$conex->prepare($sql);
	$result->execute();
	$resultados=$result->fetchAll();

	for ($i=0;$i<count($resultados);$i++) {

		$pdf->Cell(40,10,'venta numero: ' . $resultado[$i]['id'] . ' .');
		$pdf->Ln();
		$pdf->Cell(40,10,'ci: ' . $resultado[$i]['cipersona'] . ' .');
		$pdf->Ln();
		$pdf->Cell(40,10,'Lugar: ' . $resultado[$i]['nombre'] . ' .');
		$pdf->Ln();
		$pdf->Cell(40,10,'Sector: ' . $resultado[$i]['apellido'] . ' .');
		$pdf->Ln();
		$pdf->Cell(40,10,'Numero de asiento ' . $resultado[$i]['email'] . ' .');
		$pdf->Ln();

}
}
}

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Output();
checkSession();
getSales();

*/
$conex=conectar();
$sql ="select id,cipersona,nombre,apellido,email,nombrepubli,descripcion,categoria,stock,tipo
			 from publicacion,persona,permuta,subasta,vendecompra where cipersona=ci group by id order by ci;";
$result=$conex->prepare($sql);
$result->execute();
$resultados=$result->fetchAll();

class PDF extends FPDF{

function Footer(){
$this->SetY(-10);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

//Creación del objeto de la clase heredada
//$pdf=new PDF();
//$pdf->AddPage();
//$pdf->SetFont('Times','',12);
//Aquí escribimos lo que deseamos mostrar

$pdf->Cell(50,5,$resultado['ci'],1,0,'C');
$pdf->Cell(50,5,$resultado['nombres'],1,0,'C');
$pdf->Cell(50,5,$resultado['telf_movil'],1,0,'C');
$pdf->Cell(50,5,$resultado['email'],1,0,'C');
$pdf->Cell(50,5,$resultado['direccion'],1,0,'C');
}


$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Output();

?>
