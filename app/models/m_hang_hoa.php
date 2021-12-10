<?php
class m_hang_hoa extends database
{

    public function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta)
    {
        $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
        $this->pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet == 1, $so_luot_xem, $ngay_nhap, $mo_ta);
    }
    public function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta)
    {
        $sql = "UPDATE hang_hoa SET ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ma_loai=?, dac_biet=?, so_luot_xem=?, ngay_nhap=?, mo_ta=? WHERE ma_hh=?";
        $this->pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet == 1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
    }
    public function hang_hoa_delete($ma_hh)
    {
        $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
        if (is_array($ma_hh)) {
            foreach ($ma_hh as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $ma_hh);
        }
    }
    public function hang_hoa_select_all()
    {
        $sql = "SELECT * FROM hang_hoa";
        return $this->pdo_query($sql);
    }
    public function hang_hoa_select_by_id($ma_hh)
    {
        $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
        return $this->pdo_query_one($sql, $ma_hh);
    }
    public function hang_hoa_exist($ma_hh)
    {
        $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
        return $this->pdo_query_value($sql, $ma_hh) > 0;
    }
    public function hang_hoa_tang_so_luot_xem($ma_hh)
    {
        $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
        $this->pdo_execute($sql, $ma_hh);
    }
    public function hang_hoa_select_top3_view()
    {
        $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 3";
        return $this->pdo_query($sql);
    }
    public function hang_hoa_select_top3_special()
    {
        $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 AND dac_biet = 1 ORDER BY so_luot_xem DESC LIMIT 0, 3";
        return $this->pdo_query($sql);
    }
    public function hang_hoa_select_dac_biet()
    {
        $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
        return $this->pdo_query($sql);
    }

    public function hang_hoa_select_by_loai($ma_loai, $limit)
    {
        $sql = "SELECT * FROM hang_hoa WHERE ma_loai = ?  ORDER BY ngay_nhap LIMIT  $limit";
        return $this->pdo_query($sql, $ma_loai);
    }
    public function hang_hoa_select_by_ten_hh($ten_hh)
    {
        $sql = "SELECT * FROM hang_hoa WHERE ten_hh like ?";
        return $this->pdo_query_one($sql, $ten_hh);
    }
    public function hang_hoa_select_keyword($keyword)
    {
        $sql = "SELECT * FROM hang_hoa hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
        return $this->pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
    }
    public function hang_hoa_select_page($start_page, $length_page)
    {
        $sql = "SELECT * FROM hang_hoa limit $start_page, $length_page ";
        return $this->pdo_query($sql);
    }
    public function hang_hoa_select_keyword_page($keyword, $start_page, $length_page)
    {
        $sql = "SELECT * FROM hang_hoa hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " WHERE ten_hh LIKE ? OR ten_loai LIKE ? LIMIT $start_page, $length_page";
        return $this->pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
    }
    public function hang_hoa_count_all()
    {
        $sql = "SELECT count(*) FROM hang_hoa";
        return $this->pdo_query_value($sql);
    }
    public function hang_hoa_count_keyword($keyword)
    {
        $keyword = '%' . $keyword . '%';
        $sql = "SELECT count(*) FROM hang_hoa hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
        return $this->pdo_query_value($sql,  $keyword, $keyword);
    }
}
