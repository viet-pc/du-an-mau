
<?php
class Cookie
{


    /**
     * Tạo cookie
     * @param string $name là tên cookie
     * @param string $value là giá trị cookie
     * @param int $day là số ngày tồn tại cookie
     */
    public static function add_cookie($name, $value, $day)
    {
        setcookie($name, $value, time() + (86400 * $day), "/");
    }
    /**
     * Xóa cookie
     * @param string $name là tên cookie
     */
    public static function delete_cookie($name)
    {
        self::add_cookie($name, '', -1);
    }
    /**
     * Đọc giá trị cookie
     * @param string $name là tên cookie
     * @return string giá trị của cookie
     */
    public static function get_cookie($name)
    {
        return $_COOKIE[$name] ?? '';
    }
    /**
     * Kiểm tra đăng nhập và vai trò sử dụng.
     * Các php trong admin hoặc php yêu cầu phải được đăng nhập mới được
     * phép sử dụng thì cần thiết phải gọi hàm này trước
     **/
}
