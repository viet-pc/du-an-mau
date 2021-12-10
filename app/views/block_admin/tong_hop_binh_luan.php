<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">HÀNG HÓA</th>
            <th scope="col">SỐ BL</th>
            <th scope="col">MỚI NHẤT</th>
            <th scope="col">CỦ NHẤT</th>
            <th scope="col">THAY ĐỔI</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['ds_binh_luan'] as $value) : ?>
            <tr>
                <td><?= $value['ten_hh'] ?></td>
                <td><?= $value['so_luong'] ?></td>
                <td><?= $value['moi_nhat'] ?></td>
                <td><?= $value['cu_nhat'] ?></td>
                <td>
                    <a href="<?php echo ADMIN_URL . '/chitietbinhluan/' . $value['ma_hh'] ?>" class="btn btn-outline-primary">Chi tiết</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>