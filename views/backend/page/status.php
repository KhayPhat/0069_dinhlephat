<?php
use App\Libraries\MyClass;
use App\Models\Page; 
 $id= $_REQUEST['id'];
 $page= Page::find($id);

 if($page==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=page");
 }
 
 $page->status =( $page->status ==1)? 2 : 1 ;

 $page->created_at = date('Y-m-d H:i:s');
 $page->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1 ;
 $page->save();
 MyClass::set_flash('message',['msg'=>'Thay đổi trang thái thành công','type'=>'success']);
 header("location:index.php?option=page");
