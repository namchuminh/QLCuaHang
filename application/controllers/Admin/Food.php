<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Food extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}

		$this->load->model('Admin/Model_Category');
		$this->load->model('Admin/Model_Food');
		$this->load->model('Admin/Model_Supplier');
	}

	public function index()
	{
		$data['title'] = "Quản lý thực đơn món ăn";
		$data['list'] = $this->Model_Food->getAll();
		return $this->load->view('Admin/View_Food', $data);
	}

	public function Add()
	{
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/food/'));
		}

		$data['title'] = "Thêm mới món ăn";
		$data['category'] = $this->Model_Category->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenmon = $this->input->post('tenmon');
			$giaban = $this->input->post('giaban');
			$maloaimonan = $this->input->post('maloaimonan');
			$mota = $this->input->post('mota');

			if(empty($tenmon) || empty($giaban) || empty($maloaimonan) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin món ăn!";
				return $this->load->view('Admin/View_FoodAdd', $data);
			}

			if (!ctype_digit($giaban)) {
			    $data['error'] = "Vui lòng chọn giá bán hợp lệ!";
				return $this->load->view('Admin/View_FoodAdd', $data);
			}

			$hinhanh = "";

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh món ăn!";
				return $this->load->view('Admin/View_FoodAdd', $data);
			}

			$this->Model_Food->insert($tenmon,$mota,$giaban,$maloaimonan,$hinhanh);

			$this->session->set_flashdata('success', 'Thêm món ăn mới thành công!');

			return redirect(base_url('admin/food/'));


		}
		return $this->load->view('Admin/View_FoodAdd', $data);
	}

	public function Update($mamonan)
	{
		if(count($this->Model_Food->getById($mamonan)) <= 0){
			$this->session->set_flashdata('error', 'Món ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/food/'));
		}

		$data['title'] = "Cập nhật món ăn";
		$data['category'] = $this->Model_Category->getAll();
		$data['detail'] = $this->Model_Food->getById($mamonan);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			if($this->session->userdata('role') != 1){
				$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
				return redirect(base_url('admin/food/'));
			}

			$tenmon = $this->input->post('tenmon');
			$giaban = $this->input->post('giaban');
			$soluong = $this->input->post('soluong');
			$maloaimonan = $this->input->post('maloaimonan');
			$mota = $this->input->post('mota');

			if(empty($tenmon) || empty($giaban) || empty($maloaimonan) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin món ăn!";
				return $this->load->view('Admin/View_FoodUpdate', $data);
			}

			if (!ctype_digit($giaban)) {
			    $data['error'] = "Vui lòng chọn giá bán hợp lệ!";
				return $this->load->view('Admin/View_FoodUpdate', $data);
			}

			if (!ctype_digit($soluong)) {
			    $data['error'] = "Vui lòng nhập số lượng hợp lệ!";
				return $this->load->view('Admin/View_FoodUpdate', $data);
			}

			$hinhanh = $this->Model_Food->getById($mamonan)[0]['HinhAnh'];

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}


			$this->Model_Food->update($tenmon,$mota,$giaban,$soluong,$maloaimonan,$hinhanh,$mamonan);
			$data['detail'] = $this->Model_Food->getById($mamonan);
			$data['success'] = "Cập nhật thông tin món ăn thành công!";
			return $this->load->view('Admin/View_FoodUpdate', $data);

		}
		return $this->load->view('Admin/View_FoodUpdate', $data);
	}

	public function Delete($mamonan){

		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/food/'));
		}

		if(count($this->Model_Food->getById($mamonan)) <= 0){
			$this->session->set_flashdata('error', 'Món ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/food/'));
		}

		$this->Model_Food->delete($mamonan);
		$this->session->set_flashdata('success','Xóa món ăn khỏi hệ thống thành công!');
		return redirect(base_url('admin/food/'));
	}

	public function import($mamonan){
		if(count($this->Model_Food->getById($mamonan)) <= 0){
			$this->session->set_flashdata('error', 'Món ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/food/'));
		}

		$data['title'] = "Nhập thêm số lượng món ăn";
		$data['detail'] = $this->Model_Food->getById($mamonan);
		$data['supplier'] = $this->Model_Supplier->getAll();

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$soluongcu = $this->Model_Food->getById($mamonan)[0]['SoLuong'];
			$soluongnhap = $this->input->post('soluongnhap');
			$tongtien = $this->input->post('tongtien');
			$manhacungcap = $this->input->post('manhacungcap');

			if(empty($soluongnhap) || empty($tongtien) || empty($manhacungcap)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_FoodImport', $data);
			}

			if (!ctype_digit($soluongnhap)) {
			    $data['error'] = "Vui lòng chọn số lượng nhập hợp lệ!";
				return $this->load->view('Admin/View_FoodUpdate', $data);
			}

			if (!ctype_digit($tongtien)) {
			    $data['error'] = "Vui lòng chọn tổng tiền nhập hợp lệ!";
				return $this->load->view('Admin/View_FoodUpdate', $data);
			}

			$manhanvien = $this->session->userdata('id');
			$this->Model_Supplier->insertHistory($manhanvien,$manhacungcap,$mamonan,$soluongcu,$soluongnhap,$tongtien);

			$soluong = $soluongcu + $soluongnhap;
			$this->Model_Food->import($soluong,$mamonan);

			$this->session->set_flashdata('success', 'Nhập thêm số lượng cho món ăn thành công!');
			return redirect(base_url('admin/food/'));
		}

		return $this->load->view('Admin/View_FoodImport', $data);
	}

	public function History($mamonan){

		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/food/'));
		}

		if(count($this->Model_Food->getById($mamonan)) <= 0){
			$this->session->set_flashdata('error', 'Món ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/food/'));
		}

		$data['title'] = "Lịch sử nhập món ăn";
		$data['detail'] = $this->Model_Food->getById($mamonan);
		$data['history'] = $this->Model_Food->getHistoryById($mamonan);
		return $this->load->view('Admin/View_FoodHistory', $data);
	}


}

/* End of file Food.php */
/* Location: ./application/controllers/Food.php */