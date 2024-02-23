<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Category extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM loaimonan WHERE TrangThai = 1 ORDER BY MaLoaiMonAn DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($maloaimonan){
		$sql = "SELECT * FROM loaimonan WHERE TrangThai = 1 AND MaLoaiMonAn = ? ORDER BY MaLoaiMonAn DESC";
		$result = $this->db->query($sql, array($maloaimonan));
		return $result->result_array();
	}

	public function insert($hinhanh, $mota, $tenloaimonan){
		$sql = "INSERT INTO loaimonan (HinhAnh,MoTa,TenLoaiMonAn) VALUES(?, ?, ?)";
		$result = $this->db->query($sql, array($hinhanh, $mota, $tenloaimonan));
		return $result;
	}

	public function update($hinhanh, $mota, $tenloaimonan, $maloaimonan){
		$sql = "UPDATE loaimonan SET HinhAnh=?,MoTa=?,TenLoaiMonAn=? WHERE MaLoaiMonAn = ?";
		$result = $this->db->query($sql, array($hinhanh, $mota, $tenloaimonan,$maloaimonan));
		return $result;
	}

	public function delete($maloaimonan){
		$sql = "UPDATE loaimonan SET TrangThai=0 WHERE MaLoaiMonAn = ?";
		$result = $this->db->query($sql, array($maloaimonan));
		return $result;
	}
	

}

/* End of file Model_Category.php */
/* Location: ./application/models/Model_Category.php */