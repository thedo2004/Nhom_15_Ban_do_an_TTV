
<div class="table">    
           <div class="title" ><h2 style="text-align: center;"> QUẢN LÍ TÀI KHOẢN</h2></div>
           <a href="index.php?act=addtk"><button type="button" class="btn btn-primary" style="margin-left: 80px; margin-top:30px;">Add</button> </a>  
       <table class="table">        
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                foreach ($listtk as $taikhoan) {
                    extract($taikhoan);
                    $suadm= "index.php?act=suatk&id=".$id;
                    $xoadm= "index.php?act=xoatk&id=".$id;
                    echo '<tr>
                    <td>'.$id.'</td>
                    <td>'.$user.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$tel.'</td>
                    <td> <a href="'.$xoadm.'"><button type="button" class="btn btn-danger">Delete</button></a>
                  </tr>';
                }
              ?>
            </tbody>
          </table>
          </div> 
          <!-- // <a href="'.$suadm.'"><button type="button" class="btn btn-success">Edit</button></a></td> -->
