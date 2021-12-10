<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">CHỌN</th>
            <th scope="col">MÃ KH</th>
            <th scope="col">HỌ TÊN</th>
            <th scope="col">ĐỊA CHỈ EMAIL</th>
            <th scope="col">HÌNH ẢNH</th>
            <th scope="col">VAI TRÒ</th>
            <th scope="col">KÍCH HOẠT</th>
            <th scope="col">THAY ĐỔI</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['danh_sach_khach_hang'] as $value) : ?>
            <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="ma_kh"><?= $value['ma_kh'] ?></td>
                <td><?= $value['ho_ten'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['hinh'] ?></td>
                <td><?= $value['vai_tro'] == 0 ? 'user' : 'admin' ?></td>
                <td><?= $value['kich_hoat'] == 0 ? 'chưa' : 'rồi' ?></td>
                <td>
                    <a href="<?php echo ADMIN_URL . '/capnhatkhachhang/' . $value['ma_kh'] ?>" class="btn btn-outline-primary">Sữa</a>
                    <a href="<?php echo ADMIN_URL . '/xoakhachhang/' . $value['ma_kh'] ?>" class="btn btn-outline-danger<?php echo $value['ma_kh'] == $_SESSION['user'] ? 'disable' : '' ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <!-- <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td>viet</td>
            <td>phạm công việt</td>
            <td>viet@gmail.com</td>
            <td>viet.jpg</td>
            <td>admin</td>
            <td>
                <a href="" class="btn btn-outline-primary">Sữa</a>
                <a href="" class="btn btn-outline-danger">Xóa</a>
            </td>
        </tr> -->
    </tbody>
</table>
<a href="" class="btn btn-primary check-all">Chọn tất cả</a>
<a href="" class="btn btn-info uncheck-all">Bỏ chọn tất cả</a>
<a href="" class="btn btn-danger xoa-n-khach-hang">Xóa các mục đã chọn</a>
<a href="<?php echo ADMIN_URL . '/khachhang' ?>" class="btn btn-primary">Nhập thêm</a>