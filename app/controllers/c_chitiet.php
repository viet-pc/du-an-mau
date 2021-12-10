<?php
class chitiet extends load
{
    function hanghoa($ten_hh, $thong_bao = 0)
    {

        $ten_hh = str_replace('-', ' ', $ten_hh);
        $hang_hoa_ct = $this->model('m_hang_hoa')->hang_hoa_select_by_ten_hh($ten_hh);

        $list_bl = $this->model('m_binh_luan')->kh_binh_luan_select_by_hang_hoa($hang_hoa_ct['ma_hh']);

        $tt_khach_hang = '';

        $hang_hoa_theo_loai = $this->model('m_hang_hoa')->hang_hoa_select_by_loai($hang_hoa_ct['ma_loai'], 5);
        $this->model('m_hang_hoa')->hang_hoa_tang_so_luot_xem($hang_hoa_ct['ma_loai']);
        if (Session::get('user')) {
            $tt_khach_hang = $this->model('m_khach_hang')->khach_hang_select_by_id(Session::get('user'));
        }
        $this->view('page1', [
            'chitiet' => $hang_hoa_ct,
            'blocks' => ['chi_tiet_san_pham'],
            'message' => $thong_bao,
            'ds_binh_luan' => $list_bl,
            'tt_khach_hang' => $tt_khach_hang,
            'hang_hoa_theo_loai' => $hang_hoa_theo_loai
        ]);
    }
    function thembl($ma_hh)
    {
        $dangnhap = false;
        $user = $this->model('m_khach_hang')->khach_hang_select_by_id(Session::get('user'));;
        if (isset($_SESSION['user']) and Session::get('user') == $user['ma_kh']) {
            $dangnhap = true;
        }
        $hanghoa = $this->model('m_hang_hoa')->hang_hoa_select_by_id($ma_hh);
        if ($dangnhap) {
            $noi_dung = $_POST['danh_gia'];
            $ngay_bl = date("Y-m-d", time());
            $this->model('m_binh_luan')->binh_luan_insert($user['ma_kh'], $ma_hh, $noi_dung, $ngay_bl);
            header('Location: ' . ROOT_URL . '/chitiet/hanghoa/' . str_replace(' ', '-', $hanghoa['ten_hh']) . '/Thêm bình luận thành công');
        } else {
            header('Location: ' . ROOT_URL . '/chitiet/hanghoa/' . str_replace(' ', '-', $hanghoa['ten_hh']) . '/Bạn chưa đăng nhập nên không thể bình luận');
        }
    }
}
