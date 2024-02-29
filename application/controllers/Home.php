<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_Category');
		$this->load->model('Web/Model_Food');
		$this->load->model('Web/Model_Setting');
	}

	public function index()
	{
		$data['title'] = "Food Menu - Đặt đồ ăn";
		$data['category'] = $this->Model_Category->getAll();
		$data['menu'] = $this->session->userdata('menu');
		$data['setting'] = $this->Model_Setting->getAll();
		return $this->load->view('Web/View_Home', $data);
	}


	public function addMenu(){
		// Bắt đầu session nếu chưa được bắt đầu
	    if (!$this->session->userdata('menu')) {
	        $this->session->set_userdata('menu', array());
	    }

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$mamonan = $this->input->post('mamonan');
			$soluong = $this->input->post('soluong');

			if(count($this->Model_Food->getById($mamonan)) <= 0){
				$this->session->set_flashdata('error', 'Món ăn không tồn tại trong hệ thống!');
				return redirect(base_url());
			}

			if(!is_numeric($soluong) || ($soluong <= 0)){
				$this->session->set_flashdata('error', 'Vui lòng nhập số lượng hợp lệ!');
				return redirect(base_url());
			}

			if($soluong > $this->Model_Food->getById($mamonan)[0]['SoLuong']){
				$this->session->set_flashdata('error', 'Số lượng chỉ còn tối đa '.$this->Model_Food->getById($mamonan)[0]['SoLuong'].' sản phẩm!');
				return redirect(base_url());
			}

			// Lấy menu từ session
	        $menu = $this->session->userdata('menu');

	        // Kiểm tra nếu món ăn đã có trong menu
	        $found = false;
	        foreach ($menu as &$item) {
	            if ($item['mamonan'] == $mamonan) {
	                // Nếu món ăn đã có trong menu, cộng số lượng
	                $item['soluong'] += $soluong;

	                if($item['soluong'] > $this->Model_Food->getById($mamonan)[0]['SoLuong']){
						$this->session->set_flashdata('error', 'Bạn đã đặt quá số lượng '.$this->Model_Food->getById($mamonan)[0]['SoLuong'].' sản phẩm!');
						return redirect(base_url());
					}

	                $found = true;
	                break;
	            }
	        }

	        if (!$found) {
	            // Nếu món ăn chưa có trong menu, thêm mới vào session
	            $menu[] = array(
	                'mamonan' => $mamonan,
	                'soluong' => $soluong
	            );
	        }

	        // Lưu menu vào session
	        $this->session->set_userdata('menu', $menu);

	        $this->session->set_flashdata('success', 'Thêm món ăn vào menu thành công!');
			return redirect(base_url());
		}
	}

	public function deleteMenu($mamonan) {
	    // Bắt đầu session nếu chưa được bắt đầu
	    if (!$this->session->userdata('menu')) {
	        $this->session->set_flashdata('error', 'Menu chưa được tạo!');
	        return redirect(base_url());
	    }

	    // Lấy menu từ session
	    $menu = $this->session->userdata('menu');

	    // Tìm kiếm món ăn trong menu
	    $found_key = array_search($mamonan, array_column($menu, 'mamonan'));

	    if ($found_key !== false) {
	        // Nếu món ăn tồn tại trong menu, xóa món ăn
	        unset($menu[$found_key]);
	        $this->session->set_userdata('menu', array_values($menu));
	        $this->session->set_flashdata('success', 'Đã xóa món ăn khỏi menu!');
	    } else {
	        // Nếu món ăn không tồn tại trong menu
	        $this->session->set_flashdata('error', 'Món ăn không có trong menu!');
	    }

	    return redirect(base_url());
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */