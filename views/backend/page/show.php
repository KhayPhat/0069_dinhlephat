<?php
use App\Models\Page;

$id= $_REQUEST['id'];
$page= Page::find($id);

if($page==NULL)
{
   header("location:index.php?option=page&cat=trash");
}
?>



<?php require_once '../views/backend/header.php' ;?>

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
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-12 text-right ">
                     <a href="index.php?option=page" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                     </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>ID</td>
                                 <td><?=$page->id?></td>
                              </tr>
                              <tr>
                                 <td>user_id</td>
                                 <td><?=$page->user_id?></td>
                              </tr>
                              <tr>
                                 <td>deliveryaddress</td>
                                 <td><?=$page->deliveryaddress?></td>
                              </tr>
                              <tr>
                                 <td>deliveryname</td>
                                 <td><?=$page->deliveryname?></td>
                              </tr>
                              <tr>
                                 <td>deliveryphone</td>
                                 <td><?=$page->deliveryphone?></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td>deliveryemail</td>
                                 <td><?=$page->deliveryemail?></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td>note</td>
                                 <td><?=$page->note?></td>
                              </tr>
                              <tr>                        
                              <tr>
                                 <td>created_at</td>
                                 <td><?=$page->created_at?></td>
                              </tr>                             
                              <tr>
                                 <td>updated_at</td>
                                 <td><?=$page->updated_at?></td>
                              </tr>
                              <tr>
                                 <td>updated_by</td>
                                 <td><?=$page->updated_by?></td>
                              </tr>
                                 <td>status</td>
                                 <td><?=$page->status?></td>
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

<?php require_once '../views/backend/footer.php' ;?>


  
