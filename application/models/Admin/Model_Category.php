<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Category extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM loaimonan ORDER BY MaLoaiMonAn DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	

}

/* End of file Model_Category.php */
/* Location: ./application/models/Model_Category.php */