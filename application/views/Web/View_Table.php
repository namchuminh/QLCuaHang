<?php require(APPPATH.'views/'.'webLayouts/header.php'); ?>


<div class="row">
    <div class="col-lg-9">
    	<div class="row">
    		<div class="col-lg-12">
	    		<div class="page-header">
		            <div class="page-title">
		                <h1>Danh Sách Bàn Ăn</h1>
		            </div>
		        </div>
		        <div class="card alert">
		            <div class="card-body">
		                <div class="table-responsive" style="border: none;">
		                    <table class="table">
		                        <thead>
		                            <tr>
		                                <th>#</th>
	                                    <th>Tên Bàn</th>
	                                    <th>Sức Chứa</th>
	                                    <th>Vị Trí</th>
	                                    <th>Trạng Thái</th>
	                                    <th>Chọn Bàn</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<?php foreach ($list as $key => $value): ?>
                                        <tr>
                                            <th scope="row"><?php echo $key + 1; ?></th>
                                            <td><b><?php echo $value['TenBan']; ?></b></td>
                                            <td>
                                                <span class="badge badge-warning">
                                                    <?php echo $value['SucChua']; ?> người / bàn
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    <?php echo $value['ViTri']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if($value['DangSuDung'] == 0){ ?>
                                                    <span class="badge badge-success">
                                                        Hiện Trống
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-danger">
                                                        Sử Dụng
                                                    </span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary w-100" href="<?php echo base_url('order/'.$value['MaBanAn'].'/table/') ?>">Chọn</a>
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
    <!-- /# column -->
    <div class="col-lg-3">
       <div class="page-header">
            <div class="page-title">
                <h1>Menu Của Bạn</h1>
            </div>
        </div>

        <div class="card alert">
            <div class="card-body">
            	<div class="table-responsive" style="border: none;">
                    <table class="table table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Món Ăn</th>
                                <th>Số Lượng</th>
                                <th style="text-align: center;">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if(isset($_SESSION['menu'])){ ?>
	                        	<?php foreach ($menu as $key => $value): ?>
	                        		<tr>
		                                <th scope="row"><?php echo $key + 1; ?></th>
		                                <td><b><?php echo $this->Model_Food->getById($value['mamonan'])[0]['TenMon']; ?></b></td>
		                                <td>
		                                	<span class="badge badge-danger">
		                                		<?php echo $value['soluong']; ?> sản phẩm
		                                	</span>
		                                </td>
		                                <td style="text-align: center;">
		                                	<a href="<?php echo base_url('delete-menu/'.$value['mamonan'].'/'); ?>"><i class="ti-trash"></i></a>
		                                </td>
		                            </tr>
	                        	<?php endforeach ?>
	                        <?php } ?>
                        </tbody>
                    </table>
                    <?php if(!isset($_SESSION['menu']) || count($_SESSION['menu']) <= 0){ ?>
                    	<br>
                    	<p style="text-align: center;">Menu chưa có món ăn nào!</p>
                    <?php }else{ ?>
                    	<br>
                    	<div class="w-100">
                    		<a class="btn btn-primary w-100" href="<?php echo base_url(); ?>">Chọn Thêm Món</a>
                    	</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>


<?php require(APPPATH.'views/'.'webLayouts/footer.php'); ?>
