<form action="<?php echo ADMIN_URL . '/hanghoa'; ?>" method="post" enctype="multipart/form-data">
    <div class=" mb-3 row">
        <div class="col-sm-4">
            <fieldset disabled>
                <label class="col-form-label">HÀNG HÓA</label>
                <input required type="text" class="form-control" value="<?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['ma_hh'] : 'Auto number';  ?>" />
            </fieldset>
        </div>
        <input required type="hidden" name="ma_hh" class="form-control" value="<?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['ma_hh'] : 'Auto number';  ?>" />

        <div class="col-sm-4">
            <label class="col-form-label">TÊN HÀNG HÓA</label>
            <input required type="text" value="<?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['ten_hh'] : $data['chi_tiet_hang_hoa']['1']['ten_hh'];  ?>" name="ten_hh" class="form-control" />
        </div>
        <div class="col-sm-4">
            <label class="col-form-label">DƠN GIÁ</label>
            <input required type="number" min="0" value="<?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['don_gia'] : $data['chi_tiet_hang_hoa']['1']['don_gia'];  ?>" name="don_gia" class="form-control" />
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-4">
            <label class="col-form-label">GIẢM GIÁ</label>
            <input required type="number" value="<?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['giam_gia'] : $data['chi_tiet_hang_hoa']['1']['giam_gia'];  ?>" name="giam_gia" class="form-control" min="0" max="1" step="0.01" />
        </div>
        <div class="col-sm-4">
            <label class="col-form-label">HÌNH ẢNH</label>
            <input type="file" accept="image/png, image/jpeg" name="hinh" class="form-control" />
            <input type="hidden" name="img" value="<?php if (!empty($data['chi_tiet_hang_hoa']['0'])) {
                                                        echo $data['chi_tiet_hang_hoa']['0']['hinh'];
                                                    } else if (!empty($data['chi_tiet_hang_hoa']['1'])) {
                                                        echo $data['chi_tiet_hang_hoa']['1']['hinh'];
                                                    } ?>">
        </div>
        <div class="col-sm-4">
            <label class="col-form-label">LOẠI HÀNG</label>
            <select class="form-select" required name="ma_loai" aria-label="Default select example">
                <option value="0">chọn loại hang</option>
                <?php foreach ($data['danhsachloai'] as $value) : ?>
                    <option <?php echo 'value="' . $value['ma_loai'] . '"';
                            echo $data['chi_tiet_hang_hoa']['0'] != '' && $data['chi_tiet_hang_hoa']['0']['ma_loai'] == $value['ma_loai'] || $data['chi_tiet_hang_hoa']['1'] != '' && $data['chi_tiet_hang_hoa']['1']['ma_loai'] == $value['ma_loai'] ? 'selected' : '';  ?>><?php echo $value['ten_loai'] ?></option>

                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class=" mb-3 row">
        <div class="col-sm-4">
            <label class="col-form-label">HÀNG ĐẶC BIỆT</label>
            <div class="row">
                <div class="form-check col-sm-6">
                    <input required class="form-check-input 	required" <?php echo  $data['chi_tiet_hang_hoa']['1']['dac_biet'] == 0 || ($data['chi_tiet_hang_hoa']['0'] != '' && $data['chi_tiet_hang_hoa']['0']['dac_biet'] == 0) ? 'checked' : ''; ?> type="radio" name="dac_biet" value="0" />
                    <label class="form-check-label"> Bình thương </label>
                </div>
                <div class="form-check col-sm-6">
                    <input required class="form-check-input 	required" <?php echo $data['chi_tiet_hang_hoa']['1']['dac_biet'] == 1 || ($data['chi_tiet_hang_hoa']['0'] != '' && $data['chi_tiet_hang_hoa']['0']['dac_biet'] == 1) ? 'checked' : '';  ?> type="radio" name="dac_biet" value="1" />
                    <label class="form-check-label"> Đặc biệt </label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <label class="col-form-label">NGÀY NHẬP</label>
            <input required type="date" max="<?= date('Y-m-d'); ?>" value="<?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['ngay_nhap'] : $data['chi_tiet_hang_hoa']['1']['ngay_nhap'];  ?>" name="ngay_nhap" class="form-control" />
        </div>
        <input required type="hidden" class="form-control" value="<?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['so_luot_xem'] : '0';  ?>" name="so_luot_xem" />

        <div class="col-sm-4">
            <fieldset disabled>
                <label class="col-form-label">SỐ LƯỢC XEM</label>
                <input type="text" class="form-control" value="<?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['so_luot_xem'] : '0';  ?>" />
            </fieldset>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">MÔ TẢ</label>
        <textarea required name="mo_ta" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $data['chi_tiet_hang_hoa']['0'] != '' ? $data['chi_tiet_hang_hoa']['0']['mo_ta'] : $data['chi_tiet_hang_hoa']['1']['mo_ta'];  ?></textarea>
    </div>
    <button type="submit" name="<?php echo $data['btn'] ?>" class="btn btn-primary"><?php echo $data['btn'] == 'btn_them_hang_hoa' ? 'Thêm' : 'Cập nhật' ?></button>
    <a href="" class="btn btn-info">Nhập lại</a>
    <a href="<?php echo ADMIN_URL . '/danhsachhanghoa' ?>" class="btn btn-success">Danh sách</a>
</form>