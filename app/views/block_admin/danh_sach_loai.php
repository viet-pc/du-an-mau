<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">CHỌN</th>
            <th scope="col">MÃ LOẠI</th>
            <th scope="col">TÊN LOẠI</th>
            <th scope="col">THAY ĐỔI</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['danh_sach_loai'] as $value) : ?>
            <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="ma_loai"><?= $value['ma_loai'] ?></td>
                <td><?= $value['ten_loai'] ?></td>
                <td>
                    <a href="<?php echo ADMIN_URL . '/loai/' . $value['ma_loai'] ?>" class="btn btn-outline-primary">Sữa</a>
                    <a href="<?php echo ADMIN_URL . '/xoaloai/' . $value['ma_loai'] ?>" class="btn btn-outline-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <!-- <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td>12</td>
            <td>áo mới</td>
            <td>
                <a href="" class="btn btn-outline-primary">Sữa</a>
                <a href="" class="btn btn-outline-danger">Xóa</a>
            </td>
        </tr> -->
    </tbody>
</table>
<a href="" class="btn btn-primary check-all">Chọn tất cả</a>
<a href="" class="btn btn-info uncheck-all">Bỏ chọn tất cả</a>
<a href="" class="btn btn-danger xoa-n-loai">Xóa các mục đã chọn</a>
<a href="<?php echo ADMIN_URL . '/loai' ?>" class="btn btn-primary">Nhập thêm</a>