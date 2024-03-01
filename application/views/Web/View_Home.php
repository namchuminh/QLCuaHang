<?php require(APPPATH.'views/'.'webLayouts/header.php'); ?>


<div class="row">
    <div class="col-lg-9">

    	<?php foreach ($category as $key => $value): ?>
    		<?php if(count($this->Model_Food->getByCategoryId($value['MaLoaiMonAn'])) >= 1){ ?>
		    	<div class="row">
		    		<div class="col-lg-12">
			    		<div class="page-header">
				            <div class="page-title">
				                <h1><?php echo $value['TenLoaiMonAn']; ?></h1>
				            </div>
				        </div>
				        <div class="card alert">
				            <div class="card-body">
				                <div class="table-responsive" style="border: none;">
				                    <table class="table">
				                        <thead>
				                            <tr>
				                                <th>#</th>
				                                <th>Hình Ảnh</th>
				                                <th>Tên Món Ăn</th>
				                                <th>Giá Bán</th>
				                                <th>Số Lượng Còn</th>
				                                <th>Loại Món Ăn</th>
				                                <th>Thêm Vào Menu</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                        	<?php foreach ($this->Model_Food->getByCategoryId($value['MaLoaiMonAn']) as $key => $value): ?>
				                        		<form method="POST" action="<?php echo base_url('add-menu/'); ?>">
					                        		<tr>
						                                <th scope="row"><?php echo $key + 1; ?></th>
						                                <td>
						                                	<img src="<?php echo $value['HinhAnh']; ?>" width="100px" height="100px">
						                                </td>
						                                <td><b><?php echo $value['TenMon']; ?></b></td>
						                                
						                                <td>
						                                	<span class="badge badge-danger">
						                                		<?php echo number_format($value['GiaBan']); ?> VND / 1 sản phẩm
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
						                                <td style="width: 100px;">
						                                	<input class="form-control" type="number" name="soluong" placeholder="Số lượng" min="1" max="<?php echo $value['SoLuong']; ?>" required>
						                           			<input class="form-control" type="hidden" name="mamonan" value="<?php echo $value['MaMonAn']; ?>">
						                                	<br>
						                                	<button type="submit" class="btn btn-primary"><i class="ti-shopping-cart"></i> Thêm Menu</button>
						                                </td>
						                            </tr>
						                        </form>
				                        	<?php endforeach ?>
				                        </tbody>
				                    </table>
				                </div>
				            </div>
				        </div>

		    		</div>
		    	</div>
		    <?php } ?>
	    <?php endforeach ?>
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
                    		<a class="btn btn-primary w-100" href="<?php echo base_url('table/'); ?>">Chọn Bàn Ăn</a>
                    	</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>


<?php require(APPPATH.'views/'.'webLayouts/footer.php'); ?>
