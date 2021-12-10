<?php

class admin extends load
{
    public $loai;
    public $hanghoa;
    public $khachhang;
    public $message;
    public function __construct()
    {
        $ma_kh = Session::get('user');
        if ($ma_kh) {
            $tt_khach_hang =  $this->model('m_khach_hang')->khach_hang_select_by_id($ma_kh);
            if ($tt_khach_hang['vai_tro'] == 0) {
                Session::set('admin', true);
                // header('location: ' . ROOT_URL . '/buyer/dangnhap/' . 'Vui lòng đăng nhập tài khoản admin');
            }
        } else {
            Session::set('admin', true);
            header('location: ' . ROOT_URL . '/buyer/dangnhap/' . 'Vui lòng đăng nhập tài khoản admin');
        }
        $this->loai = $this->model('m_loai');
        $this->hanghoa = $this->model('m_hang_hoa');
        $this->khachhang = $this->model('m_khach_hang');
        $this->message = '';
    }
    public function index()
    {
        $this->view("admin_page", [
            'header' => 'QUẢNG TRỊ WEBSITE',
        ]);
    }
    public function loai()
    {

        $chi_tiet_loai = '';
        $btn = 'btn-them-loai';
        if (Shared::exist_param('btn-them-loai')) {
            if (Shared::exist_param('ten-loai') && !empty($_POST['ten-loai'])) {
                if (!$this->loai->loai_insert($_POST['ten-loai'])) {
                    $this->message .= 'Tên loại Đã tồn tại';
                } else {
                    $this->loai->loai_insert($_POST['ten-loai']);

                    $this->message .= 'Thêm thành công';
                }
            } else {
                $this->message .= 'Vui lòng nhập đầy đủ thông tin';
            }
        }
        if (Shared::exist_param('btn-cap-nhat-loai')) {
            if (Shared::exist_param('ten-loai') && !empty($_POST['ten-loai'])) {
                $this->loai->loai_update($_POST['ten-loai'], (int)$_POST['ma-loai']);

                $this->message .= 'Thêm thành công';
            } else {
                $this->message .= 'Vui lòng nhập đầy đủ thông tin';
            }
        }
        $args = func_get_args();
        if (count($args) > 0) {
            $chi_tiet_loai = $this->loai->loai_select_by_id($args[0]);
            $btn = 'btn-cap-nhat-loai';
        }
        $this->view("admin_page", [
            'header' => 'QUẢNG LÝ LOẠI HÀNG',
            'page' => 'them_loai',
            'message' => $this->message,
            'chi_tiet_loai' => $chi_tiet_loai,
            'btn' => $btn,
        ]);
    }
    public function danhsachloai()
    {
        $this->view("admin_page", [
            'header' => 'QUẢNG LÝ LOẠI HÀNG',
            'page' => 'danh_sach_loai',
            'danh_sach_loai' => $this->loai->loai_select_all()
        ]);
    }
    public function xoaloai($ma_loai)
    {
        $this->loai->loai_delete($ma_loai);
        $this->view("admin_page", [
            'header' => 'QUẢNG LÝ LOẠI HÀNG',
            'page' => 'danh_sach_loai',
            'danh_sach_loai' => $this->loai->loai_select_all(),
            'message' => 'Xóa thành công',
        ]);
    }
    public function hanghoa()
    {


        $chi_tiet_hang_hoa = '';
        $btn = 'btn_them_hang_hoa';
        $post = array(
            'ten_hh' => '',
            'don_gia' => '',
            'giam_gia' => '',
            'ma_loai' => '',
            'dac_biet' => '',
            'so_luot_xem' => '',
            'ngay_nhap' => '',
            'hinh' => '',
            'mo_ta' => '',
        );
        if (Shared::exist_param('btn_them_hang_hoa') || Shared::exist_param('btn-cap-nhat-loai')) {

            $post['ten_hh'] = $_POST['ten_hh'];
            $post['don_gia'] = (int)$_POST['don_gia'];
            $post['giam_gia'] = $_POST['giam_gia'];
            $post['hinh'] = $_FILES['hinh']['name'] ? $_FILES['hinh']['name'] : $_POST['img'];
            $post['ma_loai'] = $_POST['ma_loai'];
            $post['dac_biet'] = isset($_POST['dac_biet']) ? $_POST['dac_biet'] : '';
            $post['so_luot_xem'] = $_POST['so_luot_xem'];
            $post['ngay_nhap'] = $_POST['ngay_nhap'];
            $post['mo_ta'] = $_POST['mo_ta'];

            if (!empty($post['ten_hh']) && !empty($post['don_gia']) && !empty($post['ma_loai']) && !empty($post['ngay_nhap'])) {

                if ($_FILES['hinh']['name'] != NULL) {
                    // Kiểm tra file up lên có phải là ảnh không
                    if ($_FILES['hinh']['type'] == "image/jpeg" || $_FILES['hinh']['type'] == "image/png" || $_FILES['hinh']['type'] == "image/gif") {

                        // Nếu là ảnh tiến hành code upload
                        $path = 'public /img/'; // Ảnh sẽ lưu vào thư mục images
                        $tmp_name = $_FILES['hinh']['tmp_name'];
                        $name = $post['hinh'];
                        // Upload ảnh vào thư mục images
                        move_uploaded_file($tmp_name, $path . $name);
                        // $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                    } else {
                        // Không phải file ảnh
                        $this->message = "Kiểu file không phải là ảnh";
                    }
                }

                if ($post['hinh'] != '') {
                    if (Shared::exist_param('btn-cap-nhat-loai')) {
                        $this->hanghoa->hang_hoa_update($_POST['ma_hh'], $post['ten_hh'], $post['don_gia'], $post['giam_gia'], $post['hinh'], $post['ma_loai'], $post['dac_biet'], $post['so_luot_xem'], $post['ngay_nhap'], $post['mo_ta']);
                    } else {
                        $this->hanghoa->hang_hoa_insert($post['ten_hh'], $post['don_gia'], $post['giam_gia'], $post['hinh'], $post['ma_loai'], $post['dac_biet'], $post['so_luot_xem'], $post['ngay_nhap'], $post['mo_ta']);
                    }
                    $this->message = 'Thêm thành công';
                } else {
                    $this->message = "Bạn chưa chọn ảnh upload";
                }
            } else {
                $this->message = 'Vui lòng nhập đầy đủ thông tin';
            }
        }
        $args = func_get_args();
        if (count($args) == 1) {
            $chi_tiet_hang_hoa = $this->hanghoa->hang_hoa_select_by_id($args[0]);
            $btn = 'btn-cap-nhat-loai';
        }
        $this->view("admin_page", [
            'header' => 'QUẢNG LÝ HÀNG HÓA',
            'page' => 'them_hang_hoa',
            'danhsachloai' => $this->loai->loai_select_all(),
            'message' => $this->message,
            'chi_tiet_hang_hoa' => [$chi_tiet_hang_hoa, $post],
            'btn' => $btn,
        ]);
    }
    public function danhsachhanghoa()
    {

        $start_page = 1;
        $size_page = 7;
        $page_num = 1;
        $offset = 3;

        $length = ceil($this->hanghoa->hang_hoa_count_all() / $size_page);
        $args = func_get_args();
        if (count($args) == 1 && is_numeric($args[0]) == true) {
            $page_num = $args[0];
        }
        $start_page = ($page_num - 1) * $size_page;
        $from = ($page_num - $offset) < 1 ? 1 : ($page_num - $offset);
        $to = ($page_num + $offset) > $length ? $length : ($page_num + $offset);
        if (isset($args[1])) {
            $this->message = $args[1];
        }
        $this->view("admin_page", [
            'header' => 'QUẢNG LÝ HÀNG HÓA',
            'page' => 'danh_sach_hang_hoa',
            'danh_sach_hang_hoa' => $this->hanghoa->hang_hoa_select_page($start_page, $size_page),
            'from' => $from,
            'to' => $to,
            'message' => $this->message,
            'page_num' => $page_num,
        ]);
    }
    public function xoahanghoa($ma_hh)
    {
        $this->hanghoa->hang_hoa_delete($ma_hh);
        self::danhsachhanghoa('1', "Xóa thành công");
    }
    public function xoakhachhang($ma_kh)
    {
        $this->khachhang->khach_hang_delete($ma_kh);
        self::danhsachkhachhang('1', "Xóa thành công");
    }
    public function khachhang()
    {
        $ma_kh = '';
        $mat_khau = '';
        $ho_ten = '';
        $img = 'user.jpg';
        $email = '';
        $vai_tro = '';
        $kich_hoat = '';
        if (Shared::exist_param('btn_them_khach_hang') || Shared::exist_param('btn_cap_nhat_khach_hang')) {
            $ma_kh = $_POST['ma_kh'];
            $mat_khau = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);
            $ho_ten = $_POST['ho_ten'];
            $img = $_FILES['hinh']['name'] ? $_FILES['hinh']['name'] : $img;
            $email = $_POST['email'];
            $vai_tro = $_POST['vai_tro'];
            $kich_hoat = $_POST['kich_hoat'];


            if ($this->khachhang->khach_hang_exist($ma_kh) == true) {
                $this->message = 'Tên đăng nhập đẵ tồn tại';
            } else if ($_POST['mat_khau'] != $_POST['xac_nhan_mat_khau']) {
                $this->message = 'NHập lại password sai';
            } else if (!empty($mat_khau) && !empty($ho_ten) && !empty($email)) {
                if ($_FILES['hinh']['name'] != NULL) {
                    // Kiểm tra file up lên có phải là ảnh không
                    if ($_FILES['hinh']['type'] == "image/jpg" || $_FILES['hinh']['type'] == "image/png" || $_FILES['hinh']['type'] == "image/gif") {

                        // Nếu là ảnh tiến hành code upload
                        $path = 'public /img/'; // Ảnh sẽ lưu vào thư mục images
                        $tmp_name = $_FILES['hinh']['tmp_name'];
                        $name = $_FILES['hinh']['name'];
                        // Upload ảnh vào thư mục images
                        move_uploaded_file($tmp_name, $path . $name);
                        // $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                    } else {
                        // Không phải file ảnh
                        $this->message = "Kiểu file không phải là ảnh";
                    }
                }
                $this->khachhang->khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $img, $kich_hoat, $vai_tro);
                $this->message = 'Thêm thành công';
            } else {
                $this->message = 'Vui lòng nhập đầy đủ thông tin';
            }
        }

        $this->view("admin_page", [
            'header' => 'QUẢNG LÝ KHÁCH HÀNG',
            'page' => 'them_khach_hang',
            'message' => $this->message,
            'temp' => [
                'ma_kh' => $ma_kh,
                'ho_ten' => $ho_ten,
                'img' => $img,
                'email' => $email,
                'vai_tro' => $vai_tro,
                'kich_hoat' => $kich_hoat,
            ],
        ]);
    }
    public function capnhatkhachhang($ma_kh)
    {
        $mat_khau = '';
        $ho_ten = '';
        $img = '';
        $email = '';
        $vai_tro = '';
        $kich_hoat = '';
        if (Shared::exist_param('btn_cap_nhat_khach_hang')) {
            $mat_khau = $_POST['mat_khau'];
            $ho_ten = $_POST['ho_ten'];

            $img = $_FILES['hinh']['name'] ? $_FILES['hinh']['name'] : $_POST['img'];
            $email = $_POST['email'];
            $vai_tro = $_POST['vai_tro'];
            $kich_hoat = $_POST['kich_hoat'];

            if (!empty($mat_khau) && !empty($ho_ten) && !empty($email)) {
                if ($_POST['mat_khau_xn'] == $mat_khau) {

                    $tt_khach_hang = $this->model('m_khach_hang')->khach_hang_select_by_id($ma_kh);
                    if ($mat_khau == $tt_khach_hang['mat_khau']) {
                        $mat_khau = $tt_khach_hang['mat_khau'];
                    } else {
                        $mat_khau = password_hash($mat_khau, PASSWORD_DEFAULT);
                    }



                    if ($_FILES['hinh']['name'] != NULL) {
                        // Kiểm tra file up lên có phải là ảnh không
                        if ($_FILES['hinh']['type'] == "image/jpeg" || $_FILES['hinh']['type'] == "image/png" || $_FILES['hinh']['type'] == "image/gif") {

                            // Nếu là ảnh tiến hành code upload
                            $path = 'public /img/'; // Ảnh sẽ lưu vào thư mục images
                            $tmp_name = $_FILES['hinh']['tmp_name'];
                            $name = $_FILES['hinh']['name'];
                            // Upload ảnh vào thư mục images
                            move_uploaded_file($tmp_name, $path . $name);
                            // $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                        } else {
                            // Không phải file ảnh
                            $this->message = "Kiểu file không phải là ảnh";
                        }
                    }
                    $this->khachhang->khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $img, $kich_hoat, $vai_tro);

                    $this->message = 'Cập nhật thành công';
                } else {
                    $this->message = 'Nhập lại mật khẩu không chính xác';
                }
            } else {
                $this->message = 'Vui lòng nhập đầy đủ thông tin';
            }
        }
        $chi_tiet_khach_hang = $this->khachhang->khach_hang_select_by_id($ma_kh);
        $this->view("admin_page", [
            'header' => 'QUẢNG LÝ KHÁCH HÀNG',
            'page' => 'cap_nhat_khach_hang',
            'message' => $this->message,
            'chi_tiet_hang_hoa' => $chi_tiet_khach_hang,
        ]);
    }
    public function danhsachkhachhang()
    {
        $this->view("admin_page", [
            'header' => 'QUẢNG LÝ KHÁCH HÀNG',
            'page' => 'danh_sach_khach_hang',
            'danh_sach_khach_hang' => $this->khachhang->khach_hang_select_all()
        ]);
    }
    public function binhluan()
    {

        $this->view("admin_page", [
            'header' => 'TÔNG HỢP BÌNH LUẬN',
            'page' => 'tong_hop_binh_luan',
            'ds_binh_luan' =>  $this->model('m_thong_ke')->thong_ke_binh_luan(),
        ]);
    }
    public function chitietbinhluan($ma_hh)
    {
        if (isset(func_get_args()[1])) {
            $this->message = func_get_args()[1];
        }
        $this->view("admin_page", [
            'header' => 'CHI TIẾT BÌNH LUẬN',
            'page' => 'chi_tiet_binh_luan',
            'message' =>  $this->message,
            'ds_binh_luan' =>  $this->model('m_binh_luan')->binh_luan_select_by_hang_hoa($ma_hh),
        ]);
    }
    public function xoabinhluan($ma_bl)
    {
        $bl = $this->model('m_binh_luan')->binh_luan_select_by_id($ma_bl);
        $this->message = 'xóa thành công';
        $this->model('m_binh_luan')->binh_luan_delete($ma_bl);
        self::chitietbinhluan($bl['ma_hh'], 'Xóa thành công');
    }
    public function thongke()
    {
        $this->view("admin_page", [
            'header' => 'THÔNG KÊ HÀNG HÓA TỪNG LOẠI',
            'page' => 'thong_ke_hang_hoa_tung_loai',
            'ds_hang_hoa' => $this->model('m_thong_ke')->thong_ke_hang_hoa(),
        ]);
    }
    public function dbthongke()
    {
        $this->view("admin_page", [
            'header' => 'BIỂU ĐỒ THÔNG KÊ',
            'page' => 'bieu_do_thong_ke',
            'ds_hang_hoa' => $this->model('m_thong_ke')->thong_ke_hang_hoa(),
        ]);
    }
}
