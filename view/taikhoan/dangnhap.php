<style>
    html, body{
    width: 100%;
}
.box{
    text-align: center;
    background:ghostwhite;
    width: 400px;
    height: auto;
    padding: 25px;
    padding: 25px;
    position: relative;
    top: 400px;
    left: 750px;
    bottom: 200px;
    transform: translate(-50%,-50%);
    box-shadow: 0px 0px 20px 0px #000;
}
.box h3{
    color: black;
}
.box input[type="password"], .box input[type="text"],  .box input[type="tel"]{
    background: none;
    outline: none;
    width: 210px;
    height: 40px;
    padding: 0px 15px;
    margin: 15px 0px;
    border: solid 2px  #007BFF;
    transition: 1s;
    border: none;
    border-bottom: 1px solid #000; 
}
.box input[type="radio"]{
    background: none;
    outline: none;
    width: 20px;
    height: 10px;
    padding: 0px 15px;
    margin: 15px 0px;
    border: solid 2px  #007BFF;
    transition: 1s;
    border-radius: 30px;
}
.box input[type="password"]:focus, .box input[type="text"]:focus{
    width: 320px;
    border-color: chartreuse;
    transition: 1s;
}
.box input[type="submit"]{
    background: none;
    outline: none;
    width: 160px;
    height: 40px;
    margin: 15px 0px;
    color: black;
    font-size: 18px;
    transition: 1s;
}
.box input[type="submit"]:hover{
    background:black ;
    transition: 1s;
    color: white;
}
form>a{
    text-decoration: none;
    color: black;
}
form>a:hover{
   color:  black;
   
}
.footer{
    margin-top:200px;
}
</style>    
    <form method="post" action="index.php?act=dangnhap" class="box"> 
        <h3>ĐĂNG NHẬP TÀI KHOẢN</H3>
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="dangnhap" value="ĐĂNG NHẬP">
      <a href="">  <h4>Quên mật khẩu?</h4> </a>
        Hoặc
      <a href="index.php?act=dangky"> <h4> Đăng ký</h4>  </a>
      <?php
        if(isset($thongbao)&&($thongbao!="")) echo $thongbao
    ?>
    </form>
    <br>
   
</form> 