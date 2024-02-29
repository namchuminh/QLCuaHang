<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Order extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getById($mahoadon)
	{
	    $sql = "SELECT hoadon.*, banan.TenBan FROM hoadon, banan WHERE hoadon.MaBanAn = banan.MaBanAn AND hoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

	public function getDetailById($mahoadon){
		$sql = "SELECT chitiethoadon.*, monan.TenMon, monan.GiaBan, monan.HinhAnh FROM chitiethoadon, monan WHERE chitiethoadon.MaMonAn = monan.MaMonAn AND chitiethoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

	public function insert($mabanan, $tongtien, $thanhtoan){
	    $data = array(
	        'MaBanAn' => $mabanan,
	        'TongTien' => $tongtien,
	        'ThanhToan' => $thanhtoan
	    );
	    $this->db->insert('hoadon', $data);
	    
	    // Trả về ID vừa chèn vào cơ sở dữ liệu
	    return $this->db->insert_id();
	}


	public function insertDetail($mahoadon, $mamonan, $soluong){
	    $data = array(
	        'MaHoaDon' => $mahoadon,
	        'MaMonAn' => $mamonan,
	        'SoLuong' => $soluong
	    );
	    $this->db->insert('chitiethoadon', $data);
	    
	    // Trả về ID vừa chèn vào cơ sở dữ liệu
	    return $this->db->insert_id();
	}

}