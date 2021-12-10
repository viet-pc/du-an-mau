<section class="dexuatitem">
    <h2>DANH SÁCH SẢN PHẨM</h2>
    <div class="sanpham">
        <?php foreach ($data['dshanghoa'] as $value) : ?>
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
        <li class="page-item  <?php echo  $data['from'] == $data['page_num'] ? 'disabled' : '' ?> ">
            <a class="page-link" href="<?php echo  ROOT_URL . '/home/index/' . $data['page_num'] - 1 ?>">Previous</a>
        </li>
        <?php for ($i = $data['from']; $i <= $data['to']; $i++) : ?>
            <li class="page-item <?php echo  $i == $data['page_num'] ? 'active' : '' ?>">
                <a class="page-link" <?php echo 'href="' . ROOT_URL . '/home/index/' . $i . ' ">' .  $i ?> </a>
            </li>
        <?php endfor ?>
        <!-- <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li> -->
        <li class="page-item  <?php echo  $data['to'] == $data['page_num'] ? 'disabled' : '' ?> ">
            <a class="page-link " href="<?php echo  ROOT_URL . '/home/index/' . $data['page_num'] + 1 ?>">Next</a>
        </li>
    </ul>
</section>