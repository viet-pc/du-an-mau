<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">LOẠI HÀNG</th>
            <th scope="col">SỐ LƯƠNG</th>
            <th scope="col">GIÁ CAO NHẤT</th>
            <th scope="col">GIÁ THẬP NHẤP</th>
            <th scope="col">GIÁ TRUNG BÌNH</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['ds_hang_hoa'] as $value) : ?>
            <tr>
                <td><?php echo $value['ten_loai'] ?></td>
                <td><?php echo $value['so_luong'] ?></td>
                <td><?php echo number_format($value['gia_max'], 2) ?></td>
                <td><?php echo number_format($value['gia_min'], 2) ?></td>
                <td><?php echo number_format($value['gia_avg'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo ADMIN_URL . '/dbthongke' ?>" class="btn btn-primary">Xem biểu đồ</a>