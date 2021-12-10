<?php
class m_luu_dang_nhap extends database
{
    public function luu_dang_nhap_insert($ma_kh, $chon_auto, $ngay_het_han)
    {
        $sql = "INSERT INTO luu_dang_nhap(ma_kh, chon_auto, ngay_het_han) VALUES(?,?,?)";
        return $this->pdo_execute($sql, $ma_kh, $chon_auto, $ngay_het_han);
    }
    public function luu_dang_nhap_get_by_ma_kh($ma_kh, $su_dung)
    {
        $sql = "SELECT * FROM luu_dang_nhap WHERE ma_kh=? AND  su_dung = ?";
        return $this->pdo_query_one($sql, $ma_kh, $su_dung);
    }
    public function luu_dang_nhap_disable($id)
    {
        $sql = "UPDATE luu_dang_nhap SET su_dung = ? WHERE id = ?";
        $su_dung = 1;
        $this->pdo_execute($sql, $su_dung, $id);
    }
}
