<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Table extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM banan WHERE TrangThai = 1 ORDER BY DangSuDung ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($mabanan){
		$sql = "SELECT * FROM banan WHERE TrangThai = 1 AND MaBanAn = ?";
		$result = $this->db->query($sql, array($mabanan));
		return $result->result_array();
	}

	public function updateStatus($mabanan){
		$sql = "UPDATE banan SET DangSuDung = 1 WHERE MaBanAn = ?";
		$result = $this->db->query($sql, array($mabanan));
		return $result;
	}

}

/* End of file Model_Table.php */
/* Location: ./application/models/Model_Table.php */