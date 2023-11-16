<?php
use App\Models\Product;
$list = Product::join('category',"category.id","product.category_id")
->join("brand","brand.id","product.brand_id")
->where("product.status",'=',0)
->orderBy("product.created_at",'DESC')
->select("product.*","category.name as category_name","brand.name as brand_name")
->get();?>
<?php require_once '../views/backend/header.php';?>
 <!-- CONTENT -->
 <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="d-inline">Thùng rác danh mục</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        /
                        <li class="braedcrumb-item active">Thùng rác danh mục</li>
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
                     <a href="index.php?option=product"class="btn btn-sm btn-info">
                     <i class="fas fa-arrow-left"></i> Quay về danh sách </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
               <?php include_once('../views/backend/messageAlert.php');?>
                        <table class="table table-bordered" id="myTable">
                              <thead>
                                 <tr>
                                 <th class="text-center" style="width:20px;">#</th>
                                    <th class="text-center" style="width:90px;">Hình</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Thương hiệu</th>
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
                                          <td class="text-center">
                                             <img class="img-fluid" src="../public/images/product/<?=$row->image;?>" alt="<?=$row->image;?>">
                                          </td>
                                          <td><?= $row->name;?></td>
                                          <td><?= $row->category_name;?></td>
                                          <td><?= $row->brand_name;?></td>
                                          <td class="text-center"><?= $row['created_at'];?></td>
                                          <td class="text-center">
                                                <a href="index.php?option=product&cat=restore&id=<?=$row->id;?>" class="btn btn-success btn-xs">
                                                <i class="fas fa-undo"></i>Khôi phục
                                                </a> |
                                                <a href="index.php?option=product&cat=destroy&id=<?=$row->id;?>" class="btn btn-danger btn-xs">
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
      <script>
         $(document).ready(function()
         {
            $('#myTable').DataTable();
         });
      </script>
<?php require_once "../views/backend/footer.php"; ?>