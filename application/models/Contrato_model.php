<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Contrato_model extends CI_Model
{
	

	#función para traer el listado de clientes
	public function clientes_listado()
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function agregar_cliente($nombre,$apellido,$direccion){
		#llamamos al procedimiento almacenado
		$result = $this->db->query("call sp_insCliente('$nombre', '$apellido', '$direccion')");
		return $result;
	}

	public function agregar_servicio($nombre,$precio,$fecha,$descuento)
	{
		$data = array(
        'nombre_ser' => $nombre,
        'precio_ser' => $precio,
        'fecha_ser' => $fecha,
        'descuento_ser' => $descuento
		);
		$this->db->insert('servicios', $data);
		if($this->db->affected_rows() > 0)
		{
			$query = $this->db->insert_id();
			return $query;
		}
		else{
			return false;
		}
	}

	public function agregar_detalle($id_cli,$id_ser)
	{
		$this->db->set('clientes_id_cli', $id_cli);
		$this->db->set('servicios_id_ser', $id_ser);
		$this->db->insert('detalles');
		if($this->db->affected_rows() > 0)
		{
			$query = $this->db->insert_id();
			return true;
		}
		else{
			return false;
		}
	}
}