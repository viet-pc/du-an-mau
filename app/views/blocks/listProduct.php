<section id="hero" class="d-flex p-0">
    <div class="hero-list border-radius d-block col-2">
        <h5>TẤT CẢ SẢN PHẨM</h5>
        <ul>
            <?php foreach ($data['dsloai'] as $value) {
                echo '<li><a href="' . ROOT_URL . '/listProduct/index/' . $value['ten_loai'] . '"class="hero-list-text">' . $value['ten_loai'] . '</a></li>';
            }
            ?>
        </ul>

    </div>
    <section class="dexuatitem danhsachsp col-10 p-0">
        <h2><?php echo $data['message_sp'] != '' ? 'Kết quả tìm kiếm cho từ khoá "<span>' . $data['message_sp'] . '"' : '' ?></h2>
        <h2>DANH SÁCH SẢN PHẨM</h2>
        <div class="sanpham">

            <?php
            if (count($data['dshanghoa']) == 0) {
                echo '<span class="error no-sanpham"> không có sản phẩm bạn cần tìm<span>';
            }
            foreach ($data['dshanghoa'] as $value) : ?>
                <a href="<?php echo ROOT_URL . '/chitiet/hanghoa/' . str_replace(' ', '-', $value['ten_hh']) ?>" class="sp">
                    <img src="<?php echo PUBLIC_URL . '/img/' . $value['hinh'] ?>" alt="sản phảm" />
                    <p><?= $value['ten_hh'] ?></p>
                    <div class="gia">
                        <strong><?= $value['don_gia'] ?>&#36;</strong>
                        <span><?= $value['so_luot_xem'] ?> lươt xem</span>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>
        <ul class="pagination">
            <li class="page-item  <?php echo  $data['from'] == $data['page_num'] ? 'd-none' : '' ?> ">
                <a class="page-link" href="<?php echo  ROOT_URL . '/listProduct/index/' . $data['page_num'] - 1 ?>">Previous</a>
            </li>
            <?php if ($data['to'] > 1) for ($i = $data['from']; $i <= $data['to']; $i++) : ?>
                <li class="page-item <?php echo  $i == $data['page_num'] ? 'active' : '' ?>">
                    <a class="page-link" href="<?php echo $data['keyword'] != '' ?  ROOT_URL . '/listProduct/index/' .  $data['keyword'] . '/' . $i : ROOT_URL . '/listProduct/index/' . $i  ?>"> <?= $i ?></a>

                </li>
            <?php endfor ?>
            <li class="page-item  <?php echo  $data['to'] == $data['page_num'] || $data['to'] == 0 ? 'd-none' : '' ?> ">
                <a class="page-link " href="<?php echo  ROOT_URL . '/listProduct/index/' . $data['page_num'] + 1 ?>">Next</a>
            </li>
        </ul>
    </section>
</section>

<style>
    <?php
    require_once 'public/css/listProduct.css';
    ?>
</style>