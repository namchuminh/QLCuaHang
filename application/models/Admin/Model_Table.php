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

	public function insert($tenban,$succhua,$vitri,$dangsudung){
		$sql = "INSERT INTO banan (TenBan, SucChua, ViTri, DangSuDung) VALUES(?, ?, ?, ?)";
		$result = $this->db->query($sql, array($tenban,$succhua,$vitri,$dangsudung));
		return $result;
	}

	public function update($tenban,$succhua,$vitri,$dangsudung,$mabanan){
		$sql = "UPDATE banan SET TenBan=?, SucChua=?, ViTri=?, DangSuDung=? WHERE MaBanAn = ?";
		$result = $this->db->query($sql, array($tenban,$succhua,$vitri,$dangsudung,$mabanan));
		return $result;
	}

	public function delete($mabanan){
		$sql = "UPDATE banan SET TrangThai=0 WHERE MaBanAn = ?";
		$result = $this->db->query($sql, array($mabanan));
		return $result;
	}

	public function status($dangsudung,$mabanan){
		$sql = "UPDATE banan SET DangSuDung=? WHERE MaBanAn = ?";
		$result = $this->db->query($sql, array($dangsudung,$mabanan));
		return $result;
	}


}

/* End of file Model_Table.php */
/* Location: ./application/models/Model_Table.php */