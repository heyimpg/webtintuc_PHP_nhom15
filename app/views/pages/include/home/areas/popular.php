<!-- Popular News Widget -->
<div class="popular-news-widget mb-30">
    <h3>Top tin đáng chú ý</h3>

    <!-- Single Popular Blog -->
    <?php
    if (isset($data)) {
        foreach ($data["popular_post"] as $key => $post) {
    ?>
            <div class="single-popular-post">
                <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>">
                    <h6><span><?= $key + 1 ?>.</span> <?= $post["TieuDe"] ?></h6>
                </a>
                <p><?= $post["NgayDang"] ?></p>
            </div>
    <?php }
    } ?>
</div>