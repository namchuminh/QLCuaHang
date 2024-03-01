<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Quản Lý Bàn Ăn</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('admin/table/'); ?>">Bàn Ăn</a></li>
                    <li class="active"><?php echo $detail[0]['TenBan'] ?></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Nhập Thông Tin Bàn Ăn</h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Bàn Ăn</label>
                            <input type="text" class="form-control" placeholder="Tên Bàn Ăn *" name="tenban" value="<?php echo $detail[0]['TenBan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Sức Chứa (Người / bàn)</label>
                            <input type="number" class="form-control" placeholder="Số Người *" name="succhua" value="<?php echo $detail[0]['SucChua'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Vị Trí</label>
                            <input type="text" class="form-control" placeholder="Vị Trí *" name="vitri" value="<?php echo $detail[0]['ViTri'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <select class="form-control" name="dangsudung">
                                <?php if($detail[0]['DangSuDung'] == 1){ ?>
                                    <option value="0">Hiện Trống</option>
                                    <option value="1" selected>Sử Dụng</option>
                                <?php }else{ ?>
                                    <option value="0" selected>Hiện Trống</option>
                                    <option value="1">Sử Dụng</option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div>
                        	<a class="btn btn-default" href="<?php echo base_url('admin/table/'); ?>">Quay Lại</a>
                            <?php if($_SESSION['role'] == 1){ ?>
                        	   <button type="submit" class="btn btn-primary">Cập Nhật Bàn Ăn</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
