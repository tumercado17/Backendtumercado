<?php
require_once("../logica/sesiones.php");
ob_start();
require_once('../clases/Persona.php');
require_once('../logica/funciones.php');
require_once('fpdf.php');
ob_end_clean();

//Establece la conexi�n con la base de datos
//Realiza la consulta
$conex=conectar();
$sql ="select idadministrador,ci,nombre,apellido,email,pais,contrasena,calle,numero,cipersona,telefono,grado from persona,telefonopersona,administrador
      where (persona.ci=telefonopersona.cipersona) and (persona.ci=administrador.ciadministrador);";
$result=$conex->prepare($sql);
$result->execute();
$resultados=$result->fetchAll();

//Cerrar la conexi�n con la base de datos
desconectar($conex);

if (empty($resultados))
{
	$a=Mensaje("No hay Datos para listar");
	return;
}


class PDF extends FPDF{

	//Cabecera de p�gina
	function Header()
	{
	  $titulo='Listado de Usuarios de Frontend';
    $Cabezal='Tu Mercado Backend';
    //logo
    $this->Image('../imagenes/logoadmin.png',20,5,50,40,'','');
     //Arial bold 15
    $this->SetFont('Arial','U',12);
    // obtener el ancho del string con el tipo de letra actual
    $Ancho=strlen($titulo)+12;
    $this->SetXY(30,40);
    //Calcular la posici�n del t�tulo
    $this->SetX((210-$Ancho)/2);
    //T�tulo    w       h  Texto  border

    $this->Cell($Ancho,5,$Cabezal,0,0,'C');
    $this->Ln();
    $this->Ln();
    $this->SetFont('Arial','U',9);
    $this->SetX((210-$Ancho)/2);
    $this->Cell($Ancho,5,$titulo,0,0,'C');
    //Salto de l�nea
    $this->Ln(15);
    $this->SetFont('Arial','BI',12);

		$this->SetFont('Arial','BI',8);
		// function Cell(w,h,txt,borde,ln,alineacion,llenado,link)
		$this->cell(10,4,'Ci',1,0,'L');
		$this->cell(55,4,'Nombre',1,0,'L');
		$this->cell(25,4,'Apellido',1,0,'L');
		$this->cell(30,4,'Email',1,0,'L');
		$this->cell(30,4,'Pais',1,0,'L');
		$this->cell(40,4,'Calificacion',1,0,'L');
		$this->Ln();

	}//end function Header

	//Pie de p�gina
	function Footer()
	{
		//Posici�n: a 1,5 cm del final
		$this->SetY(-15);
		//Arial italic 10
		$this->SetFont('Arial','I',10);
		//N�mero de p�gina
		$this->Cell(0,5,'P�gina N� '.$this->PageNo().' de {nb}',0,0,'C');

	} // end function Footer

	//Tabla
	function Tabla($datos){
		// desplegar los datos
		foreach ($datos as $fila)
		{
			// desplegar los datos

			// Arial Bold Italic de 8
			$this->SetFont('Arial','I',8);
			// function Cell(w,h,txt,borde,ln,alineacion,llenado,link)
			$this->cell(10,4,trim($fila[0]),1,0,'L');
			$this->cell(55,4,substr(trim($fila[1]),0,30),1,0,'L');
			$this->cell(25,4,trim($fila[2]),1,0,'L');
			$this->cell(30,4,trim($fila[3]),1,0,'L');
			$this->cell(30,4,trim($fila[5]),1,0,'L');
			$this->cell(40,4,trim($fila[6]),1,0,'L');
			$this->Ln();

		} //endfor
	} // end function Tabla


}

//Creaci�n del objeto de la clase heredada

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Tabla($resultados);
$pdf->Output();
?>
