<?php
class Home extends CI_Model
{
	function __construct()
	{
		// Llamar al constructor de CI_Model
		parent::__construct();
		$this->load->database();
	}
	function verSliders()
	{

		$query = $this->db->query('SELECT * FROM sliderhome where estado = 1 order by orden asc'); 
		$dato = $query->num_rows(); 
		if($query->num_rows() > 0) return array(
			'query' => $query, 'dato' => $dato);
		else return false;
	}

	function verSlidersUltimo()
	{
		$query = $this->db->query('SELECT * FROM sliderhome where estado = 1 order by orden desc limit 1'); 
		$dato = $query->num_rows(); 
		if($query->num_rows() > 0) return $query->row();
		else return false;
	}

	
}