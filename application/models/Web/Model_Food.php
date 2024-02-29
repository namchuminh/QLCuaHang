<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Food extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getById($mamonan){
		$sql = "SELECT * FROM monan WHERE MaMonAn = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($mamonan));
		return $result->result_array();
	}

	public function getByCategoryId($maloaimonan)
	{
		$sql = "SELECT monan.*, loaimonan.TenLoaiMonAn FROM monan, loaimonan WHERE monan.MaLoaiMonAn = loaimonan.MaLoaiMonAn AND monan.MaLoaiMonAn = ? AND monan.TrangThai = 1 AND monan.SoLuong >= 1 ORDER BY monan.MaMonAn DESC";
		$result = $this->db->query($sql, array($maloaimonan));
		return $result->result_array();
	}

	public function updateNumber($soluong,$mamonan){
		$sql = "UPDATE monan SET SoLuong = ? WHERE MaMonAn = ?";
		$result = $this->db->query($sql, array($soluong,$mamonan));
		return $result;
	}

}

/* End of file Model_Food.php */
/* Location: ./application/models/Model_Food.php */