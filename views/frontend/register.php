<?php require_once "views/frontend/header.php" ?>
<?php

use App\Models\User;

$gioitinh = false;
$check = false;
$error = "";
// Xử lý khi form đăng ký được gửi
if (isset($_POST['btn-reg'])) {
    $user = new User;
    $user->name = $_POST['name'];
    $user->username = $_POST['username'];
    $user->password = sha1($_POST['password']); // Sử dụng sha1 để mã hóa mật khẩu
    $user->email = $_POST['email'];
    if ($gioitinh == true) {
        $user->gender = 1;
    } else {
        $user->gender = 0;
    }
    $user->phone = $_POST['phone'];
    $user->address = $_POST['address'];

    // Kiểm tra xác nhận mật khẩu
    if ($_POST['password'] === $_POST['password_re']) {
        if ($user->save()) {
            $success = 'Đăng ký tài khoản thành công.';
            $check = true;
        } else {
            $error = 'Lỗi khi thêm tài khoản.';
        }
    } else {
        $error = 'Xác nhận mật khẩu không khớp.';
    }
}




?>
<section class="hdl-maincontent py-2 tuychinh">
    <form action="index.php?option=register" method="post" name="registercustomer">
        <div class="container">
            <?php if ($check == true) : ?>
                <div style="color: green;"><?= $success ?></div>
            <?php else : ?>
                <div style="color: red;"><?= $error ?></div>
            <?php endif; ?>
            <h1 class="fs-2 text-main text-center">ĐĂNG KÝ TÀI KHOẢN</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="text-main">Họ tên(*)</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="nhập họ tên" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="text-main">Điện thoại(*)</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
                    </div>
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-header text-main">
                                Địa chỉ
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <select name="tinhtp" id="tinhtp" class="form-control">
                                            <option value="">Chọn Tỉnh/TP</option>
                                            <?php
                                            $danhsachtp = [
                                                "Hà Nội", "Hồ Chí Minh", "Hải Phòng", "Đà Nẵng", "Huế", "Cần Thơ", "Hà Giang", "Cao Bằng", "Bắc Kạn", "Tuyên Quang", "An Giang", "Bạc Liêu",
                                            ];
                                            // Sử dụng mảng $danhsachtp
                                            foreach ($danhsachtp as $tp) {
                                                echo '<option value="' . $tp . '">' . $tp . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="quanhuyen" id="quanhuyen" class="form-control">
                                            <option value="">Chọn Quận/Huyện</option>
                                            <?php
                                            $dshuanhuyen = [
                                                "cần đước", "gò công", "tiền giang", "chợ gạo"
                                            ];
                                            foreach ($dshuanhuyen as $huan) {
                                                echo '<option value ="' . $huan . '">' . $huan . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="phuongxa" id="phuongxa" class="form-control">
                                            <option value="">Chọn Phường/Xã</option>
                                            <?php
                                            $dsxa = [
                                                "An bình", "An cư", "An hòa", "An nông", "An thạnh Trung"
                                            ];
                                            foreach ($dsxa as $xa) {
                                                echo '<option value ="' . $xa . '">' . $xa . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-main">Giới tính</label>
                        <div class="form-check form-switch">
                            <input name="gender" class="form-check-input" type="checkbox" role="switch" id="genderChecked" checked onchange="changeGender()">
                            <label name="gender" class="form-check-label" id="labelgender" for="genderChecked">Nam</label>
                        </div>
                    </div>

                    <script>
                        function changeGender() {
                            const elementGender = document.querySelector("#genderChecked").checked;
                            const genderInput = document.querySelector(
                                "input[name='gender']"); // Tìm trường input với name là "gender"

                            if (elementGender) {
                                genderInput.value = "1"; // Giá trị 1 cho Nam
                                document.querySelector("#labelgender").innerHTML = "Nam";
                                <?php $gioitinh == true; ?>
                            } else {
                                genderInput.value = "0"; // Giá trị 0 cho Nữ
                                document.querySelector("#labelgender").innerHTML = "Nữ";
                            }
                        }
                    </script>

                    </script>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="username" class="text-main">Tên tài khoản(*)</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-main">Email(*)</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-main">Mật khẩu(*)</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_re" class="text-main">Xác nhận Mật khẩu(*)</label>
                        <input type="password" name="password_re" id="password_re" class="form-control" placeholder="Xác nhận mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-main" name="btn-reg">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
</form>
</section>
<?php require_once "views/frontend/footer.php"; ?>