<?php require(APPPATH.'views/'.'webLayouts/header.php'); ?>




<div class="row">
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Chi Tiết Hóa Đơn #<?php echo $order[0]['MaHoaDon'] ?></h1>
                    </div>
                </div>
                <div class="card alert">
                    <div class="card-body">
                        <div style="line-height: 30px; word-spacing: 2px;">
                            <span style="display: flex;">
                                <b>Mã Hóa Đơn: </b>
                                <p style="margin-left: 10px;">#<?php echo $order[0]['MaHoaDon'] ?></p>
                            </span>
                            <span style="display: flex;">
                                <b>Tên Bàn Ăn: </b>
                                <p style="margin-left: 10px;"><?php echo $order[0]['TenBan'] ?></p>
                            </span>
                            <span style="display: flex;">
                                <b>Thời Gian: </b>
                                <p style="margin-left: 10px;"><?php echo $order[0]['ThoiGian'] ?></p>
                            </span>
                            <span style="display: flex;">
                                <b>Tổng Tiền: </b>
                                <p style="margin-left: 10px;"><?php echo number_format($order[0]['TongTien']) ?> VND</p>
                            </span>
                            <span style="display: flex;">
                                <b>Thanh Toán: </b>
                                <p style="margin-left: 10px;"><?php echo $order[0]['ThanhToan'] == 1 ? "Thanh Toán" : "Chưa Thanh Toán"; ?> </p>
                            </span>
                        </div>
                        <div class="table-responsive" style="border: none;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 150px;">Hình Ảnh</th>
                                        <th>Tên Món Ăn</th>
                                        <th>Số Lượng</th>
                                        <th style="text-align: left;">Đơn Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $key => $value): ?>
                                        <tr>
                                            <th scope="row"><?php echo $key + 1; ?></th>
                                            <td>
                                                <img src="<?php echo $value['HinhAnh']; ?>" width="100px" height="100px">
                                            </td>
                                            <td><b><?php echo $value['TenMon']; ?></b></td>
                                            <td><?php echo $value['SoLuong']; ?> sản phẩm</td>
                                            <td style="text-align: left;"><?php echo number_format($value['SoLuong'] * $value['GiaBan']); ?> VND</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <br>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>">Tiếp Tục Chọn Món</a>
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
                            
                        </tbody>
                    </table>
                        <br>
                        <p style="text-align: center;">Menu chưa có món ăn nào!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>


<?php require(APPPATH.'views/'.'webLayouts/footer.php'); ?>




