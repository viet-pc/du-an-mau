<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">CHỌN</th>
            <th scope="col">MÃ HH</th>
            <th scope="col">TÊN HÀNG HÓA</th>
            <th scope="col">ĐƠN GIÁ</th>
            <th scope="col">GIẢM GIÁ</th>
            <th scope="col">LƯỢT XEM</th>
            <th scope="col">THAY ĐỔI</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['danh_sach_hang_hoa'] as $value) : ?>
            <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="ma_hang_hoa"><?= $value['ma_hh'] ?></td>
                <td><?= $value['ten_hh'] ?></td>
                <td><?= $value['don_gia'] ?></td>
                <td><?php echo (int)($value['giam_gia'] * 100) . '%' ?></td>
                <td><?= $value['so_luot_xem'] ?></td>
                <td>
                    <a href="<?php echo ADMIN_URL . '/hanghoa/' . $value['ma_hh'] ?>" class="btn btn-outline-primary">Sữa</a>
                    <a href="<?php echo ADMIN_URL . '/xoahanghoa/' . $value['ma_hh'] ?>" class="btn btn-outline-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <!-- <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td>123</td>
            <td>quần mới</td>
            <td>222000</td>
            <td>0%</td>
            <td>111</td>
            <td>
                <a href="" class="btn btn-outline-primary">Sữa</a>
                <a href="" class="btn btn-outline-danger">Xóa</a>
            </td>
        </tr> -->
    </tbody>
</table>
<div class="d-flex justify-content-around">
    <nav>
        <a href="" class="btn btn-primary check-all">Chọn tất cả</a>
        <a href="" class="btn btn-info uncheck-all">Bỏ chọn tất cả</a>
        <a href="" class="btn btn-danger xoa-n-hang-hoa">Xóa các mục đã chọn</a>
        <a href="<?php echo ADMIN_URL . '/hanghoa' ?>" class="btn btn-primary">Nhập thêm</a>
    </nav>
    <nav>
        <ul class="pagination">
            <li class="page-item  <?php echo  $data['from'] == $data['page_num'] ? 'disabled' : '' ?> ">
                <a class="page-link" href="<?php echo  ADMIN_URL . '/danhsachhanghoa/' . $data['page_num'] - 1 ?>">Previous</a>
            </li>
            <?php for ($i = $data['from']; $i <= $data['to']; $i++) : ?>
                <li class="page-item <?php echo  $i == $data['page_num'] ? 'active' : '' ?>">
                    <a class="page-link" <?php echo 'href="' . ADMIN_URL . '/danhsachhanghoa/' . $i . ' ">' .  $i ?></a>
                </li>
            <?php endfor ?>
            <!-- <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li> -->
            <li class="page-item  <?php echo  $data['to'] == $data['page_num'] ? 'disabled' : '' ?> ">
                <a class="page-link " href="<?php echo  ADMIN_URL . '/danhsachhanghoa/' . $data['page_num'] + 1 ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>