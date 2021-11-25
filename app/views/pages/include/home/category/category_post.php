   <?php
    if (isset($data)) {
        $URL = $data['isCategory'] ? CATEGORY_URL : CATEGORY_URL . 'subCategory/';
        $PARAM_URL = isset($data['ID_TheLoai'])? $data['ID_TheLoai'] : '';
        if(isset($data['search_value'])) {
            $PARAM_URL = "&search=".$data['search_value'];
            $URL = CATEGORY_URL . 'searchPost/';
        }
    ?>

       <!-- ##### Blog Area Start ##### -->
       <div class="blog-area section-padding-0-80">
           <div class="container">
               <div class="row">
                   <div class="col-12 col-lg-8">
                       <div class="blog-posts-area">
                           <!-- Category_2 Post -->
                           <?php require_once "./app/views/pages/include/home/areas/category_2.php"; ?>
                       </div>
                       <!-- Pagination -->
                       <nav aria-label="Page navigation example">
                           <ul class="pagination mt-50">
                               <?php
                               if(isset($data['pagination'])) {
                                if ($data['pagination']['currentPage'] > 3) { ?>
                                   <li class="page-item"><a class="page-link" href="<?php echo $URL . $PARAM_URL ?>&page=1">Đầu</a></li>
                               <?php }
                                for ($index = 1; $index <= $data['pagination']['totalPage']; $index++) {
                                ?>
                                   <?php if ($index != $data['pagination']['currentPage']) {
                                        if ($index > $data['pagination']['currentPage'] - 3 && $index < $data['pagination']['currentPage'] + 3) {
                                    ?>
                                           <li class="page-item"><a class="page-link" href="<?php echo $URL . $PARAM_URL ?>&page=<?= $index ?>"><?= $index ?></a></li>
                                       <?php }
                                    } else { ?>
                                       <li class="page-item active"><a class="page-link" href="<?php echo $URL . $PARAM_URL ?>&page=<?= $index ?>"><?= $index ?></a></li>
                                   <?php } ?>
                               <?php }
                                if ($data['pagination']['currentPage'] < $data['pagination']['totalPage'] - 3) { ?>
                                   <li class="page-item"><a class="page-link" href="<?php echo $URL . $PARAM_URL ?>&page=<?= $data['pagination']['totalPage'] ?>">Cuối</a></li>
                               <?php }} ?>
                           </ul>
                       </nav>
                   </div>

                   <div class="col-12 col-lg-4">
                       <div class="blog-sidebar-area">
                           <!-- Popular News -->
                           <?php require_once "./app/views/pages/include/home/areas/popular.php"; ?>
                           <!-- Newsletter Widget -->
                           <?php require_once "./app/views/pages/include/home/areas/news_letter.php"; ?>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- ##### Blog Area End ##### -->

   <?php } ?>