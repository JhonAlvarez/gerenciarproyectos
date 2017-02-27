<?php
class Proceso_Proyecto{
	var $cod_proyecto;
	var $objetivoproyecto;
	var $municipio1;
	var $municipio2;	
	var $estadodelproyecto;
	var $supervisor;
	var $estrategia;
	var $sectordeinversion;
	var $subsector;
	var $enteejecutor;


	function __construct($cod_proyecto, $objetivoproyecto, $municipio1, $municipio2, $estadodelproyecto, $supervisor, $estrategia, $sectordeinversion, $subsector, $enteejecutor){

		$this->cod_proyecto=$cod_proyecto;
		$this->objetivoproyecto=$objetivoproyecto;
		$this->municipio1=$municipio1;
		$this->municipio2=$municipio2;
		$this->estadodelproyecto=$estadodelproyecto;
		$this->supervisor=$supervisor;
		$this->estrategia=$estrategia;
		$this->sectordeinversion=$sectordeinversion;
		$this->subsector=$subsector;
		$this->enteejecutor=$enteejecutor;
	}
	
	function crear(){

		$cod_proyecto=$this->cod_proyecto;
		$objetivoproyecto=$this->objetivoproyecto;
		$municipio1=$this->municipio1;
		$municipio2=$this->municipio2;
		$estadodelproyecto=$this->estadodelproyecto;
		$supervisor=$this->supervisor;
		$estrategia=$this->estrategia;
		$sectordeinversion=$this->sectordeinversion;
		$subsector=$this->subsector;
		$enteejecutor=$this->enteejecutor;

		mysql_query("INSERT INTO proyectos (cod_proyecto, objetivoproyecto, municipio1, municipio2, estadodelproyecto, supervisor, estrategia, sectordeinversion, subsector, enteejecutor) VALUES ('$cod_proyecto','$objetivoproyecto','$municipio1','$municipio2','$estadodelproyecto','$supervisor','$estrategia','$sectordeinversion','$subsector','$enteejecutor')");
	}
	
	function actualizar(){

		$cod_proyecto=$this->cod_proyecto;
		$objetivoproyecto=$this->objetivoproyecto;
		$municipio1=$this->municipio1;
		$municipio2=$this->municipio2;
		$estadodelproyecto=$this->estadodelproyecto;
		$supervisor=$this->supervisor;
		$estrategia=$this->estrategia;
		$sectordeinversion=$this->sectordeinversion;
		$subsector=$this->subsector;
		$enteejecutor=$this->enteejecutor;
	
		mysql_query("UPDATE proyectos SET objetivoproyecto='$objetivoproyecto', municipio1='$municipio1', municipio2='$municipio2', estadodelproyecto='$estadodelproyecto', supervisor='$supervisor', estrategia='$estrategia', sectordeinversion='$sectordeinversion', subsector='$subsector', enteejecutor='$enteejecutor' WHERE cod_proyecto='$cod_proyecto'");
	}
}

class Proceso_Contenido{
	var $id;			var $deposito;		var $cant;			var $minima;		var $producto;
	
	function __construct($id, $deposito, $cant, $minima, $producto){
		$this->id=$id;		$this->deposito=$deposito;		$this->cant=$cant;		$this->minima=$minima;		$this->producto=$producto;
	}
	
	function crear(){
		$id=$this->id;		$deposito=$this->deposito;		$cant=$this->cant;		$minima=$this->minima;		$producto=$this->producto;	
		mysql_query("INSERT INTO contenido (deposito, producto, cant, minima) VALUES ('$deposito','$producto','$cant','$minima')");
	}
	
	function actualizar(){
		$id=$this->id;		$deposito=$this->deposito;		$cant=$this->cant;		$minima=$this->minima;		$producto=$this->producto;	
		mysql_query("UPDATE contenido SET cant='$cant', minima='$minima' WHERE id='$id'");
	}
}
class Proceso_Producto{
	var $codigo;       	var $nombre;      	var $depart;   		var $unidad;		var $defecto;  
	var $ivacompra;		var $ivaventa;		var $costo_prov;	var $ocosto_prov;
	var $a_venta;		var $b_venta;		var $c_venta;		var $d_venta;
	var $a_costo;		var $b_costo;		var $c_costo;		var $d_costo;
	
	function __construct($codigo, $nombre, $depart, $unidad, $defecto, $ivacompra, $ivaventa, $costo_prov, $ocosto_prov, $a_venta, $b_venta, $c_venta, $d_venta, $a_costo, $b_costo, $c_costo, $d_costo){
		
		$this->codigo=$codigo;			$this->nombre=$nombre;		$this->depart=$depart;			$this->unidad=$unidad;	$this->defecto=$defecto;
		$this->ivacompra=$ivacompra;	$this->ivaventa=$ivaventa;	$this->costo_prov=$costo_prov;	$this->ocosto_prov=$ocosto_prov;		
		$this->a_venta=$a_venta;		$this->b_venta=$b_venta;	$this->c_venta=$c_venta;		$this->d_venta=$d_venta;
		$this->a_costo=$a_costo;		$this->b_costo=$b_costo;	$this->c_costo=$c_costo;		$this->d_costo=$d_costo;		      
	}
	
	function crear(){
		$codigo=$this->codigo;			$nombre=$this->nombre;		$depart=$this->depart;			$unidad=$this->unidad;	$defecto=$this->defecto;
		$ivacompra=$this->ivacompra;	$ivaventa=$this->ivaventa;	$costo_prov=$this->costo_prov;	$ocosto_prov=$this->ocosto_prov;
		$a_venta=$this->a_venta;		$b_venta=$this->b_venta;	$c_venta=$this->c_venta;		$d_venta=$this->d_venta;
		$a_costo=$this->a_costo;		$b_costo=$this->b_costo;	$c_costo=$this->c_costo;		$d_costo=$this->d_costo;
		
		mysql_query("INSERT INTO producto 
		(codigo, nombre, depart, unidad, defecto, ivacompra, ivaventa, costo_prov, ocosto_prov, a_venta, b_venta, c_venta, d_venta, a_costo, b_costo, c_costo, d_costo) VALUES ('$codigo','$nombre','$depart','$unidad','$defecto','$ivacompra','$ivaventa','$costo_prov','$ocosto_prov','$a_venta','$b_venta','$c_venta','$d_venta','$a_costo','$b_costo','$c_costo','$d_costo')");
	}
	function actualizar(){
		$codigo=$this->codigo;			$nombre=$this->nombre;		$depart=$this->depart;			$unidad=$this->unidad;	$defecto=$this->defecto;
		$ivacompra=$this->ivacompra;	$ivaventa=$this->ivaventa;	$costo_prov=$this->costo_prov;	$ocosto_prov=$this->ocosto_prov;
		$a_venta=$this->a_venta;		$b_venta=$this->b_venta;	$c_venta=$this->c_venta;		$d_venta=$this->d_venta;
		$a_costo=$this->a_costo;		$b_costo=$this->b_costo;	$c_costo=$this->c_costo;		$d_costo=$this->d_costo;
		mysql_query("UPDATE producto SET nombre='$nombre', 
										depart='$depart',
										unidad='$unidad',
										defecto='$defecto',
										ivacompra='$ivacompra',
										ivaventa='$ivaventa',
										costo_prov='$costo_prov',
										ocosto_prov='$ocosto_prov',
										a_venta='$a_venta',
										b_venta='$b_venta',
										c_venta='$c_venta',
										d_venta='$d_venta',
										a_costo='$a_costo',
										b_costo='$b_costo',
										c_costo='$c_costo',
										d_costo='$d_costo'
								WHERE codigo='$codigo'");		
	}
}

?>