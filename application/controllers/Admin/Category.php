<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}
		$this->load->model('Admin/Model_Category');
	}

	public function index()
	{
		$data['title'] = "Danh sách loại món ăn";
		$data['list'] = $this->Model_Category->getAll();
		return $this->load->view('Admin/View_Category', $data);
	}

	public function Add(){
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/category/'));
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenloaimonan = $this->input->post('tenloaimonan');
			$mota = $this->input->post('mota');
			$hinhanh = "";

			if(empty($tenloaimonan) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin loại món ăn!";
				return $this->load->view('Admin/View_CategoryAdd', $data);
			}

			$hinhanh = "";

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh loại món ăn!";
				return $this->load->view('Admin/View_CategoryAdd', $data);
			}

			$this->Model_Category->insert($hinhanh, $mota, $tenloaimonan);

			$this->session->set_flashdata('success', 'Thêm loại món ăn mới thành công!');
			return redirect(base_url('admin/category/'));

		}

		$data['title'] = "Thêm mới loại món ăn";
		return $this->load->view('Admin/View_CategoryAdd', $data);
	}

	public function Update($maloaimonan){

		if(count($this->Model_Category->getById($maloaimonan)) <= 0){
			$this->session->set_flashdata('error', 'Loại món ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/category/'));
		}

		$data['title'] = "Cập nhật loại món ăn";
		$data['detail'] = $this->Model_Category->getById($maloaimonan);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			if($this->session->userdata('role') != 1){
				$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
				return redirect(base_url('admin/category/'));
			}

			$tenloaimonan = $this->input->post('tenloaimonan');
			$mota = $this->input->post('mota');
			$hinhanh = $this->Model_Category->getById($maloaimonan)[0]['HinhAnh'];

			if(empty($tenloaimonan) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin loại món ăn!";
				return $this->load->view('Admin/View_CategoryUpdate', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_Category->update($hinhanh, $mota, $tenloaimonan, $maloaimonan);

			$data['success'] = "Cập nhật loại món ăn thành công!";
			$data['detail'] = $this->Model_Category->getById($maloaimonan);
			return $this->load->view('Admin/View_CategoryUpdate', $data);
		}
		return $this->load->view('Admin/View_CategoryUpdate', $data);
	}

	public function Delete($maloaimonan){
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/category/'));
		}

		if(count($this->Model_Category->getById($maloaimonan)) <= 0){
			$this->session->set_flashdata('error', 'Loại món ăn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/category/'));
		}

		$this->Model_Category->delete($maloaimonan);
		$this->session->set_flashdata('success', 'Xóa loại món ăn thành công!');
		return redirect(base_url('admin/category/'));

	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */