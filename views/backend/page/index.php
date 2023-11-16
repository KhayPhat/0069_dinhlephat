<?php

use App\Models\Post;

$list = Post::where('status', '!=', 0)
    ->orderBy('created_at', 'DESC')
    ->get();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<div class="content-wrapper thanhtrung">
      <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="d-inline">Tất cả trang</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        /
                        <li class="braedcrumb-item active">Tất cả trang</li>
                     </ol>
                  </div>
               </div>
            </div>
         </section>
    <!-- Main content -->
    <section class="content">
            <div class="card">
               <div class="card-header ">
                  <div class="row">
                     <div class="col-md-12 text-right">
                     <a href="index.php?option=page&cat=create"class="btn btn-sm btn-success">
                     <i class="fas fa-plus"></i> Thêm</a>
                     <a href="index.php?option=page&cat=trash"class="btn btn-sm btn-danger">
                     <i class="fas fa-trash-alt"></i> Thùng rác</a>
                     </div>
                  </div>
               </div>
            <div class="card-body p-2">
                <?php require_once '../views/backend/messageAlert.php'; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">
                                <input type="checkbox">
                            </th>
                            <th class="text-center" style="width:130px;">Hình ảnh</th>
                            <th>Tên trang đơn</th>
                            <th>slug</th>
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
                                        <img src="../public/images/page/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                    </td>
                                    <td>
                                        <div class="name">
                                            <?= $item->name; ?>
                                        </div>
                                        <div class="function_style">
                                            <?php if ($item->status == 1) : ?>
                                                <a href="index.php?option=page&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-success btn-xs">
                                                    <i class="fas fa-toggle-on"></i> Hiện
                                                </a>
                                            <?php else : ?>
                                                <a href="index.php?option=page&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                                    <i class="fas fa-toggle-off"></i> Ẩn
                                                </a>
                                            <?php endif; ?>
                                            <a href="index.php?option=page&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary btn-xs">
                                                <i class="fas fa-edit"></i> Chỉnh sửa
                                            </a>
                                            <a href="index.php?option=page&cat=show&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                                <i class="fas fa-eye"></i> Chi tiết
                                            </a>
                                            <a href="index.php?option=page&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i> Xoá
                                            </a>
                                        </div>
                                    </td>
                                    <td><?= $item->slug; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>