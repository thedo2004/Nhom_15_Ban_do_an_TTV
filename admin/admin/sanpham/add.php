       
      <form action="index.php?act=addsp" method="post"  enctype="multipart/form-data">
       <div class="title" ><h2 style="text-align: center;"> QUẢN LÍ SẢN PHẨM</h2></div>
  <div class="mb-3">
  <select name="iddm" class="form-select" aria-label="Default select example">
                <?php
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        echo'<option value="'.$id.'">'.$name.'</option>';
                    }
                    ?>    
              </select>
  </div>
  <div class="mb-3">
  <input name="tensp" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
  </div>
  <div class="mb-3">
  <input name="giasp" type="text" class="form-control" placeholder="Price" aria-label="Username" aria-describedby="addon-wrapping">
  </div>
  <div class="mb-3">
  <input name="soluong" type="number" class="form-control" placeholder="Amount" aria-label="Username" aria-describedby="addon-wrapping">
  </div>
  <div class="mb-3">
  <input name="hinh" type="file" class="form-control" placeholder="Image" aria-label="Username" aria-describedby="addon-wrapping">
  </div>
  <div class="mb-3">
  <div class="form-floating">
  <textarea name="mota" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Comments</label>
</div>  </div>
  <input type="submit" name="themmoi" value="Nhập mới" style=" padding: 10px 20px; 
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