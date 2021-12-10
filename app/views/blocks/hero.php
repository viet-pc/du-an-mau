<section id="hero" class="d-flex justify-content-between">
    <div class="hero-list border-radius">
        <h5>TẤT CẢ SẢN PHẨM</h5>
        <ul>
            <?php foreach ($data['dsloai'] as $value) {
                echo '<li><a href="' . ROOT_URL . '/listProduct/index/' . $value['ten_loai'] . '" class="hero-list-text">' . $value['ten_loai'] . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <div class="hero-slider border-radius col-6">
        <div class="banner2" id="slider">
            <i class="button btn-left fas fa-chevron-circle-left"></i>
            <i class="button btn-right fas fa-chevron-circle-right"></i>
            <!-- <img class="btn btn-left" src="./img/btn-left.png" alt="" />
            <img class="btn btn-right" src="./img/btn-right.png" alt="" /> -->
            <div class="img">
                <div class="hero-slider-banner img-1">
                    <!-- <img src="./img/dhvts-1.jpg" alt="" /> -->
                </div>
                <div class="hero-slider-banner img-2">
                    <!-- <img src="./img/dhvts-2.jpg" alt="" /> -->
                </div>
                <div class="hero-slider-banner img-3">
                    <!-- <img src="./img/dhvts-3.jpg" alt="" /> -->
                </div>
            </div>
        </div>
    </div>
    <div class="hero-user border-radius">

        <?php if (!empty($data['tt_khach_hang']['ho_ten'])) { ?>
            <section id="user">
                <div class="avatar"><img src="<?= PUBLIC_URL . '/img/user/' . $data['tt_khach_hang']['hinh'] ?>" alt=""></div>
                <div class="dangnhap">
                    <a class="login dangnhap-hieuung btn_cap_nhat_tai_khoan">Cập nhật</a>
                    <a href="<?= ROOT_URL . '/buyer/dangxuat' ?>" class="logout dangnhap-hieuung">Đăng xuất</a>
                </div>
                <div class="users">
                    <?php if ($data['admin'] == true) : ?>
                        <div class="l"><a href="<?php echo ROOT_URL . '/admin' ?>"></i>Quản lý</a></div>
                    <?php endif; ?>

                    <!-- <div class="l"><a href="giohang.html"><i class="fas fa-credit-card"></i>Thanh toán</a></div> -->
                    <!-- <div class="l"><a href="giohang.html"><i class="fas fa-shopping-cart"></i>Giỏ Hàng</a></div> -->
                </div>
            </section>
        <?php } else {
            echo '<span class="btn hero-user-label-login active" id="dn-btn">
            Đăng Nhập
        </span>
        <form id="id-login" action="' . ROOT_URL . '/buyer/dangnhap' . '" method="post">
            <div id="form-dn">
                <form action="">
                    <label for="">
                        <input type="text" name="ma_kh"  placeholder="Tên đăng nhâp " />
                        <i class="fas fa-user"></i>
                    </label>
                    <label for="">
                        <input type="password" name="mat_khau"  id="" placeholder="Mật khẩu" />
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="checkbox" name="ghi_nho" />
                        <label for="">Ghi nhớ tài khoản?</label>
                    <button type="submit" name="btn_login" class="btn hero-user-btn-login">
                        Đăng nhập
                    </button>
                </form>
                <div class="hero-user-other d-flex justify-content-end">
                    <a href="' . ROOT_URL . '/buyer/laylaimatkhau">quên mật khẩu</a>
                    <a href="' . ROOT_URL . '/buyer/dangky">đăng ký</a>
                </div>
            </div>
        </form>';
        }




        ?>


    </div>
</section>