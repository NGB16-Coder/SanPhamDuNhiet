<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ bshop</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <div class="boxcenter">
            <div class="row mb header">
                <h1> BSHOP CỬA HÀNG BÁN ĐỒ THỂ THAO CHẤT LƯỢNG</h1>
            </div>
            <div class="row mb menu">
                <?php include_once "views/layout/menu.php" ?>
            </div>
            <div class="row mb ">
                <div class="boxtrai mr ">
                    <div class="row mb">
                        <div class="boxtitle">
                            <h2><?= $product['title'] ?>
                            </h2>
                        </div>
                        <div class="row boxcontent">
                            <div class="image row mb ">
                                <div class="row mb">
                                    <img src="<?= BASE_URL . $product["thumbnail"] ?>"
                                        alt="Ảnh sản phẩm">
                                </div>
                                <h3 class="price">Giá sản phẩm:
                                    <?=number_format($product['price'])?>₫
                                </h3>
                                <p class="discount"> Giá khuyến mãi:
                                    <?=number_format($product['discount'])?>₫
                                </p>
                                <h3>
                                    Danh mục sản phẩm: <span
                                        style="font-size: 1.3vw; font-weight:400"><?= $product['name'] ?></span>
                                </h3>
                                <h3 class="description">
                                    Mô tả sản phẩm: <span
                                        style="font-size: 1.3vw; font-weight:400"><?= $product['description'] ?></span>
                                </h3>

                            </div>

                        </div>
                    </div>

                    <div class="row mb">
                        <div class="boxtitle">Bình luận</div>
                        <div class="row boxcontent">

                        </div>
                    </div>

                </div>
                <?php include_once './views/layout/siteBar.php'; ?>
            </div>
            <div class="row footer">
                <p> Coppyright © BSHOP</p>
                <div class="contact">
                    <h3>Liên Hệ</h3>
                    <p>Email: <a href="mailto:giabao16032005@gmail.com">giabao16032005@gmail.com</a></p>
                    <p>Website: <a href="http://baongph54661.id.vn/">baongph54661.id.vn</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>