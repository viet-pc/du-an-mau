<form action="<?php echo ADMIN_URL . '/loai' ?>" method="post">
    <div class="mb-3 row">
        <fieldset disabled class="row">
            <label for="staticEmail " class="col-sm-1 col-form-label disabled">Mã loại</label>
            <div class="col-sm-10">
                <input type="text" value="<?php echo $data['chi_tiet_loai'] != '' ? $data['chi_tiet_loai']['ma_loai'] : 'Auto number';  ?>" id="staticEmail" class="form-control" />
            </div>
        </fieldset>
    </div>
    <input type="hidden" name="ma-loai" value="<?php echo $data['chi_tiet_loai'] != '' ? $data['chi_tiet_loai']['ma_loai'] : 'Auto number';  ?>" id="staticEmail" class="form-control" />

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-1 col-form-label">Tên loại</label>
        <div class="col-sm-10">
            <input type="text" name="ten-loai" value="<?php echo $data['chi_tiet_loai'] != '' ? $data['chi_tiet_loai']['ten_loai'] : '';  ?>" class="form-control" id="inputPassword" />
        </div>
    </div>
    <button type="submit" name="<?php echo $data['btn'] ?>" class="btn btn-primary"><?php echo $data['btn'] == 'btn-them-loai' ? 'Thêm' : 'Cập nhật' ?></button>
    <a href="" class="btn btn-info">Nhập lại</a>
    <a href="<?php echo ADMIN_URL . '/danhsachloai' ?>" class="btn btn-success">Danh sách</a>
</form>