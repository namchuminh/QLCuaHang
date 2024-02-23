<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Food extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT monan.*, loaimonan.TenLoaiMonAn FROM monan, loaimonan WHERE monan.MaLoaiMonAn = loaimonan.MaLoaiMonAn AND monan.TrangThai = 1 ORDER BY monan.MaMonAn DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($mamonan){
		$sql = "SELECT * FROM monan WHERE MaMonAn = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($mamonan));
		return $result->result_array();
	}

	public function insert($tenmon,$mota,$giaban,$maloaimonan,$hinhanh){
		$sql = "INSERT INTO monan (TenMon,MoTa,GiaBan,SoLuong,MaLoaiMonAn,HinhAnh) VALUES(?, ?, ?, ?, ?, ?)";
		$result = $this->db->query($sql, array($tenmon,$mota,$giaban,0,$maloaimonan,$hinhanh));
		return $result;
	}

	public function update($tenmon,$mota,$giaban,$soluong,$maloaimonan,$hinhanh,$mamonan){
		$sql = "UPDATE monan SET TenMon=?,MoTa=?,GiaBan=?,SoLuong=?,MaLoaiMonAn=?,HinhAnh=? WHERE MaMonAn = ?";
		$result = $this->db->query($sql, array($tenmon,$mota,$giaban,$soluong,$maloaimonan,$hinhanh,$mamonan));
		return $result;
	}

	public function delete($mamonan){
		$sql = "UPDATE monan SET TrangThai=? WHERE MaMonAn = ?";
		$result = $this->db->query($sql, array(0,$mamonan));
		return $result;
	}

	public function import($soluong,$mamonan){
		$sql = "UPDATE monan SET SoLuong=? WHERE MaMonAn = ?";
		$result = $this->db->query($sql, array($soluong,$mamonan));
		return $result;
	}

	public function getHistoryById($mamonan){
		$sql = "SELECT lichsunhap.*, nhanvien.TenNhanVien, nhacungcap.TenNhaCungCap FROM monan, lichsunhap, nhanvien, nhacungcap WHERE lichsunhap.MaNhaCungCap = nhacungcap.MaNhaCungCap AND lichsunhap.MaNhanVien = nhanvien.MaNhanVien AND lichsunhap.MaMonAn = monan.MaMonAn AND lichsunhap.MaMonAn = ? ORDER BY lichsunhap.MaLichSuNhap DESC LIMIT 10";
		$result = $this->db->query($sql, array($mamonan));
		return $result->result_array();
	}
}

/* End of file Model_Food.php */
/* Location: ./application/models/Model_Food.php */