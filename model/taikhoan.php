<?php
function insert_taikhoan($user, $pass, $email, $address, $tel) {
    $sql = "INSERT INTO user (user, pass, email, address, tel) VALUES ('$user', '$pass', '$email', '$address', '$tel')";
    pdo_execute($sql);
}
function checkuser($email,$pass){
    $sql="select*  from user where email='".$email."' AND pass='".$pass."'";
     $sp=pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id,$user,$email,$address,$tel,$pass){
  $sql="update  user set  user='".$user."',email='".$email."',address='".$address."',tel='".$tel."',pass='".$pass."' where id=".$id;
    pdo_execute($sql);
}
function loadall_taikhoan(){
    $sql="select * from user order by id desc";
            $listdm = pdo_query($sql);
            return $listdm;
}
function lock_taikhoan($id) {
    $sql = "UPDATE user SET is_locked = true WHERE id = ?";
    pdo_execute($sql, $id);
}

function unlock_taikhoan($id) {
    $sql = "UPDATE user SET is_locked = false WHERE id = ?";
    pdo_execute($sql, $id);
}
function validate_taikhoan($user, $email, $address, $tel, $pass) {
    // Kiểm tra các điều kiện validate
    if (empty($user) || empty($email) || empty($pass) || empty($tel) || empty($address)) {
        return "Vui lòng điền đầy đủ thông tin.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email không hợp lệ.";
    }

    // Kiểm tra độ dài mật khẩu
    $password_error = validate_password_length($pass);
    if ($password_error !== null) {
        return $password_error;
    }

    return null; // Trả về null nếu không có lỗi
};
function validate_password_length($password) {
    // Độ dài tối thiểu cho mật khẩu
    $minLength = 8;
    // Kiểm tra xem mật khẩu có đủ độ dài hay không
    if (strlen($password) < $minLength) {
        return "Mật khẩu phải có ít nhất $minLength ký tự.";
    }
    // Các kiểm tra khác nếu cần
    return null; // Trả về null nếu không có lỗi
}
?>
