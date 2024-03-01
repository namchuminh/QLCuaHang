<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Home extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getOrder(){
		$sql = "SELECT COUNT(COALESCE(ThanhToan, 0)) AS soluong FROM hoadon WHERE ThanhToan = 0;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getOrderToday(){
		$sql = "SELECT count(*) AS soluong FROM hoadon WHERE YEAR(ThoiGian) = YEAR(CURDATE()) AND MONTH(ThoiGian) = MONTH(CURDATE()) AND DAY(ThoiGian) = DAY(CURDATE())";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getFood(){
		$sql = "SELECT COUNT(*) AS soluong FROM monan WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getTable(){
		$sql = "SELECT COUNT(*) AS soluong FROM banan WHERE DangSuDung = 0";
		$result = $this->db->query($sql);
		return $result->result_array();
	}


	public function getMonth(){
		$sql = "SELECT COALESCE(SUM(TongTien), 0) AS tongtien FROM hoadon WHERE MONTH(ThoiGian) = MONTH(CURDATE()) AND YEAR(ThoiGian) = YEAR(CURDATE());";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getDay(){
		$sql = "SELECT COALESCE(SUM(TongTien), 0) AS tongtien FROM hoadon WHERE MONTH(ThoiGian) = MONTH(CURDATE()) AND YEAR(ThoiGian) = YEAR(CURDATE()) AND DAY(ThoiGian) = DAY(CURDATE());";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getWeek(){
		$sql = "SELECT COALESCE(SUM(TongTien), 0) AS tongtien FROM hoadon WHERE ThoiGian >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND ThoiGian <= CURDATE() + 1;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getImportMonth(){
		$sql = "SELECT COALESCE(SUM(TongTien), 0) AS tongtien FROM lichsunhap WHERE MONTH(ThoiGian) = MONTH(CURDATE()) AND YEAR(ThoiGian) = YEAR(CURDATE());";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getImportWeek(){
		$sql = "SELECT COALESCE(SUM(TongTien), 0) AS tongtien FROM lichsunhap WHERE ThoiGian >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND ThoiGian <= CURDATE() + 1;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getImportDay(){
		$sql = "SELECT COALESCE(SUM(TongTien), 0) AS tongtien FROM lichsunhap WHERE MONTH(ThoiGian) = MONTH(CURDATE()) AND YEAR(ThoiGian) = YEAR(CURDATE()) AND DAY(ThoiGian) = DAY(CURDATE());";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getOrderMonth(){
		$sql = "SELECT count(*) AS soluong FROM hoadon WHERE YEAR(ThoiGian) = YEAR(CURDATE()) AND MONTH(ThoiGian) = MONTH(CURDATE())";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getOrderDay(){
		$sql = "SELECT count(*) AS soluong FROM hoadon WHERE YEAR(ThoiGian) = YEAR(CURDATE()) AND MONTH(ThoiGian) = MONTH(CURDATE())";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getOrderWeek(){
		$sql = "SELECT count(*) AS soluong FROM hoadon WHERE ThoiGian >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND ThoiGian <= CURDATE() + 1;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getOrderList(){
		$sql = "SELECT hoadon.*, banan.TenBan FROM hoadon, banan WHERE hoadon.MaBanAn = banan.MaBanAn AND hoadon.ThanhToan = 0";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

}

/* End of file Model_Home.php */
/* Location: ./application/models/Model_Home.php */