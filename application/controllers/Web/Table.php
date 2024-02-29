<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('menu') || (count($this->session->userdata('menu')) <= 0)){
			$this->session->set_flashdata('error', 'Vui lòng chọn món ăn vào menu trước!');
			return redirect(base_url());
		}

		$this->load->model('Web/Model_Table');
		$this->load->model('Web/Model_Food');
	}

	public function index()
	{
		$data['title'] = "Chọn bàn ăn";
		$data['menu'] = $this->session->userdata('menu');
		$data['list'] = $this->Model_Table->getAll();
		$this->load->view('Web/View_Table', $data);
	}

	public function Chose($mabanan){
		if(count($this->Model_Table->getById($mabanan)) <= 0){
			$this->session->set_flashdata('error', 'Bàn ăn không tồn tại trong hệ thống!');
			return redirect(base_url('table/'));
		}

		if($this->Model_Table->getById($mabanan)[0]['DangSuDung'] == 1){
			$this->session->set_flashdata('error', 'Bàn ăn đang được sử dụng!');
			return redirect(base_url('table/'));
		}

		return redirect(base_url('order/'.$mabanan.'/table/'));
	}

}

/* End of file Table.php */
/* Location: ./application/controllers/Table.php */