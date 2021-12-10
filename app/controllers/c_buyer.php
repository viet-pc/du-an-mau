<?php

class buyer extends load
{
    function __construct()
    {
        $ma_kh = Session::get('user');
        if ($ma_kh) {
            $tt_khach_hang =  $this->model('m_khach_hang')->khach_hang_select_by_id($ma_kh);

            if ($tt_khach_hang['vai_tro'] == 0 && Session::get('admin') == true) {
                Session::unset('admin');
            } else {
                header("location:javascript://history.go(-1)");
            }
        }
    }
    public function index()
    {
        $form = '';
        $this->view('/blocks/login', [
            'form' => $form,
        ]);
    }
    public function dangnhap($message_dn = '')
    {
        // lấy thời gian hiện tại
        $current_time = time();

        // thời gian hết hạng của cookie là 1 tháng
        $cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);



        if (Shared::exist_param("btn_login")) {

            $ma_kh = $_POST['ma_kh'];
            $mat_khau = $_POST['mat_khau'];

            $xac_thuc = false;

            $user = $this->model('m_khach_hang')->khach_hang_select_by_id($ma_kh);
            if (!empty($user) && password_verify($mat_khau, $user['mat_khau'])) {
                $xac_thuc = true;
            }

            if ($xac_thuc === true) {
                $_SESSION["user"] = $ma_kh;
                if (Shared::exist_param("ghi_nho")) {
                    $chon_auto = Shared::random(32);

                    Cookie::add_cookie("ma_kh", $ma_kh, $cookie_expiration_time);
                    Cookie::add_cookie("chon_auto", $chon_auto,  $cookie_expiration_time);

                    $chon_auto_hash = password_hash($chon_auto, PASSWORD_DEFAULT);
                    $ngay_het_hang = date("Y-m-d H:i:s", $cookie_expiration_time);

                    $tt_nguoi_dung = $this->model('m_luu_dang_nhap')->luu_dang_nhap_get_by_ma_kh($ma_kh, 0);
                    if (!empty($tt_nguoi_dung["id"])) {
                        $this->model('m_luu_dang_nhap')->luu_dang_nhap_disable($tt_nguoi_dung["id"]);
                    }
                    $this->model('m_luu_dang_nhap')->luu_dang_nhap_insert($ma_kh, $chon_auto_hash, $ngay_het_hang);
                } else {
                    Shared::huy_cookie_user();
                }
                $message_dn = "Đăng nhập thành công!";
                header('location: ' . ROOT_URL . '/home/index/' . $message_dn);
            } else {

                $message_dn = ' Tên đang nhập hoặc mật khẩu không chính xác';
            }
        }

        $this->view('/blocks/login', [
            'form' => 'dangnhap',
            'message_dn' => $message_dn,
        ]);
    }
    public function laylaimatkhau()
    {
        $this->view('/blocks/login', [
            'form' => 'laylaimatkhau',
        ]);
    }
    public function dangky()
    {
        $message_dk = '';
        $ma_kh = '';
        $mat_khau = '';
        $ho_ten = '';
        $img = 'user.jpg';
        $email = '';
        if (Shared::exist_param('btn_dang_ky')) {

            $ma_kh = $_POST['ma_kh'];
            $mat_khau = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);
            $ho_ten = $_POST['ho_ten'];
            $img = $_FILES['hinh']['name'] ? $_FILES['hinh']['name'] : $img;
            $email = $_POST['email'];

            if ($this->model('m_khach_hang')->khach_hang_exist($ma_kh) == true) {
                $message_dk = 'Tên đăng nhập đẵ tồn tại';
            } else if ($_POST['mat_khau'] != $_POST['xac_nhan_mat_khau']) {
                $message_dk = 'Nhập lại mật khẩu sai';
            } else if (!empty($mat_khau) && !empty($ho_ten) && !empty($email)) {
                if ($_FILES['hinh']['name'] != NULL) {
                    // Kiểm tra file up lên có phải là ảnh không
                    if ($_FILES['hinh']['type'] == "image/jpeg" || $_FILES['hinh']['type'] == "image/png" || $_FILES['hinh']['type'] == "image/gif") {

                        // Nếu là ảnh tiến hành code upload
                        $path = 'public/img/user/'; // Ảnh sẽ lưu vào thư mục img user
                        $tmp_name = $_FILES['hinh']['tmp_name'];
                        $name = $_FILES['hinh']['name'];
                        // Upload ảnh vào thư mục images
                        move_uploaded_file($tmp_name, $path . $name);
                        // $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                    } else {
                        // Không phải file ảnh
                        $message_dk = "Kiểu file không phải là ảnh";
                    }
                }
                $_SESSION["user"] = $ma_kh;
                $this->model('m_khach_hang')->khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $img, 0, 0);
                $message_dk = 'Đăng ký thành công';
                header('location: ' . ROOT_URL . '/home/index/' . $message_dk);
            } else {
                $message_dk = 'Vui lòng nhập đầy đủ thông tin';
            }
        }
        $this->view('/blocks/login', [
            'form' => 'dangky',
            'message_dk' => $message_dk,
            'temp' => [
                'ma_kh' => $ma_kh,
                'ho_ten' => $ho_ten,
                'ho_ten' => $ho_ten,
                'email' => $ma_kh,
                'ma_kh' => $ma_kh,
            ],
        ]);
    }
    public function dangxuat()
    {
        Session::unset('user');
        Session::destroy();

        Cookie::delete_cookie('ma_kh');
        Cookie::delete_cookie('chon_auto');

        header('Location: ' . ROOT_URL);
    }
    public function quenpass()
    {
        if (isset($_POST['pass_reset'])) {
            $thongbao = "";

            $email = trim(strip_tags($_POST['email']));
            $ma_kh = trim(strip_tags($_POST['ma_kh']));

            if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $thongbao = "email không đung";
            }

            $khach_hang = $this->model('m_khach_hang');
            $khach_hang_exist = $khach_hang->khach_hang_exist_email($ma_kh, $email);
            if (!$khach_hang_exist) {
                $thongbao = "email hoặc tên tài khoản không đúng";
            } else {
                $pass_moi = Shared::random(6);


                $pass_moi_hash = password_hash($pass_moi, PASSWORD_DEFAULT);
                $kq = $khach_hang->khach_hang_change_password($ma_kh, $pass_moi_hash);

                if ($kq = 1) {
                    $thongbao = "Cập nhập thành công <br>";
                } else {
                    $thongbao = "Cập nhập không thành công<br>";
                }


                // gưi mail
                require_once("public/contents/PHPMailer-master/src/PHPMailer.php");

                require_once("public/contents/PHPMailer-master/src/Exception.php");

                require_once "public/contents/PHPMailer-master/src/OAuth.php";

                require_once "public/contents/PHPMailer-master/src/SMTP.php";

                $mail = new PHPMailer\PHPMailer\PHPMailer(true);

                try {

                    $mail->SMTPDebug = 0; //chế độ full debug, khi mọi thứ ok thì chỉnh lại 0

                    $mail->isSMTP(); // Set mailer to use SMTP

                    $mail->Host = 'smtp.gmail.com'; // Server gửi thư

                    $mail->SMTPAuth = true;

                    $mail->Username = 'vietpcps15786@fpt.edu.vn'; // ví dụ: abc@gmail.com

                    $mail->Password = 'Matkhaudadoi1';

                    $mail->SMTPSecure = 'ssl'; //TLS hoặc `ssl`

                    $mail->Port = 465; // 587 hoặc 465

                    $mail->CharSet = "UTF-8";

                    $mail->smtpConnect(
                        [
                            "ssl" => [

                                "verify_peer" => false,

                                "verify_peer_name" => false,

                                "allow_self_signed" => true

                            ]

                        ]

                    );

                    //Khai báo người gửi và người nhận mail

                    $mail->setFrom('vietpcps15786@fpt.edu.vn', 'Ban quản trị website');

                    $mail->addAddress("{$email}", 'Quý khách');

                    $mail->isHTML(true); // nội dung của email có mã HTML

                    $mail->Subject = 'Cấp lại mật khẩu mới';

                    $mail->Body = "Đây là mật khẩu mới của bạn <b> {$pass_moi} </b>";

                    $mail->send();

                    $thongbao = "Đã gửi mật khẩu mới vào mail thành công <br>";
                } catch (Exception $e) {
                    $thongbao = "Lỗi khi gửi thư: " . $mail->ErrorInfo;
                }
            }
        }
        header('location: ' . ROOT_URL . '/home/index/' . $thongbao);
    }
    public function change()
    {
        $khach_hang =  $this->model('m_khach_hang');
        $messages = '';
        if (Shared::exist_param('btn_edit_user')) {
            $ma_kh = Session::get('user');
            $tt_khach_hang =  $khach_hang->khach_hang_select_by_id($ma_kh);
            $mat_khau = $tt_khach_hang['mat_khau'];
            $ho_ten = $_POST['ho_ten'];
            $img = $_FILES['hinh']['name'] ? $_FILES['hinh']['name'] : $_POST['img'];
            $email = $_POST['email'];

            if (!empty($ho_ten) && !empty($email)) {
                if ($_FILES['hinh']['name'] != NULL) {
                    // Kiểm tra file up lên có phải là ảnh không
                    if ($_FILES['hinh']['type'] == "image/jpeg" || $_FILES['hinh']['type'] == "image/png" || $_FILES['hinh']['type'] == "image/gif") {
                        // Nếu là ảnh tiến hành code upload
                        $path = 'public/img/user/'; // Ảnh sẽ lưu vào thư mục img user
                        $tmp_name = $_FILES['hinh']['tmp_name'];
                        $name = $_FILES['hinh']['name'];
                        // Upload ảnh vào thư mục images
                        move_uploaded_file($tmp_name, $path . $name);
                        // $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                    } else {
                        // Không phải file ảnh
                        $messages = "Kiểu file không phải là ảnh";
                    }
                }


                $capnhat =  $khach_hang->khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $img, $tt_khach_hang['kich_hoat'],  $tt_khach_hang['vai_tro']);
                // Session::unset('user');
                // Session::set('user', $khach_hang->khach_hang_select_by_id($ma_kh));

                $messages = 'Cập nhật thông tin thành công';
            } else {
                $messages = 'Vui lòng nhập đầy đủ thông tin';
            }
        }
        header('location: ' . ROOT_URL . '/home/index/' . $messages);
    }
    public function change_password()
    {
        $khach_hang =  $this->model('m_khach_hang');
        $messages = '';

        if (Shared::exist_param('btn-change_pass')) {
            $mat_khau_cu = $_POST['mat_khau_cu'];
            $mat_khau_moi = $_POST['mat_khau_moi'];
            $mat_khau_xn = $_POST['mat_khau_xn'];

            $tt_khach_hang =  $khach_hang->khach_hang_select_by_id(Session::get('user'));
            if (password_verify($mat_khau_cu, $tt_khach_hang['mat_khau'])) {
                $mat_khau_moi_hash = password_hash($mat_khau_moi, PASSWORD_DEFAULT);
                if ($mat_khau_moi == $mat_khau_xn) {
                    $capnhat =  $khach_hang->khach_hang_change_password($tt_khach_hang['ma_kh'], $mat_khau_moi_hash);
                    $messages = 'cập nhật mật khẩu thành công';
                } else {
                    $messages = 'Xác nhận mật khẩu không chính xác';
                }
            } else {
                $messages = 'Nhập Mật khẩu củ không chính xác';
            }
        }
        header('location: ' . ROOT_URL . '/home/index/' . $messages);
    }
}
