<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?php echo PUBLIC_URL . '/css/login.css' ?>">
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
</head>

<body>
    <!-- <div id="login"></div> -->
    <!-- <div id="register"></div> -->
    <!-- <div id="reset"></div> -->
    <?php echo  '<div id="' . $data['form'] . '"></div>'  ?>
    <header id="header">
        <div class="container">


            <div class="header-logo">
                <img src="img/logo.jpg" alt="" />
                <a href="<?= ROOT_URL ?>"><span class="header-text">Viet-Pham</span></a>
            </div>
            <div class="header-qr">
                <img src="<?= PUBLIC_URL ?>/img/qr.png" alt="" />
            </div>
        </div>
    </header>
    <div class="content">

        <div class="wrapper">
            <div class="register--content">
                <div class="login--button">
                    <span class="text-login">Đã có tài khoản</span>
                    <a class="btn" data-popup-open="register-popup" href="#">Đăng nhập</a>
                </div>
                <form id="id-register" action="<?php echo ROOT_URL . '/buyer/dangky'  ?>" method='post' accept="image/png, image/jpeg" enctype="multipart/form-data">
                    <h1>Đăng ký thành viên</h1>
                    <span class="message"><?php echo !isset($data['message_dk']) ? '' : $data['message_dk'] ?></span>

                    <div class="name">
                        <input type="text" class="inputText" name="ma_kh" <?php echo isset($data['temp']['email']) ? 'value="' . $data['temp']['ma_kh'] . '"' : '' ?> />
                        <span class="floating-label">Tên đăng nhập</span>
                    </div>

                    <div class="password">
                        <input type="password" class="inputText" name="mat_khau" />
                        <span class="floating-label">Mật khẩu</span>
                    </div>
                    <div class="password">
                        <input type="password" class="inputText" name="xac_nhan_mat_khau" required />
                        <span class="floating-label">Nhập Lại mật khẩu</span>
                    </div>
                    <div class="name">
                        <input type="text" class="inputText" name="ho_ten" <?php echo isset($data['temp']['email']) ? 'value="' . $data['temp']['ho_ten'] . '"' : '' ?> required />
                        <span class="floating-label">Họ và tên</span>
                    </div>
                    <div class="email">
                        <input type="text" class="inputText" name="email" <?php echo isset($data['temp']['email']) ?  'value="' . $data['temp']['email'] . '"' : '' ?> required />
                        <span class="floating-label">Địa chỉ email</span>
                    </div>
                    <div class="name">
                        <label for="">Hình</label>
                        <input type="file" name="hinh" />

                    </div>
                    <div class="line"></div>
                    <input type="submit" name="btn_dang_ky" value="Đăng ký" name="dangky">
                </form>
            </div>




            <div class="login--content">

                <div class="login--button">
                    <span class="text-register">Tạo tài khoản mới</span>
                    <a class="btn-reg" data-popup-open="register-popup" href="#">Đăng ký</a>
                </div>
                <h1>Đăng nhập tài khoản của bạn</h1>
                <span class="message"><?php echo !isset($data['message_dn']) ? '' : $data['message_dn'] ?></span>


                <form id="id-login" action="<?php echo ROOT_URL . '/buyer/dangnhap' ?>" method="post">
                    <div class="email">
                        <input type="text" class="inputText" name="ma_kh" />
                        <span class="floating-label">Tên đăng nhập</span>
                    </div>

                    <div class="password">
                        <input type="password" class="inputText" name="mat_khau" />
                        <span class="floating-label">Mật khẩu</span>
                    </div>
                    <div class="name">
                        <input type="checkbox" name="ghi_nho" />
                        <label for="">Ghi nhớ tài khoản?</label>
                    </div>
                    <div class="line"></div>
                    <br>
                    <button class="register-buttton btn-reset">Quên mật khẩu </button>

                    <input type="submit" value="Đăng nhập" name="btn_login">
                </form>
            </div>
        </div>

        <div class="registred">
            <div class="registred--content">
                <h1>lấy lại mật khẩu</h1>
                <form action="<?php echo ROOT_URL . '/buyer/quenpass' ?>" method="post">

                    <div class="email">
                        <input type="text" name="ma_kh" class="inputText" required />
                        <span class="floating-label">Tên đăng nhập</span>
                    </div>

                    <div class="email">
                        <input type="email" name="email" class="inputText" required />
                        <span class="floating-label">Địa chỉ email</span>
                    </div>

                    <button class="btn-reset reset">Đăng ký / Đăng nhập</button>
                    <input type="submit" value="Gửi email" name="pass_reset">
                </form>

            </div>
        </div>

    </div>
</body>
<script src="<?php echo PUBLIC_URL . '/js/login.js' ?>"></script>

</html>