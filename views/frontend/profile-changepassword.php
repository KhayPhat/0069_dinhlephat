<?php require_once "views/frontend/header.php" ?>
<section class="hdl-maincontent py-2 tuychinh">
    <div class="container">
        <div class="row">
            <div class="col-md-9 order-1 order-md-2">
                <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
                <table class="table table-borderless">
                    <tr>
                        <td style="width:20%;">Mật khẩu cũ</td>
                        <td>
                            <input type="password" name="password_old" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <input type="password" name="password" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>Xác nhận mật khẩu</td>
                        <td>
                            <input type="password" name="password_re" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-main" type="submit" name="CHANEGPASSWORD">
                                Đổi mật khẩu
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once "views/frontend/footer.php" ?>