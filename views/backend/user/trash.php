<?php

use App\Models\User;

$list = User::where('status', '=', 0)
    ->orderBy('created_at', 'DESC')
    ->get();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Thùng rác của thành Viên </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="index.php?option=user">Tất cả</a>|
                        <a href="index.php?option=user&cat=trash">Thùng rác</a>

                    </div>
                    <div class="col-md-6 text-right">
                        <a href="index.php?option=user" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php require_once '../views/backend/messageAlert.php'; ?>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:30px;">
                                        <input type="checkbox">
                                    </th>
                                    <th class="text-center" style="width:130px;">Hình ảnh</th>
                                    <th>Họ tên</th>
                                    <th>Điện thoại</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($list) > 0) : ?>
                                <?php foreach ($list as $item) : ?>
                                <tr class="datarow">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <img src="../public/images/user/<?= $item->image; ?>" alt="<?= $item->image;?>">
                                    </td>
                                    <td>
                                        <div class="name">
                                            <?= $item->name; ?>
                                        </div>
                                        <div class="function_style">
                                            <a href="index.php?option=user&cat=restore&id=<?= $item->id; ?>"
                                                class="btn btn-info btn-xs">
                                                <i class="fas fa-undo"></i> Khôi phục
                                            </a>
                                            <a href="index.php?option=user&cat=destroy&id=<?= $item->id; ?>"
                                                class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i> Xoá vv
                                            </a>
                                        </div>
                                    </td>
                                    <td><?= $item->phone; ?></td>
                                    <td><?= $item->email; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>