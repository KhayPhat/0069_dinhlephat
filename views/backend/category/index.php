<?php
use App\Models\Category;
$list = Category::where('status','!=',0)->orderBy('created_at','DESC')->get();
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
                     <a href="index.php?option=category&cat=create"class="btn btn-sm btn-success">
                     <i class="fas fa-plus"></i> Thêm</a>
                     <a href="index.php?option=category&cat=trash"class="btn btn-sm btn-danger">
                     <i class="fas fa-trash-alt"></i> Thùng rác</a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                        <?php include_once('../views/backend/messageAlert.php');?>
                        <table class="table table-bordered" id="myTable">
                              <thead>
                                 <tr>
                                    <th class="text-center" style="width:20px;">#</th>
                                    <th>Tên danh mục</th>
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
                                          <td>
                                             <?php if($row->status==1):?>
                                                <a href="index.php?option=category&cat=status&id=<?=$row->id;?>" class="btn btn-success btn-xs">
                                                <i class="fas fa-toggle-on"></i> 
                                                </a> |
                                             <?php else:?>
                                                <a href="index.php?option=category&cat=status&id=<?=$row->id;?>" class="btn btn-danger btn-xs">
                                                <i class="fas fa-toggle-off"></i> 
                                                </a> |
                                             <?php endif;?>
                                                <a href="index.php?option=category&cat=edit&id=<?=$row->id;?>"class="btn btn-primary btn-xs">
                                                <i class="far fa-edit"></i></i> 
                                                </a> |
                                                <a href="index.php?option=category&cat=show&id=<?=$row->id;?>"class="btn btn-info btn-xs">
                                                <i class="far fa-eye"></i></i> 
                                                </a> |
                                                <a href="index.php?option=category&cat=delete&id=<?=$row->id;?>"class="btn btn-danger btn-xs">
                                                <i class="far fa-trash-alt"></i></i> 
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
      <script>
         $(document).ready(function()
         {
            $('#myTable').DataTable();
         });
      </script>
<?php require_once "../views/backend/footer.php"; ?>