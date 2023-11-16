<?php
use App\Models\Category;
use App\Libraries\MessageArt;
$id=$_REQUEST['id'];
$category = Category::find($id);
if($category==null)
{
    MessageArt::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location:index.php?option=category");
}
$category->status=($category['status']==1)?2:1;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = 1;
$category->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Thay đổi trạng thái thành công']);
header("location:index.php?option=category");
