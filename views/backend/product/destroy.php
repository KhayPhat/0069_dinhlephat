<?php
use App\Models\Product;
use App\Libraries\MessageArt;
$id=$_REQUEST['id'];
$product = Product::find($id);
if($product==null)
{
    header("location:index.php?option=product&cat=trash");
}
$product->delete();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Xóa khỏi danh sách thành công']);
header("location:index.php?option=product&cat=trash");
