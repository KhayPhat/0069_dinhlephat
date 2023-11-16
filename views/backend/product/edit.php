<?php
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
$id=$_REQUEST['id'];
$row=Product::find($id);
$list_category = Category::where('status','!=',0)->get();
$list_brand = Brand::where('status','!=',0)->get();
$html_category_id='';
$html_brand_id='';
foreach($list_category as $category)
{
   if($category->id==$row->category_id)
   {
      $html_category_id.="<option selected value='".$category->id."'>".$category->name."</option>";
   }
   else
   {
      $html_category_id.="<option value='".$category->id."'>".$category->name."</option>";
   }
}
foreach($list_brand as $brand)
{
   if($brand->id==$row->brand_id)
   {
      $html_brand_id.="<option selected value='".$brand->id."'>".$brand->name."</option>";
   }
   else
   {
      $html_brand_id.="<option value='".$brand->id."'>".$brand->name."</option>";
   }
}
?>
<?php require_once '../views/backend/header.php';?>
 <!-- CONTENT -->
 <form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="d-inline">Cập nhật sản phẩm</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        /
                        <li class="braedcrumb-item active">Cập nhật sản phẩm</li>
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
                        <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i> Lưu[Cập nhật]
                        </button>
                        <a href="index.php?option=product"class="btn btn-sm btn-info">
                        <i class="fas fa-arrow-left"></i> Quay về danh sách </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
               <?php include_once('../views/backend/messageAlert.php');?>
                    <div class="row">
                        <div class="col-md-9">
                           <input type="hidden" name="id" value="<?=$row->id;?>">
                            <div class="mb-3">
                                <lable for="name">Tên danh mục</lable>
                                <input name="name" id="name" type="text" class="form-control" required placeholder="Thời trang nam"
                                value="<?=$row->name;?>">
                            </div>
                            <div class="mb-3">
                                <lable for="detail">Chi tiết</lable>
                                <textarea name="detail" id="detail" class="form-control" required placeholder="Chi tiết"><?=$row->detail;?></textarea>
                            </div>
                            <div class="mb-3">
                                <lable for="metadesc">Mô tả(SEO)</lable>
                                <textarea name="metadesc" id="metadesc" class="form-control" 
                                required placeholder="Thời trang dành cho nam"><?=$row->metadesc;?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <lable for="metakey">Từ khóa(SEO)</lable>
                                <textarea name="metakey" id="metakey" class="form-control" 
                                required placeholder="Thời trang,..."><?=$row->metakey;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <lable for="category_id">Danh mục</lable>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option vulue="">--Chọn danh mục--</option>
                                    <?=$html_category_id;?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <lable for="brand_id">Thương hiệu</lable>
                                <select id="brand_id" name="brand_id" class="form-control" required>
                                    <option vulue="0">--Chọn thương hiệu--</option>
                                    <?=$html_brand_id;?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <lable for="qty">Số lượng</lable>
                                <input name="qty" id="qty" type="number" value="<?=$row->qty;?>" min="1" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <lable for="price">Giá</lable>
                                <input name="price" id="price" type="number" value="<?=$row->price;?>" min="1000" step="500" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <lable for="pricesale">Giá sale</lable>
                                <input name="pricesale" id="pricesale" type="number" value="pricesale" min="1000" step="500" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <lable for="image">Hình ảnh</lable>
                                <input name="image" id="image" type="file" class="form-control" >
                            </div>
                            <div class="col-mb-3">
                                <lable for="status">Trạng thái</lable>
                                <select id="status" name="status" class="form-control">
                                    <option vulue="2" <?=($row->status==2)?'selected':'';?>>Chưa xuất bản</option>
                                    <option vulue="1" <?=($row->status==1)?'selected':'';?>>Xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>        
                </div>
               </div>
            </div>
         </section>
    </div>

 </form>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>