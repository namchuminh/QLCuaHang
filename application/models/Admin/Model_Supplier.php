<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Supplier extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM nhacungcap WHERE TrangThai = 1 ORDER BY MaNhaCungCap DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function insertHistory($manhanvien,$manhacungcap,$mamonan,$soluongcu,$soluongmoi,$tongtien){
		$sql = "INSERT INTO lichsunhap (MaNhanVien,MaNhaCungCap,MaMonAn,SoLuongCu,SoLuongMoi,TongTien) VALUES($manhanvien,$manhacungcap,$mamonan,$soluongcu,$soluongmoi,$tongtien)";
		$result = $this->db->query($sql);
		return $result;
	}

}

/* End of file Model_Supplier.php */
/* Location: ./application/models/Model_Supplier.php */