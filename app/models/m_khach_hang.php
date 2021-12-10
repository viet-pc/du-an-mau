<?php
class m_khach_hang extends database
{
    public function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro)
    {
        $sql = "INSERT INTO khach_hang(ma_kh, mat_khau, ho_ten, email, hinh, kich_hoat, vai_tro) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->pdo_execute($sql, $ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat == 1, $vai_tro == 1);
    }
    public function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro)
    {
        $sql = "UPDATE khach_hang SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
        $this->pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat == 1, $vai_tro == 1, $ma_kh);
    }
    public function khach_hang_delete($ma_kh)
    {
        $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
        if (is_array($ma_kh)) {
            foreach ($ma_kh as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $ma_kh);
        }
    }
    public function khach_hang_select_all()
    {
        $sql = "SELECT * FROM khach_hang";
        return $this->pdo_query($sql);
    }
    public function khach_hang_select_by_id($ma_kh)
    {
        $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
        return $this->pdo_query_one($sql, $ma_kh);
    }
    public function khach_hang_exist($ma_kh)
    {
        $sql = "SELECT COUNT(*) FROM `khach_hang` WHERE ma_kh = ?";
        return $this->pdo_query_value($sql, $ma_kh) > 0;
    }
    public function khach_hang_select_by_role($vai_tro)
    {
        $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
        return $this->pdo_query($sql, $vai_tro);
    }
    public function khach_hang_change_password($ma_kh, $mat_khau_moi)
    {
        $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
        $this->pdo_execute($sql, $mat_khau_moi, $ma_kh);
    }
    public function khach_hang_exist_email($ma_kh, $email)
    {
        $sql = "SELECT COUNT(*) FROM `khach_hang` WHERE ma_kh = ? AND email = ?";
        return $this->pdo_query_value($sql, $ma_kh, $email) > 0;
    }
}
