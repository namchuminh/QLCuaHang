<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Setting extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		$sql = "SELECT * FROM cauhinh";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function update($tenquan,$sodienthoai,$maqr,$giomocua,$giodongcua,$diachiquan){
		$sql = "UPDATE cauhinh SET TenQuan = ?, SoDienThoai = ?, MaQR = ?, GioMoCua = ?, GioDongCua = ?, DiaChiQuan = ?";
		$result = $this->db->query($sql, array($tenquan,$sodienthoai,$maqr,$giomocua,$giodongcua,$diachiquan));
		return $result;
	}
}

/* End of file Model_Setting.php */
/* Location: ./application/models/Model_Setting.php */