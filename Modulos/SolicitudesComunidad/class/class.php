<?php
class Proceso_Solicitud{
	var $cod_radicado;
	var $fecha_solicitud;
	var $cod_radicado_gobernacion;
	var $contestada;
	var $cod_municipio;
	var $asunto_solicitud;
	var $sector;
	var $remitido;
	var $nombrepeticionario;
	var $cargopeticionario;
	var $telefono;
	var $direccion;
	var $barrio;
	var $email;
	var $radicadorespuesta;
	var $entregarespuesta;
	var $observaciones;
	

	function __construct($cod_radicado, $fecha_solicitud, $cod_radicado_gobernacion, $contestada, $cod_municipio, $asunto_solicitud, $sector, $remitido, $nombrepeticionario, $cargopeticionario, $telefono, $direccion, $barrio, $email, $radicadorespuesta, $entregarespuesta, $observaciones){
		$this->cod_radicado=$cod_radicado;
		$this->fecha_solicitud=$fecha_solicitud;
		$this->cod_radicado_gobernacion=$cod_radicado_gobernacion;
		$this->contestada=$contestada;
		$this->cod_municipio=$cod_municipio;
		$this->asunto_solicitud=$asunto_solicitud;
		$this->sector=$sector;
		$this->remitido=$remitido;
		$this->nombrepeticionario=$nombrepeticionario;
		$this->cargopeticionario=$cargopeticionario;
		$this->telefono=$telefono;
		$this->direccion=$direccion;
		$this->barrio=$barrio;
		$this->email=$email;
		$this->radicadorespuesta=$radicadorespuesta;
		$this->entregarespuesta=$entregarespuesta;
		$this->observaciones=$observaciones;
	}
	
	function crear(){
		$cod_radicado=$this->cod_radicado;
		$fecha_solicitud=$this->fecha_solicitud;
		$cod_radicado_gobernacion=$this->cod_radicado_gobernacion;
		$contestada=$this->contestada;
		$cod_municipio=$this->cod_municipio;
		$asunto_solicitud=$this->asunto_solicitud;
		$sector=$this->sector;
		$remitido=$this->remitido;
		$nombrepeticionario=$this->nombrepeticionario;
		$cargopeticionario=$this->cargopeticionario;
		$telefono=$this->telefono;
		$direccion=$this->direccion;
		$barrio=$this->barrio;
		$email=$this->email;
		$radicadorespuesta=$this->radicadorespuesta;
		$entregarespuesta=$this->entregarespuesta;
		$observaciones=$this->observaciones;

		mysql_query("INSERT INTO solicitudescomunidad (cod_radicado, fecha_solicitud, cod_radicado_gobernacion, contestada, cod_municipio, asunto_solicitud, sector, remitido, nombrepeticionario, cargopeticionario, telefono, direccion, barrio, email, radicadorespuesta, entregarespuesta, observaciones) VALUES ('$cod_radicado','$fecha_solicitud','$cod_radicado_gobernacion','$contestada','$cod_municipio','$asunto_solicitud','$sector','$remitido','$nombrepeticionario','$cargopeticionario','$telefono','$direccion','$barrio','$email','$radicadorespuesta','$entregarespuesta','$observaciones')");
	}
	
	function actualizar(){
		$cod_radicado=$this->cod_radicado;
		$fecha_solicitud=$this->fecha_solicitud;
		$cod_radicado_gobernacion=$this->cod_radicado_gobernacion;
		$contestada=$this->contestada;
		$cod_municipio=$this->cod_municipio;
		$asunto_solicitud=$this->asunto_solicitud;
		$sector=$this->sector;
		$remitido=$this->remitido;
		$nombrepeticionario=$this->nombrepeticionario;
		$cargopeticionario=$this->cargopeticionario;
		$telefono=$this->telefono;
		$direccion=$this->direccion;
		$barrio=$this->barrio;
		$email=$this->email;
		$radicadorespuesta=$this->radicadorespuesta;
		$entregarespuesta=$this->entregarespuesta;
		$observaciones=$this->observaciones;

		mysql_query("UPDATE solicitudescomunidad SET fecha_solicitud='$fecha_solicitud', cod_radicado_gobernacion='$cod_radicado_gobernacion', contestada='$contestada', cod_municipio='$cod_municipio', asunto_solicitud='$asunto_solicitud', sector='$sector', remitido='$remitido', nombrepeticionario='$nombrepeticionario', cargopeticionario='$cargopeticionario', telefono='$telefono', direccion='$direccion', barrio='$barrio', email='$email', radicadorespuesta='$radicadorespuesta', entregarespuesta='$entregarespuesta', observaciones='$observaciones' WHERE cod_radicado='$cod_radicado'");
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