<?php

use App\Models\Post;
use App\Libraries\MessageArt;

$list = Post::where('status', '=', 0)
    ->orderBy('created_at', 'DESC')
    ->get();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->

<div class="content-wrapper ">
   <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="d-inline">Tất cả bài viết</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        /
                        <li class="braedcrumb-item active">Tất cả bài viết</li>
                     </ol>
                  </div>
               </div>
            </div>
         </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header p-2">
            <div class="row">
                     <div class="col-md-12 text-right">
                     <a href="index.php?option=post"class="btn btn-sm btn-info">
                     <i class="fas fa-arrow-left"></i> Quay về danh sách </a>
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
                            
                            <th>Tiêu đề bài viết</th>
                            <th>Slug</th>
                            <th class="text-center" style="width:130px;">Hình ảnh</th>
                            <th>Chi tiết</th>
                            <th>Chức năng</th>
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
                                        <div class="name">
                                            <?= $item->name; ?>
                                            <?= $item->title; ?>
                                            
                                        </div>
                                        
                                    </td>
                                    
                                    <td><?= $item->slug; ?></td>
                                    <td>
                                        <img src="../public/images/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                    </td>
                                    <td><?= $item->detail; ?></td>
                                    <td class="text-center">
                                                <a href="index.php?option=post&cat=restore&id=<?=$item->id;?>" class="btn btn-success btn-xs">
                                                <i class="fas fa-undo"></i>Khôi phục
                                                </a> |
                                                <a href="index.php?option=post&cat=destroy&id=<?=$item->id;?>" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i>Xóa vv
                                                </a>                                        
                                          </td>
                                    <td class="text-center"><?= $item['id'];?></td>
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