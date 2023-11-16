<?php
use App\Models\Category;
$dk = [
   ['status','!=',0],
   ['status','!=',0]
];
$id=$_REQUEST['id'];
$category = Category::find($id);
if($category==null)
{
    header("location:index.php?option=category");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thương hiệu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="row">
                     <div class="col-md-12 text-right">
                        <a href="index.php?option=category" class="btn btn-sm btn-info">
                           <i class="fa fa-arrow-left" aria-hidden="true"></i>
                           Về danh sách
                        </a>
                     </div>
                  </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>ID</td>
                                 <td><?=$category->id;?></td>
                              </tr>
                              <tr>
                                 <td>NAME</td>
                                 <td><?=$category->name;?></td>
                              </tr>
                              <tr>
                                 <td>SLUG</td>
                                 <td><?=$category->slug;?></td>
                              </tr>
                              <tr>
                                 <td>IMAGE</td>
                                 <td><img src="../public/images/category/<?= $category->image;?>" 
                                          alt="<?= $category->image;?>"></td>
                              </tr>
                              <tr>
                                 <td>Từ khóa(SEO)</td>
                                 <td><?=$category->metakey;?></td>
                              </tr>
                              <tr>
                                 <td>Mô tả(SEO)</td>
                                 <td><?=$category->metadesc;?></td>
                              </tr>
                              <tr>
                                 <td>Chủ đề cha</td>
                                 <td><?=$category->parent_id;?></td>
                              </tr>
                              <tr>
                                 <td>Vị trí</td>
                                 <td><?=$category->sort_order;?></td>
                              </tr>
                              <tr>
                                 <td>Ngày tạo</td>
                                 <td><?=$category->created_at;?></td>
                              </tr>
                              <tr>
                                 <td>STATUS</td>
                                 <td><?=$category->status;?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>
