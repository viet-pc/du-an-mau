<?php
class m_binh_luan extends database
{
    public function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl)
    {
        $sql = "INSERT INTO binh_luan(ma_kh, ma_hh, noi_dung, ngay_bl) VALUES (?,?,?,?)";
        $this->pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);
    }
    public function binh_luan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl)
    {
        $sql = "UPDATE binh_luan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
        $this->pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
    }
    public function binh_luan_delete($ma_bl)
    {
        $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
        if (is_array($ma_bl)) {
            foreach ($ma_bl as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $ma_bl);
        }
    }
    public function binh_luan_select_all()
    {
        $sql = "SELECT * FROM binh_luan bl ORDER BY ngay_bl DESC";
        return $this->pdo_query($sql);
    }
    public function binh_luan_select_by_id($ma_bl)
    {
        $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
        return $this->pdo_query_one($sql, $ma_bl);
    }
    public function binh_luan_exist($ma_bl)
    {
        $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
        return $this->pdo_query_value($sql, $ma_bl) > 0;
    }
    public function binh_luan_select_by_hang_hoa($ma_hh)
    {
        $sql = "SELECT b.*, h.ten_hh FROM binh_luan b JOIN hang_hoa h ON h.ma_hh=b.ma_hh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
        return $this->pdo_query($sql, $ma_hh);
    }
    public function kh_binh_luan_select_by_hang_hoa($ma_hh)
    {
        $sql = "SELECT b.*, h.ten_hh,k.hinh ,k.ho_ten FROM binh_luan b JOIN hang_hoa  h ON h.ma_hh=b.ma_hh JOIN khach_hang k ON k.ma_kh=b.ma_kh  WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
        return $this->pdo_query($sql, $ma_hh);
    }
}
