       
     <form action="index.php?act=addtk" method="post"  enctype="multipart/form-data">
    <div class="title"><h2 style="text-align: center;"> QUẢN LÍ KHÁCH HÀNG</h2></div>
    <div class="mb-3">
        <input name="user" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <div class="mb-3">
        <input name="pass" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
    </div>
    <div class="mb-3">
        <input name="email" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping">
    </div>
    <div class="mb-3">
        <input name="address" type="text" class="form-control" placeholder="Address" aria-label="Address" aria-describedby="addon-wrapping">
    </div>
    <div class="mb-3">
        <input name="tel" type="text" class="form-control" placeholder="Tel" aria-label="Tel" aria-describedby="addon-wrapping">
    </div>
    <input type="submit" name="addtk" value="Nhập mới" style="padding: 10px 20px; 
        font-size: 16px; 
        cursor: pointer; 
        background-color: #007BFF; 
        color: #fff; 
        border: none; 
        border-radius: 5px;">
    <a href="index.php?act=listtk">  
        <input type="button" value="list" style="padding: 10px 20px; 
            font-size: 16px; 
            cursor: pointer; 
            background-color: #007BFF; 
            color: #fff; 
            border: none; 
            border-radius: 5px;">
    </a>
    <?php
        if(isset($thongbao) && ($thongbao != "")) echo $thongbao
    ?>
</form>
