<?php
class serverActions extends CI_Controller {
	function __construct()
	{
		// Llamar al constructor de CI_Model
		parent::__construct();
		$this->load->database();
	}
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	private $namespace	= "JQGRID";
	private function DecodeJSon($responce)
	{
		if(isset($responce->rows)):
			foreach($responce->rows as $data =>$data2):
				$i2=0;
				foreach($data2['cell'] as $data3):
					$responce->rows[$data]['cell'][$i2] = utf8_encode($data3);
					$i2++;
				endforeach;
			endforeach;
		endif;
		return $responce;
	}
	private function Strip($value)
	{
		if(get_magic_quotes_gpc() != 0)
		{
			if(is_array($value))  
				if ( array_is_associative($value) )
				{
					foreach( $value as $k=>$v)
						$tmp_val[$k] = stripslashes($v);
					$value = $tmp_val; 
				}				
				else  
					for($j = 0; $j < sizeof($value); $j++)
						$value[$j] = stripslashes($value[$j]);
			else
				$value = stripslashes($value);
		}
		return $value;
	}
	private function array_is_associative ($array)
	{
		if ( is_array($array) && ! empty($array) )
		{
			for ( $iterator = count($array) - 1; $iterator; $iterator-- )
			{
				if ( ! array_key_exists($iterator, $array) ) { return true; }
			}
			return ! array_key_exists(0, $array);
		}
		return false;
	}
	
	
	
	public function executeIndex()
	{
		$examp		= $this->input->get('q'); //query number
		$page		= $this->input->get('page'); // get the requested page
		$wh			=	"";
		$limit 		= $this->input->get('rows'); // get how many rows we want to have into the grid
		//echo $examp;
		//$limit = 10; // get how many rows we want to have into the grid
		$sidx 		= $this->input->get('sidx'); // get index row - i.e. user click to sort
		$sord 		= $this->input->get('sord'); // get the direction
		$dafuq = $this->Strip($this->input->get('dafuq'));
		$parametro1 = $this->input->get('parametro1');
		$parametro2 = $this->input->get('parametro2');
		if(!$sidx):
			$sidx =1;
		endif;
		
		$searchOn = $this->Strip($this->input->get('_search'));
		
		if($searchOn=='true'):
			$fld = $this->Strip($this->input->get('searchField'));
			if(isset($fld)):
				$fldata = $this->Strip($this->input->get('searchString'));
				$foper = $this->Strip($this->input->get('searchOper'));
				$wh .= " AND ".$fld;
				switch($foper):
					case "eq"://equal
						if(is_numeric($fldata)):
							$this->db->where($fld , $fldata);
						else:
							$this->db->where($fld, "$fldata");
						endif;
						break;
					case "ne"://not equal
						if(is_numeric($fldata)):
							$this->db->where("$fld != $fldata");
						else:
							$this->db->where("$fld != ?", $fldata);
						endif;
						break;
					case "bw"://begins with
						$this->db->like("$fld","$fldata");
						break;
					case "bn"://not begins with
						$fldata .= "%";
						$this->db->where("NOT $fld LIKE ?", "%$fldata");
						break;
					case "ew"://ends with
						$this->db->where("$fld LIKE ?", "%$fldata");
						break;
					case "en"://does not end with
						$this->db->where("NOT $fld LIKE ?", "%$fldata");
						break;
					case "cn"://contains
						$this->db->like("$fld ", "$fldata");
						break;
					case "nc"://does not contain
						$this->db->where("NOT $fld LIKE ?", "%$fldata%");
						break;
					case "lt":
						if(is_numeric($fldata)):
							$this->db->where("$fld < $fldata");
						else:
							$this->db->where("$fld < ?", $fldata);
						endif;
						break;
					case "le":
						if(is_numeric($fldata)):
							$this->db->where("$fld <= $fldata");
						else:
							$this->db->where("$fld <= ?", $fldata);
						endif;
						break;
					case "gt":
						if(is_numeric($fldata)):
							$this->db->where("$fld > $fldata");
						else:
							$this->db->where("$fld > ?", $fldata);
						endif;
						break;
					case "ge":
						if(is_numeric($fldata)):
							$this->db->where("$fld >= $fldata");
						else:
							$this->db->where("$fld >= ?", $fldata);
						endif;
						break;
					default :
						
				endswitch;
			endif;
		endif;
		/* Busquedas */
		if($this->input->get('buscar_') == true):
			if($parametro1!=''):
				$this->db->like($parametro1, $parametro2);
			endif;
			if($this->input->get('estado')!='-1'):
				$this->db->where('estado' , $this->input->get('estado'));
			endif;
		endif;					
		/* Fin Busquedas */
		
		$json_render = "";
		switch($examp):
			case 1:
				//Slider Home
				$query1 = $this->db->query("select * from home");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('home');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$slide						=	$result->imagen;
					$orden						=	$result->orden;
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Home/editar/$id");
					$link_ver	 = site_url("backend/Home/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else: 
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,"<img src='$slide' height='50'/>",$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			case 2:
				//
				$query1 = $this->db->query("select * from categoria_productos");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('categoria_productos');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$titulo						=	$result->titulo;
					$orden						=	$result->orden;
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Productos/editar_categoria/$id");
					$link_ver	 = site_url("backend/Comofunciona/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else: 
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,$titulo,$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			case 3:
				$id_categoria = $this->input->get('categoria');
				$query1 = $this->db->query("select * from productos where categoria = $id_categoria");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->where('categoria',$id_categoria);
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('productos');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$slide						=	$result->imagen;
					$titulo						=	$result->titulo;
					$orden						=	$result->orden;
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Productos/editar_portafolio/$id");
					$link_ver	 = site_url("backend/Comofunciona/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else: 
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,$titulo,"<img src='$slide' height='50'/>",$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			case 4:
				//
				$query1 = $this->db->query("select * from categoria_tips");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('categoria_tips');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$titulo						=	$result->titulo;
					$orden						=	$result->orden;
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Tips/editar_categoria/$id");
					$link_ver	 = site_url("backend/Comofunciona/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else: 
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,$titulo,$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			case 5:
				$id_categoria = $this->input->get('categoria');
				$query1 = $this->db->query("select * from tips where categoria = $id_categoria");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->where('categoria',$id_categoria);
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('tips');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$slide						=	$result->imagen;
					$titulo						=	$result->titulo;
					$orden						=	$result->orden;
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Tips/editar_tips/$id");
					$link_ver	 = site_url("backend/Comofunciona/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else: 
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,$titulo,"<img src='$slide' height='50'/>",$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			case 6:
				//Clientes			
				$query1 = $this->db->query("select * from tv");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('tv');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$titulo						=	$result->titulo;					
					$slide						=	$result->imagen;
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Tv/editar/$id");
					$link_ver	 = site_url("backend/Home/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else:
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,$titulo,$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			case 7:
				$query1 = $this->db->query("select * from testimonios");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('testimonios');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$titulo						=	$result->titulo;	
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Testimonios/editar/$id");
					$link_ver	 = site_url("backend/Home/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else:
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,$titulo,$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			case 8:
				$query1 = $this->db->query("select * from novedades");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('novedades');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$titulo						=	$result->titulo;	
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Novedades/editar/$id");
					$link_ver	 = site_url("backend/Home/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else:
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,$titulo,$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			case 9:
				$query1 = $this->db->query("select * from faq");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('faq');
				$results = $query->result();
				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id']	=	$id;
					$titulo						=	$result->titulo;	
					$estado						=	$result->estado;
					$fecha						=	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Faq/editar/$id");
					$link_ver	 = site_url("backend/Home/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= '';
					   else:
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;
					$responce->rows[$i]['cell']	=	array($id,$titulo,$fecha, 
						"<center><a class='_ver21' href='$link_editar' title='Editar'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a><a class='view-record-action' href='$e_link' title='$e_titulo'> <i class='fa fa-check-circle' style='$e_color'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
			
			
			case 10:
				$query1 = $this->db->query("select * from buzon");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('buzon');
				$results = $query->result();

				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id'] =	$id;
					$titulo                   =	$result->nombres;
					$email                    =	$result->email;
					$estado                   =	$result->estado;
					$fecha                    =	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Buzon/editar_colores/$id");
					$link_ver	 = site_url("backend/Buzon/ver/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= 'color:#3380ff';
					   else: 
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;

					$responce->rows[$i]['cell']	=	array($id,$titulo,$email,$fecha, 
						"<center><a class='_ver21' href='$link_ver' title='Ver'><i class='fa fa-eye'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;

			case 11:
				$query1 = $this->db->query("select * from buzon_atencion");
				$count = $query1->num_rows();
				if($count>0):
					$total_pages = ceil($count/$limit);
				else:
					$total_pages = 0;
				endif;
				if($page > $total_pages):
					$page=$total_pages;
				endif;
				$start = $limit*$page - $limit; // do not put $limit*($page - 1)
				if($start<0):
					$start = 0;
				endif;
				$this->db->limit($limit, $start);
				$this->db->order_by($sidx, $sord);
				$query = $this->db->get('buzon_atencion');
				$results = $query->result();

				$responce = new Responce();
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				$i=0; $amttot=0; $taxtot=0; $total=0;
				foreach($results as $result):
					$id = $result->id;
					$responce->rows[$i]['id'] =	$id;
					$titulo                   =	$result->nombres;
					$email                    =	$result->email;
					$telefono                    =	$result->telefono;
					$estado                   =	$result->estado;
					$fecha                    =	$result->fecha;
						//partidos/editar/1
					$link_editar = site_url("backend/Buzon/editar_colores/$id");
					$link_ver	 = site_url("backend/Buzon/ver_matricula/$id");
					if($estado==1):
							$e_link 	= 'javascript:cambiar('.$id.',1)';
							$e_titulo	= 'Desactivar';
							$e_color	= 'color:#3380ff';
					   else: 
					   		$e_link = 'javascript:cambiar('.$id.',0)';
					   		$e_titulo	= 'Activar';
							$e_color	= 'color:#626262';
					endif;

					$responce->rows[$i]['cell']	=	array($id,$titulo, $email,$fecha, 
						"<center><a class='_ver21' href='$link_ver' title='Ver'><i class='fa fa-eye'></i></a>&nbsp;&nbsp;<a class='_editar21' href='javascript:;' onclick='eliminar($id);' title='Borrar'><i class='fa fa-minus-square'></i></a></center>");
					$i++;
				endforeach;
				$responce->userdata['name'] = 'Total:';
				$json_render = json_encode($responce);
				break;
		endswitch;
		//echo $json_render;
		$this->output->set_output($json_render);
	}
	public function borrar()
	{
		$id 	= $this->input->post('id');
		$tabla  = $this->input->post('tabla');
        $this->egeneral_model->borrar($tabla,$id);
        $this->output->set_output('1');
	}
	public function borrar_seleccionados()
	{
		$id 	 = $this->input->post('id');
		$tabla   = $this->input->post('tabla');
		$id_	 = explode(',',$id);
		foreach($id_ as $ii):
        	$this->egeneral_model->borrar($tabla,$ii);
    	endforeach;
        $this->output->set_output('1');
	}
	public function estado()
	{
		$id 	 = $this->input->post('id');
		$tabla   = $this->input->post('tabla');
		$estado  = $this->input->post('estado');
		$nuevoestado = $estado==0?1:0;
        $this->egeneral_model->estado($tabla,$id,$nuevoestado);
        $this->output->set_output('1');
	}
	public function orden()
	{
		$id 	 = $this->input->post('id');
		$tabla   = $this->input->post('tabla');
		$orden   = $this->input->post('order');
        $this->egeneral_model->orden($tabla,$id,$orden);
        $this->output->set_output('1');
	}
}
class Responce
{
	var $page;
	var $total;
	var $records;
	var $rows;
	var $userdata;
}
