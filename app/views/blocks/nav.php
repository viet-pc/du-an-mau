<nav id="top">
    <div class="container">
        <div class="fat">
            <i class="fas fa-mobile-alt"></i>
            <span>Hotline: 0383 38.38.38 - 0383 38.38.38</span>
            <i class="fas fa-map-marker-alt"></i>
            <span>338 Đường Nguyễn Văn Quá, Đông Hưng Thuận, Quận 12</span>
        </div>
        <div class="icon">

            <?php if (!$data['tt_khach_hang'] == '') { ?>
                <div class="user-img-name">
                    <img src="<?php echo PUBLIC_URL . '/img/user/' . $data['tt_khach_hang']['hinh'] ?>" alt="">
                    <span class="username"><?php echo $data['tt_khach_hang']['ho_ten']; ?></span>
                    <div class="list">
                        <button class="btn btn_cap_nhat_tai_khoan">Cập nhật tài khoản</button>
                        <a href="<?= ROOT_URL . '/buyer/dangxuat' ?>">Đăng xuất</a>
                    </div>
                </div>
            <?php } else { ?>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-google-play"></i>
                <i class="fab fa-app-store-ios"></i>
            <?php } ?>
        </div>
    </div>
</nav>
<?php if (!$data['tt_khach_hang'] == '') { ?>
    <div id="phu"></div>
    <div id="update" class="row">
        <div class="btn-close btn-outline-danger"></div>
        <div class="img col-3"><img src="<?php echo PUBLIC_URL . '/img/user/' . $data['tt_khach_hang']['hinh'] ?>" alt="" /></div>
        <div class="form col-9">
            <button class="btn active" id="btn-update-tt">Cập nhật thông tin</button>
            <button class="btn" id="btn-doi-pass">Đổi mật khẩu</button>
            <form id="update-tt" action="<?= ROOT_URL . '/buyer/change' ?>" method="post" enctype="multipart/form-data">
                <label class="col col-form-label">Tên đăng nhập</label>
                <div class="col">
                    <input type="text" disabled value="<?= $data['tt_khach_hang']['ma_kh'] ?>" name="ma_kh" class="form-control" />
                </div>
                <label class="col col-form-label">Họ và tên</label>
                <div class="col">
                    <input type="text" name="ho_ten" value="<?= $data['tt_khach_hang']['ho_ten'] ?>" class="form-control" />
                </div>
                <label class="col col-form-label">Địa chỉ email</label>
                <div class="col">
                    <input type="email" name="email" value="<?= $data['tt_khach_hang']['email'] ?>" class="form-control" />
                </div>
                <label class="col col-form-label">hình</label>
                <div class="col">
                    <input type="file" name="hinh" class="form-control" />
                    <input type="hidden" name="img" value="<?= $data['tt_khach_hang']['hinh'] ?>" class="form-control" />
                </div>
                <input type="submit" class="btn btn-outline-primary" name="btn_edit_user" value="cập nhật" />
            </form>
            <form action="<?= ROOT_URL . '/buyer/change_password' ?>" method="post" id="change_pass">
                <label class="col col-form-label">Mật khẩu củ</label>
                <div class="col">
                    <input type="password" name="mat_khau_cu" class="form-control" />
                </div>
                <label class="col col-form-label">Mật khẩu mới</label>
                <div class="col">
                    <input type="password" name="mat_khau_moi" id="mat_khau_moi" class="form-control" />
                </div>
                <label class="col col-form-label">Xác nhận mật khẩu</label>
                <div class="col">
                    <input type="password" name="mat_khau_xn" class="form-control" />
                </div>
                <input type="submit" class="btn btn-outline-info" name="btn-change_pass" value="Đổi pass" />
            </form>
        </div>
    </div>
<?php } ?>
<style>
    <?php
    require_once 'public/css/nav.css';
    ?>
</style>
<script>
    <?php
    require_once 'public/js/nav.js';
    ?>
</script>