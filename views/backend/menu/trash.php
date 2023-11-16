<?php
use App\Models\Menu;
$list = Menu::where('status','=',0)->orderBy('created_at','DESC')->get();
?>
<?php require_once '../views/backend/header.php';?>
 <!-- CONTENT -->
 <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="d-inline">Tất cả danh mục</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        /
                        <li class="braedcrumb-item active">Tất cả danh mục</li>
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
                     <a href="index.php?option=menu"class="btn btn-sm btn-info">
                     <i class="fas fa-arrow-left"></i> Quay về Menu </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                        <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th class="text-center" style="width:20px;">#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Slug</th>
                                    <th class="text-center" style="width:160px;">Ngày tạo</th>
                                    <th class="text-center" style="width:200px;">Chức năng</th>
                                    <th class="text-center" style="width:20px;">ID</th>
                                 </tr>
                              </thead>
                           <tbody>
                                 <?php foreach ($list as $row):?>
                                       <tr>
                                          <td class="text-center">                                  
                                             <input type="checkbox">
                                          </td>
                                          <td><?= $row->name;?></td>
                                          <td><?= $row->slug;?></td>
                                          <td class="text-center"><?= $row['created_at'];?></td>
                                          <td class="text-center">
                                                <a href="index.php?option=menu&cat=restore&id=<?=$row->id;?>" class="btn btn-success btn-xs">
                                                <i class="fas fa-undo"></i>Khôi phục
                                                </a> |
                                                <a href="index.php?option=menu&cat=destroy&id=<?=$row->id;?>" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i>Xóa vv
                                                </a>                                        
                                          </td>
                                          <td class="text-center"><?= $row['id'];?></td>
                                       </tr>
                                 <?php endforeach; ?>
                           </tbody>
                        </table>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>