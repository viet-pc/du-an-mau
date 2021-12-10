<?php
class load
{
    function __construct()
    {
        $this->kiem_tra_dang_nhap();
    }
    protected function model($model)
    {
        require_once "./app/models/" . "$model" . ".php";
        return new $model;
    }
    protected function view($view, $data = [])
    {
        require_once "./app/views/" . "$view" . ".php";
    }
    function kiem_tra_dang_nhap()
    {
        // if (!empty($_SESSION["ma_kh"])) {
        //     $isLoggedIn = true;
        // }
        // Check if logged in session exists
        // else  

        if (!empty($_COOKIE["ma_kh"]) && !empty($_COOKIE["chon_auto"])) {
            // khai báo hai biến kiểm tra ngày và giờ của cookei có đúng trong database không
            $check_chon_auto = false;
            $check_time = false;

            // lấy thông tin người dùng
            $tt_nguoi_dung = $this->model('m_luu_dang_nhap')->luu_dang_nhap_get_by_ma_kh($_COOKIE["ma_kh"], 0);


            // kiểm tra chon auto trong cookie với database
            if (password_verify($_COOKIE["chon_auto"], $tt_nguoi_dung["chon_auto"])) {
                $check_chon_auto = true;
            }

            // kiểm tra ngày trong cookie với database
            if ($tt_nguoi_dung["ngay_het_han"] >=  date("Y-m-d H:i:s", time())) {
                $check_time = true;
            }

            if (!empty($tt_nguoi_dung["id"]) && $check_chon_auto && $check_time) {
                $_SESSION["user"] = $tt_nguoi_dung['ma_kh'];
            } else {
                if (!empty($tt_nguoi_dung["id"])) {
                    $this->model('m_luu_dang_nhap')->luu_dang_nhap_disable($tt_nguoi_dung["id"]);
                }
                Shared::huy_cookie_user();
            }
        }
    }
}
