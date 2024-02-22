<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-12">
    	<div class="row">
    		<div class="col-lg-12">
	    		<div class="page-header">
		            <div class="page-title">
		                <h1>Danh Sách Món Ăn</h1>
		            </div>
		        </div>
		        <div class="card alert">
		            <div class="card-body">
		                <div class="table-responsive">
		                    <table class="table table-bordered">
		                        <thead>
		                            <tr>
		                                <th>#</th>
		                                <th>Hình Ảnh</th>
		                                <th>Tên Món Ăn</th>
		                                <th>Giá Bán</th>
		                                <th>Số Lượng</th>
		                                <th>Loại Món Ăn</th>
		                                <th>Nhập Số Lượng</th>
		                                <th>Thao Tác</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<?php foreach ($list as $key => $value): ?>
		                        		<tr>
			                                <th scope="row"><?php echo $key + 1; ?></th>
			                                <th>
			                                	<img src="<?php echo $value['HinhAnh']; ?>" style="width: 100px; height: 100px;">
			                                </th>
			                                <td><b><?php echo $value['TenMon']; ?></b></td>
			                                <td>
			                                	<span class="badge badge-danger">
			                                		<?php echo number_format($value['GiaBan']); ?> VND
			                                	</span>
			                            	</td>
			                                <td>
			                                	<span class="badge badge-primary">
			                                		<?php echo $value['SoLuong']; ?> sản phẩm
			                                	</span>
			                                </td>
			                                <td>
			                                	<span class="badge badge-warning">
			                                		<?php echo $value['TenLoaiMonAn']; ?> 
			                                	</span>
			                                </td>
			                                <td>
			                                	<a class="btn btn-primary w-100" href="<?php echo base_url('admin/food/'.$value['MaMonAn'].'/import/') ?>">Nhập Thêm</a>
			                                	<?php if($_SESSION['role'] == 1){ ?>
				                                	<hr>
				                                	<a class="btn btn-success w-100" href="<?php echo base_url('admin/food/'.$value['MaMonAn'].'/history/') ?>">Lịch Sử Nhập</a>
				                                <?php } ?>
			                                </td>
			                                <td>
			                                	<a class="btn btn-success w-100" href="<?php echo base_url('admin/food/'.$value['MaMonAn'].'/update/') ?>">Xem Chi Tiết</a>
			                                	<?php if($_SESSION['role'] == 1){ ?>
				                                	<hr>
				                                	<a class="btn btn-danger w-100" href="<?php echo base_url('admin/food/'.$value['MaMonAn'].'/delete/') ?>">Xóa Món Ăn</a>
				                                <?php } ?>
			                                </td>
			                            </tr>
		                        	<?php endforeach ?>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
    		</div>
    	</div>
    </div>
</div>


<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
