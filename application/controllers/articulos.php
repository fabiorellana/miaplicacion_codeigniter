<?php
class Articulos extends CI_Controller{

	function index(){
		//Cargo el helper de la url, con funciones para trabajo con sitio url
		$this->load->helper('url');

		//Cargo el modelo de articulos
		$this->load->model('Articulo_model');

		//Pido los ultimos articulos al modelo
		$ultimosArticulos = $this->Articulo_model->dame_ultimos_articulos();

		//Creo el array con datos de configuracion para la vista
		$datos_vista = array('rs_articulos' => $ultimosArticulos);

		//Cargo la vista pasando los datos de configuración
		$datos_plantilla["cuerpo"] = $this->load->view('listado_articulos', $datos_vista, true);
		$datos_plantilla["titulo"] = "Portada de aplicación de artículos";

		$this->load->view('plantilla_articulo', $datos_plantilla);
	}

	function muestra($id){
		//Cargo el helper de la url, con funciones para trabajo con sitio url
		$this->load->helper('url');

		//Cargo el modelo de articulos
		$this->load->model('Articulo_model');

		//Pido al modelo el articulo que desea ver
		$arrayArticulo = $this->Articulo_model->dame_articulo($id);

		//Comprobar si se ha recibido un articulo
		if(!$arrayArticulo){
			//no ha recibido ningun articulo
			show_404();
		}else{
			//he encontrado un artículo
			$datos_plantilla["cuerpo"] = $this->load->view('cuerpo_articulo', $arrayArticulo, true);
			$datos_plantilla["titulo"] = $arrayArticulo["titulo"];

			$this->load->view('plantilla_articulo', $datos_plantilla);
		}
	}
}  
?>