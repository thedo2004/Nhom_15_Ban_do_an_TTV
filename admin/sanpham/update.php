<?php
    if(is_array($sp)){
        extract($sp);
    }
    $hinhpath="../upload/".$img;
    if(is_file($hinhpath)){
        $img="<img src='".$hinhpath."' height='80'>";
    } else{
        $img="không có hình";
    }
?>            
      <form action="index.php?act=updatesp" method="post"  enctype="multipart/form-data">
       <div class="title" ><h2 style="text-align: center;"> QUẢN LÍ SẢN PHẨM</h2></div>
  <div class="mb-3">
 
  <input  value="<?=$names?>" name="tensp" type="text" class="form-control" placeholder="Product name" aria-label="Username" aria-describedby="addon-wrapping">
  </div>
  <div class="mb-3">
  <input value="<?=$price?>" name="giasp" type="text" class="form-control" placeholder="Price" aria-label="Username" aria-describedby="addon-wrapping">
  </div>
  <div class="mb-3">
  <input value="<?=$soluong?>" name="soluong" type="number" class="form-control" placeholder="Amount" aria-label="Username" aria-describedby="addon-wrapping">
  </div>
  <div class="mb-3">
  <input value="<?=$img?>" name="hinh" type="file" class="form-control" placeholder="Image" aria-label="Username" aria-describedby="addon-wrapping">
  <?=$img?>  
</div>
  <div class="mb-3">
  <div class="form-floating">
  <textarea value="Comments" name="mota" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?=$mota?></textarea>
  <label for="floatingTextarea2">  Comments
</label>
</div>  </div>
<input type="hidden"name="id" value="<?=$id?>">
  <input type="submit" name="capnhat" value="Update" style=" padding: 10px 20px; 
      font-size: 16px; 
      cursor: pointer; 
      background-color: #007BFF; 
      color: #fff; 
      border: none; 
      border-radius: 5px;">
  <a href="index.php?act=listsp">  <input type="button" value="list"style=" padding: 10px 20px; 
      font-size: 16px; 
      cursor: pointer; 
      background-color: #007BFF; 
      color: #fff; 
      border: none; 
      border-radius: 5px;"></a>
  <?php
        if(isset($thongbao)&&($thongbao!="")) echo $thongbao
    ?>
</form>
<!-- <?php
    if(is_array($sp)){
        extract($sp);
    }
    $hinhpath="../upload/".$img;
    if(is_file($hinhpath)){
        $img="<img src='".$hinhpath."' height='80'>";
    } else{
        $img="không có hình";
    }
?>
        <div class="row">
            <div class="row header"><H1>CẬP NHẬT SẢN PHẨM</H1>  </div>
        </div>
       <div class="row formconten">
        <form action="index.php?act=updatesp"method="post"  enctype="multipart/form-data">
        <div class="row mb" >
        <select name="iddm">
                <option value="0" selected>Tất cả</option>
            <?php
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        if($iddm==$id)
                        echo'<option value="'.$id.'" selected>'.$name.'</option>';
                        else echo'<option value="'.$id.'">'.$name.'</option>';
                    }
                    ?>      
            </select>
            </div>
            <div class="row mb" >
            <input type="hidden"name="id" value="<?=$id?>">
                Tên  <br>
            <input type="text"name="tensp" value="<?=$names?>">
            </div>
            <div class="row mb" >
                Gía  <br>
            <input type="text"name="giasp" value="<?=$price?>">
            </div>
            <div class="row mb" >
               Img  <br>
            <input type="file"name="hinh">
            <?=$img?>
            </div>
            <div class="row mb" >
                Mô tả <br>
            <textarea name="mota" id="" cols="30" rows="10" value="<?=$mota?>"></textarea>
            </div>
            <div class="row">
                
            <input type="submit" name="capnhap" value="Update" style=" padding: 10px 20px; 
      font-size: 16px; 
      cursor: pointer; 
      background-color: #007BFF; 
      color: #fff; 
      border: none; 
      border-radius: 5px;">
                <input type="reset" value="Nhập lại">
               <a href="index.php?act=listsp"> <input type="button" value="Danh sách"></a>
            </div>
    <?php
        if(isset($thongbao)&&($thongbao!="")) echo $thongbao
    ?>
        </form>
       </div> -->
 