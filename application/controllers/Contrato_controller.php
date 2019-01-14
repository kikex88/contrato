<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contrato_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Contrato_model','contrato');
	}

	public function index()
	{
		$datos['datos'] = $this->contrato->clientes_listado();
		$this->load->view('contrato_view',$datos);
	}

	//función para mostrar la vista para agregar cliente
	public function vista_agregar_cliente()
	{
		$this->load->view('agregar_cliente_view');
	}

	#función para agregar cliente
	public function agregar_cliente()
	{
		$nombre = $this->input->post('nombre_cli');
		$apellido = $this->input->post('apellido_cli');
		$direccion = $this->input->post('direccion_cli');
		

		$resultado = $this->contrato->agregar_cliente($nombre,$apellido,$direccion);
		if($resultado)
		{
			# exito al ingresar los datos
			$this->session->set_flashdata('exito_agregar','usuario agregado con exito');
			redirect(base_url('agregar-cliente'));
		}
		else{
			# si ocurre un erro al ingresar los datos
			$this->session->set_flashdata('error_agregar','usuario agregado con exito');
			redirect(base_url('agregar-cliente'));
		}
	}

	#función para ver agregar detalle
	public function vista_agregar_servicio($id)
	{
		$dato['id']=$id;
		$this->load->view('agregar_servicio_view',$dato);
	}

	public function agregar_servicio()
	{
		$id_cli = $this->input->post('id');
		$nombre = $this->input->post('nombre_ser');
		$precio = $this->input->post('precio_ser');
		$fecha = $this->input->post('fecha_ser');
		$descuento = $this->input->post('descuento_ser');

		#insertamos el servicio
		$id_ser = $this->contrato->agregar_servicio($nombre,$precio,$fecha,$descuento);

		if($id_ser != false)
		{
			#vamos a insertar en detalle y le mandamos los dos id
			$resultado = $this->contrato->agregar_detalle($id_cli,$id_ser);
		}
	}
}

