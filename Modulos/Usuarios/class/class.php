<?php
class Proceso_Usuario{
	var $doc;	var $nom;	var $ape;	var $fecha;	var $tel;	var $cel;
	var $sexo;	var $dir;	var $nota;	var $fechar;	var $estado;	var $correo;	
	var $con;	var $tipo;	var $deposito;
	
	function __construct($doc,$nom,$ape,$fecha,$tel,$cel,$sexo,$dir,$nota,$fechar,$estado,$correo,$con,$tipo,$deposito){
		$this->doc=$doc;	$this->nom=$nom;	$this->ape=$ape;	$this->fecha=$fecha; 	$this->tel=$tel;		$this->cel=$cel;
		$this->sexo=$sexo;	$this->dir=$dir;	$this->nota=$nota;	$this->fechar=$fechar;	$this->estado=$estado;	$this->correo=$correo;	
		$this->con=$con;	$this->tipo=$tipo;	$this->deposito=$deposito;
	}
	
	function crear(){
		$doc=$this->doc;	$nom=$this->nom;	$ape=$this->ape;	$fecha=$this->fecha;	$tel=$this->tel;	$cel=$this->cel;
		$sexo=$this->sexo;	$dir=$this->dir;	$nota=$this->nota;	$fechar=$this->fechar;	$estado=$this->estado;	$correo=$this->correo;	
		$con=$this->con;	$tipo=$this->tipo;	$deposito=$this->deposito;
		
		mysql_query("INSERT INTO username (usu, con, doc, nom, ape, tel, cel, sexo, dir, nota, fechar, estado, correo, fecha, tipo) VALUES ('$doc','$con','$doc','$nom','$ape','$tel','$cel','$sexo','$dir','$nota','$fechar','$estado','$correo','$fecha','$tipo')");
		mysql_query("INSERT INTO cajero (usu, deposito) VALUES ('$doc','$deposito')");
	}
	
	function actualizar(){
		$doc=$this->doc;	$nom=$this->nom;	$ape=$this->ape;	$fecha=$this->fecha;	$tel=$this->tel;		$cel=$this->cel;
		$sexo=$this->sexo;	$dir=$this->dir;	$nota=$this->nota;	$fechar=$this->fechar;	$estado=$this->estado;	$correo=$this->correo;	
		$con=$this->con;	$tipo=$this->tipo;	$deposito=$this->deposito;
		
		mysql_query("UPDATE username SET nom='$nom', ape='$ape', tel='$tel', cel='$cel', sexo='$sexo', dir='$dir', nota='$nota', estado='$estado', correo='$correo', fecha='$fecha', tipo='$tipo' WHERE doc='$doc'");
		mysql_query("UPDATE cajero SET deposito='$deposito' WHERE usu='$doc'");
	}
}
?>