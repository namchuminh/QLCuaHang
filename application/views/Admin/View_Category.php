<?php require(APPPATH.'views/'.'layouts/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Danh Sách Loại Món Ăn</h1>
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
                                        <th>Tên Loại Món Ăn</th>
                                        <th>Mô Tả</th>
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
                                            <td><b><?php echo $value['TenLoaiMonAn']; ?></b></td>
                                            <td>
                                                <?php echo substr($value['MoTa'], 0, 50); ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success w-100" href="<?php echo base_url('admin/category/'.$value['MaLoaiMonAn'].'/update/') ?>">Xem Chi Tiết</a>
                                                <?php if($_SESSION['role'] == 1){ ?>
                                                    <hr>
                                                    <a class="btn btn-danger w-100" href="<?php echo base_url('admin/category/'.$value['MaLoaiMonAn'].'/delete/') ?>">Xóa Loại Món Ăn</a>
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
