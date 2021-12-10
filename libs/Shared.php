<?php
class Shared
{
    public static function  exist_param($fieldname)
    {
        return array_key_exists($fieldname, $_REQUEST);
    }
    public static function phan_trang_hh($length, $page_num,  $size_page)
    {
        $tong_tran =  floor($length / $size_page);
        $args = func_get_args();
        if (count($args) == 1 && is_numeric($args[0]) == true) {
            $page_num = $args[0];
        }
        $offset = 3;
        $start_page = ($page_num - 1) * $size_page;
        $from = ($page_num - $offset) < 1 ? 1 : ($page_num - $offset);
        $to = ($page_num + $offset) > $tong_tran ? $tong_tran : ($page_num + $offset);
        return [
            'start_page' => $start_page,
            'from' => $from,
            'to' => $to,
        ];
    }
    public static function random($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[(int)ceil(rand(0, $max))];
        }
        return $token;
    }
    public static function huy_cookie_user()
    {
        if (isset($_COOKIE["ten_kh"])) {
            setcookie("ten_kh", "");
        }
        if (isset($_COOKIE["chon_auto"])) {
            setcookie("chon_auto", "");
        }
    }
    public static function stripUnicode($str)
    {
        $str = mb_strtolower($str, 'UTF-8');
        if (!$str) return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni)
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        return $str;
    }
}
