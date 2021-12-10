<br>
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">HÀNG HÓA: <span class=""><?php echo  $data['ds_binh_luan']['0']['ten_hh'] ?></span></h4>
</div>
<br>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">NỘI DUNG</th>
            <th scope="col">NGÀY BÌNH LUẬN</th>
            <th scope="col">NGƯỜI BÌNH LUẬN</th>
            <th scope="col">THAY ĐỔI</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['ds_binh_luan'] as $value) : ?>
            <tr>
                <td><input type="checkbox"></td>
                <td class="ma_binh_luan"><?= $value['ma_bl'] ?></td>
                <td><?= $value['noi_dung'] ?></td>
                <td><?= $value['ngay_bl'] ?></td>
                <td><?= $value['ma_kh'] ?></td>
                <td>
                    <a href="<?php echo ADMIN_URL . '/xoabinhluan/' . $value['ma_bl'] ?>" class="btn btn-outline-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="" class="btn btn-primary check-all">Chọn tất cả</a>
<a href="" class="btn btn-info uncheck-all">Bỏ chọn tất cả</a>
<a href="" class="btn btn-danger xoa-n-binh_luan">Xóa các mục đã chọn</a>