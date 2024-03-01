<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('menu') || (count($this->session->userdata('menu')) <= 0)){
			$this->session->set_flashdata('error', 'Vui lòng chọn món ăn vào menu trước!');
			return redirect(base_url());
		}

		$this->load->model('Web/Model_Table');
		$this->load->model('Web/Model_Order');
		$this->load->model('Web/Model_Food');
		$this->load->model('Web/Model_Setting');
	}


	public function addOrder($mabanan){
		if(count($this->Model_Table->getById($mabanan)) <= 0){
			$this->session->set_flashdata('error', 'Bàn ăn không tồn tại trong hệ thống!');
			return redirect(base_url('table/'));
		}

		if($this->Model_Table->getById($mabanan)[0]['DangSuDung'] == 1){
			$this->session->set_flashdata('error', 'Bàn ăn đang được sử dụng!');
			return redirect(base_url('table/'));
		}


		$tongtien = 0;

		foreach ($this->session->userdata('menu') as $key => $value) {
			$dongia = $this->Model_Food->getById($value['mamonan'])[0]['GiaBan'] * $value['soluong'];
			$tongtien += $dongia;
		}


		$mahoadon = $this->Model_Order->insert($mabanan,$tongtien,0);

		foreach ($this->session->userdata('menu') as $key => $value) {
			$this->Model_Order->insertDetail($mahoadon,$value['mamonan'],$value['soluong']);
			$soluongmoi = $this->Model_Food->getById($value['mamonan'])[0]['SoLuong'] - $value['soluong'];
			$this->Model_Food->updateNumber($soluongmoi,$value['mamonan']);
		}

		$this->Model_Table->updateStatus($mabanan);

		$this->session->sess_destroy();

		$data['title'] = "Chi tiết hóa đơn";
		$data['detail'] = $this->Model_Order->getDetailById($mahoadon);
		$data['order'] = $this->Model_Order->getById($mahoadon);
		$data['menu'] = [];
		$data['setting'] = $this->Model_Setting->getAll();
		return $this->load->view('Web/View_Order', $data);

	}
}

/* End of file Order.php */
/* Location: ./application/models/Order.php */