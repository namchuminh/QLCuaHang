<?php require(APPPATH.'views/'.'layouts/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Danh Sách Bàn Ăn</h1>
                    </div>
                </div>
                <div class="card alert">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Bàn</th>
                                        <th>Sức Chứa</th>
                                        <th>Vị Trí</th>
                                        <th>Trạng Thái</th>
                                        <th>Đổi Trạng Thái</th>
                                        <th>Thao Tác</th>
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
                                                    <span class="badge badge-danger">
                                                        Hiện Trống
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-success">
                                                        Sử Dụng
                                                    </span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if($value['DangSuDung'] == 1){ ?>
                                                    <a class="btn btn-danger w-100" href="<?php echo base_url('admin/table/'.$value['MaBanAn'].'/status/') ?>">Bàn Trống</a>
                                                <?php }else{ ?>
                                                    <a class="btn btn-success w-100" href="<?php echo base_url('admin/table/'.$value['MaBanAn'].'/status/') ?>">Sử Dụng</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success w-100" href="<?php echo base_url('admin/table/'.$value['MaBanAn'].'/update/') ?>">Xem Chi Tiết</a>
                                                <?php if($_SESSION['role'] == 1){ ?>
                                                    <hr>
                                                    <a class="btn btn-danger w-100" href="<?php echo base_url('admin/table/'.$value['MaBanAn'].'/delete/') ?>">Xóa Bàn Ăn</a>
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
