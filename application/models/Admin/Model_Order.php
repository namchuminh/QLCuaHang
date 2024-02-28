<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Order extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT hoadon.*, banan.TenBan FROM hoadon, banan WHERE hoadon.MaBanAn = banan.MaBanAn ORDER BY hoadon.MaHoaDon DESC LIMIT 25";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($mahoadon)
	{
	    $sql = "SELECT hoadon.*, banan.TenBan FROM hoadon, banan WHERE hoadon.MaBanAn = banan.MaBanAn AND hoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

	public function pay($mahoadon){
		$sql = "UPDATE hoadon SET ThanhToan = 1 WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result;
	}

	public function getDetailById($mahoadon){
		$sql = "SELECT chitiethoadon.*, monan.TenMon, monan.GiaBan, monan.HinhAnh FROM chitiethoadon, monan WHERE chitiethoadon.MaMonAn = monan.MaMonAn AND chitiethoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

}

/* End of file Model_Order.php */
/* Location: ./application/models/Model_Order.php */