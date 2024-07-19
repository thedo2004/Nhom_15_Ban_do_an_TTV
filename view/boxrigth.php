<div class="row mb  ">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxconten formtk">
                        <form action="" method="post">
                            Tên đặng nhập
                            <br><input type="text" name="">
                            <br>Mật khẩu <br>
                            <input type="password" name=""><br>
                            <br><button type="submit">Đăng nhập</button> <br>
                            <input type="checkbox" name="">Ghi nhớ tài khoản? <br>
                        </form>
                        <li><a href="">Quên mật khẩu</a></li>
                            <li><a href="">Đăng kí</a></li>
                    </div>
                </div>
                <div class="row mb ">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxconten2 menudoc">
                        <ul>
                            <?php                         
                          foreach ($dmnew as $dm) {
                            extract($dm);
                            $linkdm="index.php?act=sanpham&iddm=".$id;
                            echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                          }
                            ?>
                        </ul>
                    </div>
                    <div class="boxfooter">
                        <form action="" method="post">
                            <input type="text" placeholder="Tìm từ khóa ">
                        </form>
                    </div>
                </div>
                <div class="row ">
                    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
                    <div class=" row boxconten">
                        <?php
                        foreach ($top10 as $top) {
                            extract($top);
                            $hinh=$img_path.$img;
                            $linksp="index.php?act=sanpham&idsp=".$id;
                            echo ' <div class="row mb top10">
                            <img src="'.$hinh.'" alt="">
                            <a href="'.$linksp.'">'.$names.'</a>
                        </div>';
                        }
                        ?>
                    </div>
                </div>