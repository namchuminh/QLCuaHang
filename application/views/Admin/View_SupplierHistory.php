<?php require(APPPATH.'views/'.'layouts/header.php'); ?>

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Lịch Sử Nhập: <?php echo $detail[0]['TenNhaCungCap']; ?></h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('admin/supplier/'); ?>">Nhà Cung Cấp</a></li>
                    <li><a href="<?php echo base_url('admin/supplier/'); ?>">Lịch Sử Nhập</a></li>
                    <li class="active"><?php echo $detail[0]['TenNhaCungCap']; ?></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>

<div class="row">
    <div class="col-lg-12">
    	<div class="row">
    		<div class="col-lg-12">

		        <div class="card alert">
		            <div class="card-body">
		                <div class="table-responsive">
		                    <table class="table table-bordered">
		                        <thead>
		                            <tr>
		                                <th>#</th>
		                                <th>Tên Món Ăn</th>
		                                <th>Nhân Viên Nhập</th>
		                                <th>Số Lượng Cũ</th>
		                                <th>Số Lượng Nhập</th>
		                                <th>Tổng Tiền Nhập</th>
		                                <th>Thời Gian</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<?php foreach ($history as $key => $value): ?>
		                        		<tr>
			                                <th scope="row"><?php echo $key + 1; ?></th>
			                                <td><b><?php echo $value['TenMon']; ?></b></td>
			                                <td><b><?php echo $value['TenNhanVien']; ?></b></td>
			                                <td>
			                                	<span class="badge badge-primary">
			                                		<?php echo $value['SoLuongCu']; ?> sản phẩm
			                                	</span>
			                                </td>
			                                <td>
			                                	<span class="badge badge-warning">
			                                		<?php echo $value['SoLuongMoi']; ?> sản phẩm
			                                	</span>
			                                </td>
			                                <td>
			                                	<span class="badge badge-danger">
			                                		<?php echo number_format($value['TongTien']); ?> VND
			                                	</span>
			                            	</td>
			                                <td>
			                                	<span class="badge badge-dark">
			                                		<?php echo $value['ThoiGian']; ?>
			                                	</span>
			                            	</td>
			                            </tr>
		                        	<?php endforeach ?>
		                        </tbody>
		                    </table>
		                    <?php if(count($history) <= 0){ ?>
		                    	<p style="margin-top: 15px; text-align: center;">Nhà cung cấp chưa có lịch sử nhập!</p>
		                    <?php } ?>
		                    <br>
		                    <a href="<?php echo base_url('admin/supplier/') ?>" class="btn btn-default">Quay Lại</a>
		                </div>
		            </div>
		        </div>
    		</div>
    	</div>
    </div>
</div>


<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
