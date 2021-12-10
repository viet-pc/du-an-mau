<?php
class m_loai extends database
{
    public function loai_insert($ten_loai)
    {
        $sql = "INSERT INTO loai(ten_loai) VALUES (?)";
        return $this->pdo_execute($sql, $ten_loai);
    }
    public function loai_update($ten_loai, $ma_loai)
    {

        $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
        return $this->pdo_execute($sql, $ten_loai, $ma_loai);
    }
    public function loai_delete($ma_loai)
    {
        $sql = "DELETE FROM loai WHERE ma_loai=?";
        if (is_array($ma_loai)) {
            foreach ($ma_loai as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $ma_loai);
        }
    }

    public function loai_select_all()
    {
        $sql = "SELECT * FROM loai";
        return $this->pdo_query($sql);
    }
    public function loai_select_by_id($ma_loai)
    {
        $sql = "SELECT * FROM loai WHERE ma_loai=?";
        return $this->pdo_query_one($sql, $ma_loai);
    }
    public function loai_exist($ma_loai)
    {
        $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
        return $this->pdo_query_value($sql, $ma_loai) > 0;
    }
}


    // public function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta)
    // {
    //     $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
    //     $this->pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet == 1, $so_luot_xem, $ngay_nhap, $mo_ta);
    // }