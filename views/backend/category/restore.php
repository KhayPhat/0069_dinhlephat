<?php
use App\Models\Category;
use App\Libraries\MessageArt;
$id=$_REQUEST['id'];
$category = Category::find($id);
if($category==null)
{
    header("location:index.php?option=category&cat=trash");
}
$category->status=2;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = (isset($_SESSION['user_id']))?$_SESSION['user_id']:1;
$category->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Khôi phục thành công']);
header("location:index.php?option=category");
