<?php

use App\Models\User;


if (isset($_POST['THEM'])) {
    // Lấy dữ liệu từ biểu mẫu
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $confirm_password = sha1($_POST['password_re']); // Lấy mật khẩu xác nhận

    // Kiểm tra xem mật khẩu và mật khẩu xác nhận có khớp không
    if ($password !== $confirm_password) {
        // Mật khẩu và mật khẩu xác nhận không khớp, thực hiện xử lý lỗi ở đây nếu cần
        header('location:http://localhost/VoThanhTrung_2122110046/admin/index.php?option=customer&cat=customercreate');
        session_start();
        $_SESSION['message'] = "sai thông tin thêm ko thành công";
        exit;
    }

    // Xử lý tải lên hình đại diện
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $imageFileName = $phone . '.' . $extension;
        $imagePath = 'public/images/user/' . $imageFileName;

        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            $image = $imageFileName;
        }
    }

    $status = $_POST['status'];

    // Tiếp tục với việc thêm người dùng vào cơ sở dữ liệu nếu mật khẩu và mật khẩu xác nhận khớp
    $user = new User();
    $user->name = $name;
    $user->phone = $phone;
    $user->email = $email;
    $user->username = $username;
    $user->password = $password;
    $user->image = $image;
    $user->status = $status;

    if ($user->save()) {
        header("location:index.php?option=customer");
        $_SESSION['message'] = "thêm thành công !!!";
        exit;
    }
}