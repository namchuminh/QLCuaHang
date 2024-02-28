<?php require(APPPATH.'views/'.'layouts/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Danh Sách Hóa Đơn</h1>
                    </div>
                </div>
                <div class="card alert">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã Hóa Đơn</th>
                                        <th>Tên Bàn Ăn</th>
                                        <th>Thời Gian</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                        <th>Thanh Toán</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $key => $value): ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['MaHoaDon']; ?></th>
                                            <td><b><?php echo $value['TenBan']; ?></b></td>
                                            <td>
                                                <span class="badge badge-dark">
                                                    <?php echo $value['ThoiGian']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">
                                                    <?php echo number_format($value['TongTien']); ?> VND
                                                </span>
                                            </td>
                                            <td>
                                                <?php if($value['ThanhToan'] == 0){ ?>
                                                    <span class="badge badge-danger">
                                                        Chưa Thanh Toán
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-success">
                                                        Thanh Toán
                                                    </span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if($value['ThanhToan'] == 0){ ?>
                                                    <a class="btn btn-danger w-100" href="<?php echo base_url('admin/order/'.$value['MaHoaDon'].'/pay/') ?>">Thanh Toán</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success w-100" href="<?php echo base_url('admin/order/'.$value['MaHoaDon'].'/detail/') ?>">Xem Chi Tiết</a>
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
