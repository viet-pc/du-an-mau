<form action="<?php echo ADMIN_URL . '/capnhatkhachhang/' . $data['chi_tiet_hang_hoa']['ma_kh'] ?> " method="post" enctype="multipart/form-data">
    <div class="mb-3 row ">
        <fieldset disabled class="col-6  row">
            <label class="col-sm-4 col-form-label">MÃ KHÁCH HÀNG</label>
            <div class="col-sm-8">
                <input required type="text" name="ma_kh" value="<?php echo $data['chi_tiet_hang_hoa']['ma_kh'] ?>" class="form-control" />
            </div>
        </fieldset>
        <label class="col-sm-2 col-form-label">HỌ VÀ TÊN</label>
        <div class="col-sm-4">
            <input required type="text" name="ho_ten" value="<?php echo $data['chi_tiet_hang_hoa']['ho_ten'] ?>" class=" form-control" />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">MẬT KHẨU</label>
        <div class="col-sm-4">
            <input required type="password" value="<?php echo $data['chi_tiet_hang_hoa']['mat_khau'] ?>" name="mat_khau" class="form-control" />
        </div>
        <label class="col-sm-2 col-form-label">XÁC NHẬN MẬT KHẨU</label>
        <div class="col-sm-4">
            <input required type="password" value="<?php echo $data['chi_tiet_hang_hoa']['mat_khau'] ?>" name="mat_khau_xn" class="form-control" />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">ĐỊA CHỈ EMAIL</label>
        <div class="col-sm-4">
            <input required type="email" value="<?php echo $data['chi_tiet_hang_hoa']['email'] ?>" name="email" class="form-control" />
        </div>
        <label class="col-sm-2 col-form-label">HÌNH ẢNH</label>
        <div class="col-sm-4">
            <input type="file" name="hinh" class="form-control" />
            <input type="hidden" value="<?php echo $data['chi_tiet_hang_hoa']['hinh'] ?>" name="img" class="form-control" />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">KÍCH HOẠT?</label>
        <div class="col-sm-4 row">
            <div class="form-check col-sm-6">
                <input required class="form-check-input required" <?php echo $data['chi_tiet_hang_hoa']['kich_hoat'] == 0 ? 'checked' : '' ?> type="radio" name="kich_hoat" value="0" />
                <label class="form-check-label"> Chưa kích hoạt </label>
            </div>
            <div class="form-check col-sm-6">
                <input required class="form-check-input required" <?php echo $data['chi_tiet_hang_hoa']['kich_hoat'] == 1 ? 'checked' : '' ?> type="radio" name="kich_hoat" value="1" />
                <label class="form-check-label"> Đã kích hoạt </label>
            </div>
        </div>
        <label class="col-sm-2 col-form-label">VAI TRÒ</label>
        <div class="col-sm-4 row">
            <div class="form-check col-sm-6">
                <input required class="form-check-input required" <?php echo $data['chi_tiet_hang_hoa']['vai_tro'] == 0 ? 'checked' : '' ?> type="radio" name="vai_tro" value="0" />
                <label class="form-check-label"> KHÁCH HÀNG </label>
            </div>
            <div class="form-check col-sm-6">
                <input required class="form-check-input required" <?php echo $data['chi_tiet_hang_hoa']['vai_tro'] == 1 ? 'checked' : '' ?> type="radio" name="vai_tro" value="1" />
                <label class="form-check-label"> NHÂN VIÊN </label>
            </div>
        </div>
    </div>
    <button type="submit" name="btn_cap_nhat_khach_hang" class="btn btn-primary">Cập nhật</button>
    <a href="" class="btn btn-info">Nhập lại</a>
    <a href="<?php echo ADMIN_URL . '/danhsachkhachhang' ?>" class="btn btn-success">Danh sách</a>
</form>