<section class="topitem">
    <div class="tiemkiemhangdau">
        <h2>XEM NHIỀU NHẤT</h2>
        <div class="sanpham">
            <?php foreach ($data['top3w'] as $value) : ?>
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
    </div>
    <div class="tiemkiemhangdau">
        <h2>ĐẶC BIỆT</h2>
        <div class="sanpham">
            <?php foreach ($data['top3s'] as $value) : ?>
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
    </div>
</section>