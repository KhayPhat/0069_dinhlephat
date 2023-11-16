<?php
use App\Models\Product;
use App\Libraries\MessageArt;
$id=$_REQUEST['id'];
$product = Product::find($id);
if($category==null)
{
    header("location:index.php?option=product&cat=trash");
}
$product->status=2;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = (isset($_SESSION['user_id']))?$_SESSION['user_id']:1;
$product->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Khôi phục thành công']);
header("location:index.php?option=product");
