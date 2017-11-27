<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Egeneral_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function configuracion()
	{
		$sql="SELECT * FROM configuracion WHERE id='1' LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row();
	}

	function editarconfiguracion($data,$id)
	{
		$this->db->where('id', '1');
		if($this->db->update('configuracion', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function obtenerOrden($tabla)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->order_by('orden','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->row();
		else return false;
	}

	function obtenerOrdenDos($tabla,$dato,$dato2)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where($dato,$dato2);
		$this->db->order_by('orden','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->row();
		else return false;
	}

	function agregar($tabla, $data)
	{
	$this->db->insert($tabla, $data); 
		return false;
	}

	function editar($tabla,$data,$id)
	{
		$this->db->where('id', $id);
		if($this->db->update($tabla, $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function listar($tabla,$estado)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		if($estado != 3):
		$this->db->where('estado',$estado);
		endif;
		$this->db->order_by('orden','asc');
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->result();
		else return false;
	}

	function listar2($tabla,$dato1,$dato2,$limite,$estado)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		if($estado != 3):
		$this->db->where('estado',$estado);
		endif;
		$this->db->order_by($dato1,$dato2);
		$this->db->limit($limite);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->result();
		else return false;
	}

	function mostrar($tabla,$id)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->row();
		else return false;
	}

	function mostrarseo($tabla,$id)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where('nombreseo',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->row();
		else redirect();
	}

	function obtenerUltimoId($tabla)

	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->row();
		else return false;
	}

	function ultimoId($tabla)
	{
		$this->db->select('AUTO_INCREMENT');
		$this->db->where('TABLE_SCHEMA',$this->db->database);
		$this->db->where('TABLE_NAME',$tabla);
		$this->db->from('INFORMATION_SCHEMA.TABLES');
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->row();
		else return false;
	}

	function imagenes($id,$tabla)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where('id_padre',$id);
		$this->db->order_by('orden','asc');
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->result();
		else return false;
	}

	function estado($tabla,$id,$estado){
		$data = array(
               'estado' => $estado
            );

		$this->db->where('id', $id);
		$this->db->update($tabla, $data); 
	}

	function orden($tabla,$id,$orden){
		$data = array(
               'orden' => $orden
            );

		$this->db->where('id', $id);
		$this->db->update($tabla, $data); 
	}

	function renombrar($tabla,$nombre,$id){
		$data = array(
               'titulo' => $nombre
            );
		$this->db->where('id', $id);
		$this->db->update($tabla, $data); 
	}

	function borrar($tabla, $id)
	{
		$this->db->where('id', $id);
		$this->db->delete($tabla); 
		return true;
	}

	function exportar($tabla,$array)
	{
		$asd = explode(',',$array);
		$this->db->where_in('id',$asd);
		$query= $this->db->get($tabla);
		return $query->result();
	}

	function listarSlider($tabla,$nombrecampo,$campoid,$estado)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where($nombrecampo,$campoid);
		$this->db->where('estado',$estado);
		$this->db->order_by('orden','asc');
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->result();
		else return false;
	}

	function filas($tabla)
	{
		$this->db->cache_off();
		$query = $this->db->get('clientes');
		$count = $query->num_rows();
		$this->db->cache_on();
		return $count;
	}

	/* no va */

	public function nombre_categoria($tabla,$id)
	 {
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where('id',$id);
		$query = $this->db->get();
		$lanueva = $query->row();
		return $lanueva->titulo;
	 }

	public function slug_url($slug, $tabla, $separator='-', $increment_number_at_end=FALSE) {  
	    $last_char_is_number = is_numeric($slug[strlen($slug)-1]);
	    $slug = $slug. ($last_char_is_number && $increment_number_at_end? '.':'');
	    $i=0;
	    $limit = 20;
	    while( get_instance()->db->where('nombreseo', $slug)->count_all_results($tabla) != 0) {
	        $slug = increment_string($slug, $separator);
	        if($i > $limit) {
	            return FALSE;
	        }
	        $i++;
	    }
	    if($last_char_is_number && $increment_number_at_end) $slug = str_replace('.','', $slug);

	    return $slug;
	}

	function mostrar_principal($tabla,$id)
	{
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where('categoria',$id);
		$this->db->order_by('orden','asc');
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->row();
		else return false;
	}

	/* Videos */

	public function get_tabla_paginacion($tabla,$per_page,$segmento)
    {	
    	$this->db->where('estado',1);
    	$this->db->order_by('id','desc');
        $sql = $this->db->get($tabla,$per_page,$segmento);
        return $sql->result();
    }
     
    public function total_filas_tabla($tabla)
    {
    	$this->db->where('estado',1);
        $sql = $this->db->get($tabla);
        return $sql->num_rows();
    }

    function mostrar_nuevo()
	{
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('p_nuevo',1);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->row();
		else return false;
	}
}


	