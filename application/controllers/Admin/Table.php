<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}
		$this->load->model('Admin/Model_Table');
	}

	public function index()
	{
		$data['title'] = "Danh sách bàn ăn";
		$data['list'] = $this->Model_Table->getAll();
		return $this->load->view('Admin/View_Table', $data);
	}

	public function Add(){
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/table/'));
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenban = $this->input->post('tenban');
			$succhua = $this->input->post('succhua');
			$vitri = $this->input->post('vitri');

			if(empty($tenban) || empty($succhua) || empty($vitri)){
				$data['error'] = "Vui lòng nhập đủ thông tin bàn ăn!";
				return $this->load->view('Admin/View_TableAdd', $data);
			}

			if(!is_numeric($succhua) || $succhua <= 0){
				$data['error'] = "Vui lòng nhập số lượng người hợp lệ!";
				return $this->load->view('Admin/View_TableAdd', $data);
			}
			
			$this->Model_Table->insert($tenban,$succhua,$vitri,0);

			$this->session->set_flashdata('success', 'Thêm bàn ăn mới thành công!');
			return redirect(base_url('admin/table/'));
		}

		$data['title'] = "Thêm mới bàn ăn";
		return $this->load->view('Admin/View_TableAdd', $data);
	}

	public function Update($mabanan){

		if(count($this->Model_Table->getById($mabanan)) <= 0){
			$this->session->set_flashdata('error', 'Bàn ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/table/'));
		}

		$data['title'] = "Cập nhật bàn ăn";
		$data['detail'] = $this->Model_Table->getById($mabanan);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			if($this->session->userdata('role') != 1){
				$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
				return redirect(base_url('admin/table/'));
			}

			$tenban = $this->input->post('tenban');
			$succhua = $this->input->post('succhua');
			$vitri = $this->input->post('vitri');
			$dangsudung = $this->input->post('dangsudung');

			if(empty($tenban) || empty($succhua) || empty($vitri)){
				$data['error'] = "Vui lòng nhập đủ thông tin bàn ăn!";
				return $this->load->view('Admin/View_TableUpdate', $data);
			}

			if(!is_numeric($succhua) || $succhua <= 0){
				$data['error'] = "Vui lòng nhập số lượng người hợp lệ!";
				return $this->load->view('Admin/View_TableUpdate', $data);
			}
			
			$this->Model_Table->update($tenban,$succhua,$vitri,$dangsudung,$mabanan);

			$data['success'] = "Cập nhật bàn ăn thành công!";
			$data['detail'] = $this->Model_Table->getById($mabanan);
			return $this->load->view('Admin/View_TableUpdate', $data);
		}
		return $this->load->view('Admin/View_TableUpdate', $data);
	}

	public function Delete($mabanan){
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/table/'));
		}

		if(count($this->Model_Table->getById($mabanan)) <= 0){
			$this->session->set_flashdata('error', 'Bàn ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/table/'));
		}

		$this->Model_Table->delete($mabanan);
		$this->session->set_flashdata('success', 'Xóa bàn ăn thành công!');
		return redirect(base_url('admin/table/'));

	}

	public function Status($mabanan){
		if(count($this->Model_Table->getById($mabanan)) <= 0){
			$this->session->set_flashdata('error', 'Bàn ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/table/'));
		}

		$dangsudung = $this->Model_Table->getById($mabanan)[0]['DangSuDung'] == 1 ? 0 : 1;

		$this->Model_Table->status($dangsudung,$mabanan);
		$this->session->set_flashdata('success', 'Cập nhật trạng thái sử dụng bàn ăn thành công!');
		return redirect(base_url('admin/table/'));
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */