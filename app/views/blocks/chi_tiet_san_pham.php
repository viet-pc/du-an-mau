<style>
    <?php
    require_once 'public/css/chitietsp.css';
    ?>
</style>

<div class="box-sanpham">
    <div class="hinh-san-pham">
        <div class="hinh-tren" data-background="<?php echo PUBLIC_URL . '/img/' . $data['chitiet']['hinh'] ?>">
        </div>
    </div>
    <div class="thong-tin">
        <h3><?= $data['chitiet']['ten_hh'] ?></h3>
        <div class="don-gia">
            <?php if (!isset($data['chitiet']['giam_gia'])) {
                echo '<p class="gia-goc">' . $data['chitiet']['don_gia'] . '&#36;</p>';
                echo '<p class="gia-ban">' . number_format(($data['chitiet']['don_gia'] - ($data['chitiet']['don_gia'] * $data['chitiet']['giam_gia'])), 2)  . '&#36;</p>';
                echo '<p class="giam-gia">' . $data['chitiet']['giam_gia'] * 100 . '% GIẢM</p>';
            } else {
                echo '<p class="gia-ban">' . $data['chitiet']['don_gia'] . '&#36;</p>';
            }
            ?>

        </div>

        <div class="size-box">
            <div class="kichthuoc">
                <div class="size size-chon">M</div>
                <div class="size">L</div>
                <div class="size">XL</div>
            </div>

            <div class="cach-chon-size">
                <a href="https://citimode.vn/cach-chon-size-vay/" target="blank">CÁCH CHỌN SIZE</a>
            </div>
        </div>
        <!-- <div class="color-box">
            <div class="color1">
                <div class="ten-color">Trắng</div>
                <div class="mau-color">
                    <div class="mau-trong-color"></div>
                </div>
            </div>
            <div class="mau2">
                <div class="ten-color ten-color2 ">Đen</div>
                <div class="mau-color mau-color2">
                    <div class="mau-trong-color2"></div>
                </div>
            </div>

        </div> -->
        <div class="soluong-box">
            <div class="tru">-</div>
            <div class="soluong">1</div>
            <div class="cong">+</div>
        </div>
        <a href=""></a>
        <a href="/xshop/buyer" class="btn mau-ngay-box"> Mua Ngay</a>
        <a href="giohang.html" class="btn them-vao-gio-box"> THÊM VÀO GIỎ</a>
    </div>
</div>
<div class="mo_ta_hh row g-0">
    <div class="left col-9">
        <header>
            <button id="mo-ta" class="btn active">Mô tả</button>
            <button id="danh-gia" class="btn">Đánh giá</button>
        </header>
        <div id="noi-dung-mo-ta">
            <h4>Mô tả</h4>
            <p><?php echo $data['chitiet']['mo_ta']; ?></p>

        </div>
        <div id="noi-dung-danh-gia">
            <h4>Đánh giá</h4>
            <!-- <div class="box">
                <span class="cho-duyet">Nhận xét của bạn đang chờ được kiểm duyệt</span>
                <span class="name-user">viet - </span> <span class="ngay">29 tháng 9 2021</span>
                <p class="noi-dung-binh-luan">ewdwefwef</p>
                <div class="img">
                    <img src="<?php echo PUBLIC_URL . '/img/user/user.png' ?>" alt="">
                </div>
            </div> -->
            <?php foreach ($data['ds_binh_luan'] as $value) : ?>
                <div class="box">
                    <span class="name-user"><?= $value['ho_ten'] ?> </span> <span class="ngay"><?= $value['ngay_bl'] ?></span>
                    <p class="noi-dung-binh-luan"><?= $value['noi_dung'] ?></p>
                    <div class="img">
                        <img src="<?php echo PUBLIC_URL . '/img/user/' . $value['hinh'] ?>" alt="">
                    </div>
                </div>
            <?php endforeach; ?>
            <span id="them-danh-gia">Thêm đánh giá</span> <br>
            <form action="<?php echo ROOT_URL . '/chitiet/thembl/' . $data['chitiet']['ma_hh'] ?>" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nhận xét của bạn *</label>
                    <textarea required name="danh_gia" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <?php if (isset($_SESSION['user'])) {
                    echo '<button class="btn btn-outline-secondary btn-gui-bl">Gửi đi</button>';
                } else {
                    echo '<span>Bạn cần đăng nhập để bình luận</span> <br/>';
                    echo '<a href="' . ROOT_URL . '/buyer/dangnhap" class="btn btn-primary" >Đăng nhập</a>';
                } ?>
            </form>
        </div>
    </div>
    <div class="right col-3">
        <h2>CÁC SẢN PHẨM CÙNG LOẠI</h2>
        <div class="sanpham">
            <?php foreach ($data['hang_hoa_theo_loai'] as $value) {
                if ($value['ma_hh'] == $data['chitiet']['ma_hh']) {
                    continue;
                }
                echo '<a href="' .  ROOT_URL . '/chitiet/hanghoa/' . str_replace(' ', '-', $value['ten_hh']) . '" class="sp">';
                echo '<img src="' .  PUBLIC_URL . '/img/' . $value['hinh'] . '" alt="sản phảm" />';
                echo '<p>' . $value['ten_hh'] . '</p>';
                echo '<div class="gia d-flex justify-content-between">';
                echo     '<strong class="don_gia">' . $value['don_gia'] . '&#36;</strong>';
                echo '<span>' . $value['so_luot_xem'] . ' lươt xem</span>';
                echo '</div>';
                echo '</a>';
            } ?>
        </div>
    </div>
</div>