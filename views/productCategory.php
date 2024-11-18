<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ bshop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body onload="start()">
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
                    <div class="row">
                        <div class="banner">
                            <img src="./uploads/banners/banner1.jpg" alt="Ảnh banner" id="imgbanner">
                            <button onclick="preimg()" id="leftrow" class="leftrow">
                                <p><img src="./uploads/icon/left-arrow.png" alt="left arrow"></p>
                            </button>
                            <button onclick="nextimg()" id="rightrow" class="rightrow">
                                <p><img src="./uploads/icon/right-arrow.png" alt="right arrow"></p>
                            </button>
                        </div>
                    </div>

                    <?php
                        $i = 0;
                            foreach ($productCategory as $product) {
                                if (($i == 2) || ($i == 5) || ($i == 8) || ($i == 11) || ($i == 14)) {
                                    $mr = "";
                                } else {
                                    $mr = "mr";
                                }
                                echo '
                
                            <div class="boxsp '.$mr.'">
                                
                                    <a href="'.BASE_URL.'?act=chi-tiet-san-pham&id='.$product['id'].''.'">
                        <div class="img">
                                        <img src="'.$product['thumbnail'].'" alt="Ảnh sản phẩm">
                                        <p>'.number_format($product['discount']).'₫  <span style="font-size: 1.1vw; text-decoration:line-through;color:gray">'.number_format($product['price']).'₫</span> </p>
                                        <a href="#">'.$product['title'].'</a>
                                    </div>
                        </a>
                                
                            </div>
                        ';
                                $i += 1;
                            } ?>

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
    <script>
        var img = [];
        var index = 0;
        for (let i = 1; i <= 8; i++) {
            img[i] = new Image();
            img[i].src = "./uploads/banners/banner" + i + ".jpg";
        }

        function start() {
            index++;
            if (index > 8) {
                index = 1;
            }
            document.getElementById('imgbanner').src = img[index].src;
            time = setTimeout("start()", 3500);
        }

        function nextimg() {
            index++;
            if (index > 8) {
                index = 1;
            }
            document.getElementById('imgbanner').src = img[index].src;
        }

        function preimg() {
            index--;
            if (index < 1) {
                index = 8;
            }
            document.getElementById('imgbanner').src = img[index].src;

        }
    </script>
</body>

</html>