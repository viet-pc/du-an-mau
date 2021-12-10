<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link <?php echo $data['header'] == 'QUẢNG TRỊ WEBSITE' ? 'active' : '' ?> " aria-current="page" href="<?php echo ROOT_URL ?> ">Về Website</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $data['header'] == 'QUẢNG LÝ LOẠI HÀNG' ? 'active' : '' ?>" href="<?php echo ADMIN_URL ?>/loai">Loại hàng</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $data['header'] == 'QUẢNG LÝ HÀNG HÓA' ? 'active' : '' ?>" href="<?php echo ADMIN_URL ?>/hanghoa">Hàng hóa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $data['header'] == 'QUẢNG LÝ KHÁCH HÀNG' ? 'active' : '' ?>" href="<?php echo ADMIN_URL ?>/khachhang">Khách hàng</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $data['header'] == 'TÔNG HỢP BÌNH LUẬN' || $data['header'] == 'CHI TIẾT BÌNH LUẬN' ? 'active' : '' ?>" href="<?php echo ADMIN_URL ?>/binhluan">Bình luận</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $data['header'] == 'THÔNG KÊ HÀNG HÓA TỪNG LOẠI' || $data['header'] == 'BIỂU ĐỒ THÔNG KÊ'  ? 'active' : '' ?>" href="<?php echo ADMIN_URL ?>/thongke">Thống kê</a>
    </li>
</ul>