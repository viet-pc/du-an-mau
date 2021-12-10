<?php
class home extends load
{
    function index()
    {
        $message = '';
        $admin = false;
        $m_loai =  $this->model('m_loai');
        $m_hang_hoa = $this->model('m_hang_hoa');

        $length = $m_hang_hoa->hang_hoa_count_all();

        $page_num = 1;
        $size_page = 6;
        $args = func_get_args();
        if (count($args) == 1 && is_numeric($args[0]) == true) {
            $page_num = $args[0];
        } else if (count($args) == 1) {
            $message = $args[0];
        }
        $page = Shared::phan_trang_hh($length, $page_num,  $size_page);

        $tt_khach_hang = '';
        if (Session::get('user')) {
            $tt_khach_hang = $this->model('m_khach_hang')->khach_hang_select_by_id(Session::get('user'));
            if ($tt_khach_hang['vai_tro'] == '1')
                $admin = true;
        }


        $this->view('page1', [
            'dsloai' => $m_loai->loai_select_all(),
            'dshanghoa' => $m_hang_hoa->hang_hoa_select_page($page['start_page'], $size_page),
            'top3w' => $m_hang_hoa->hang_hoa_select_top3_view(),
            'top3s' => $m_hang_hoa->hang_hoa_select_top3_special(),
            'to' => $page['to'],
            'from' => $page['from'],
            'page_num' => $page_num,
            'blocks' => ['hero', 'topitem', 'dexuat'],
            'message' => $message,
            'tt_khach_hang' => $tt_khach_hang,
            'admin' => $admin,
        ]);
    }
    // function home()
    // {
    //     
    //     var_dump($all_loai->loai_select_all());
    //     echo "home page";
    // }
    // function xyz()
    // {
    //     echo "xyz page";
    // }
}
