<div class="boxphai">
    <div class="row mb ">
        <div class="boxtitle">ĐĂNG NHẬP HOẶC ĐĂNG KÝ</div>
        <div class="boxcontent formtaikhoan">
            <?php if (isset($_SESSION['user'])) { ?>
            <p><span style="font-weight: 600;">Acc:
                </span><span><?=$_SESSION['user']?></span>
            </p>
            <br>
            <p><a href="<?=BASE_URL.'?act=dang-xuat'?>"
                    onclick="return confirm('Bạn muốn đăng xuất?')">Đăng xuất</a></p>

            <?php } elseif (isset($_SESSION['user_admin'])) { ?>

            <p><span style="font-weight: 600;">Acc:
                </span><span><?=$_SESSION['user_admin']?></span>
            </p>
            <br>
            <span><a href="<?=BASE_URL.'?act=dang-xuat'?>"
                    onclick="return confirm('Bạn muốn đăng xuất?')">Đăng xuất</a></span>
                    &ensp;&ensp;&ensp;&ensp;
            <span><a href="<?=BASE_URL_ADMIN?>">Quay lại admin</a></span>
            <?php } else { ?>
            <a
                href="<?= BASE_URL.'?act=dang-nhap' ?>">ĐĂNG
                NHẬP</a>
                &ensp;&ensp;&ensp;
            <a
                href="<?= BASE_URL.'?act=dang-ky' ?>">ĐĂNG
                KÝ</a>
            <?php } ?>
        </div>
    </div>
    <div class="row mb">
        <div class="boxtitle">DANH MỤC</div>
        <div class="boxcontent2 menudoc">
            <ul>
                <?php
                            foreach ($listCategory as $category) {
                                extract($category);
                                echo '<li>
                                    <a href="'.BASE_URL.'?act=san-pham-theo-danh-muc&id='.$category['id'].''.'">'.$category['name'].'</a>
                                </li>';
                            }
            ?>
            </ul>
        </div>
    </div>

</div>