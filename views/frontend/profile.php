<?php require_once "views/frontend/header.php" ?>
<section class="hdl-maincontent py-2 tuychinh">
    <div class="container">
        <div class="row">
            <div class="col-md-3 order-2 order-md-1">
                <ul class="list-group mb-3 list-category">
                    <li class="list-group-item bg-main py-3">Thông tin tài khoản</li>
                    <li class="list-group-item">
                        <a href="profile.php">Thông tin tài khoản</a>
                    </li>
                    <li class="list-group-item">
                        <a href="../frontend/history.php">Quản lý đơn hàng</a>
                    </li>
                    <li class="list-group-item">
                        <a href="profile_changepassword.php">Đổi mật khẩu</a>
                    </li>
                    <li class="list-group-item">
                        <a href="profile.php">Thời trang thể thao</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
                <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
                <table class="table table-borderless">
                    <tr>
                        <td style="width:20%;">Tên tài khoản</td>
                        <td>Hồ Diên Lợi</td>
                    </tr>
                    <tr>
                        <td style="width:20%;">Tên đăng nhập</td>
                        <td>Admin <a href="profile_changepassword.php">Đổi mật khẩu</a> </td>
                    </tr>
                    <tr>
                        <td style="width:20%;">Email</td>
                        <td>duybuntv@gmail.com</td>
                    </tr>
                    <tr>
                        <td style="width:20%;">Điện thoại</td>
                        <td>0334710316</td>
                    </tr>
                    <tr>
                        <td style="width:20%;">Địa chỉ</td>
                        <td>Số 20 - Tăng Nhơn Phú - Phước Long B - Quận 9 <a href="index.php?option=profile-edit">Đổi
                                địa chỉ</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once "views/frontend/footer.php" ?>