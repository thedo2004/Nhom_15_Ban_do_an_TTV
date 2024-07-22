
<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
      <form action="index.php?act=updatedm" method="post" >
       <div class="title" ><h2 style="text-align: center;"> QUẢN LÍ DANH MỤC</h2></div>
  <div class="mb-3">
  <label for="disabledTextInput" class="form-label">Mã loại</label>
      <input name="maloai"  type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
  <input name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name;?>" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
  </div>
  <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
  <input type="submit" name="capnhap" value="Update" style=" padding: 10px 20px; 
      font-size: 16px; 
      cursor: pointer; 
      background-color: #007BFF; 
      color: #fff; 
      border: none; 
      border-radius: 5px;">
  <a href="index.php?act=listdm">  <input type="button" value="list"style=" padding: 10px 20px; 
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
 