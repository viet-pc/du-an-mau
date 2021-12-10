<?php
class listProduct extends load
{
    function index()
    {
        $message_sp = '';
        $m_loai =  $this->model('m_loai');
        $m_hang_hoa = $this->model('m_hang_hoa');
        $size_page = 10;
        $keyword = '';
        $page_num = 1;
        $tt_khach_hang = '';


        if (Session::get('user')) {
            $tt_khach_hang = $this->model('m_khach_hang')->khach_hang_select_by_id(Session::get('user'));
        }


        $length = $m_hang_hoa->hang_hoa_count_all();

        $page = Shared::phan_trang_hh($length, $page_num,  $size_page);

        $dshanghoa = $m_hang_hoa->hang_hoa_select_page($page['start_page'], $size_page);

        $args = func_get_args();
        if (count($args) == 1 && is_numeric($args[0]) == true) {
            $page_num = $args[0];
        } else if (count($args) == 1) {
            $keyword = $args[0];
        } else if (count($args) == 2 && is_numeric($args[1]) == true) {
            $keyword = $args[0];
            $page_num = $args[1];
        }


        if (isset($_POST['search']))
            $keyword = $_POST['keyword'];
        if ($keyword !== '') {
            $message_sp = $keyword;
            $keyword = Shared::stripUnicode($keyword);

            $dshanghoa = $m_hang_hoa->hang_hoa_select_keyword_page($keyword, $page['start_page'], $size_page);

            $length = $m_hang_hoa->hang_hoa_count_keyword($keyword);
            $page = Shared::phan_trang_hh($length, $page_num,  $size_page);
        }
        $this->view('page1', [
            'dsloai' => $m_loai->loai_select_all(),
            'dshanghoa' => $dshanghoa,
            'to' => $page['to'],
            'from' => $page['from'],
            'page_num' => $page_num,
            'blocks' => ['listProduct'],
            'message_sp' => $message_sp,
            'tt_khach_hang' => $tt_khach_hang,
            'keyword' => $keyword,
        ]);
    }
}
