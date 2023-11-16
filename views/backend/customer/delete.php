<?php
 use App\Models\Customer; 
use App\Libraries\MyClass;

 $id= $_REQUEST['id'];
 $customer= Customer::find($id);

 if($customer==NULL)
 {
   MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=customer");
 }
 
 $customer->status = 0;

 $customer->created_at = date('Y-m-d H:i:s');
 $customer->save();
 MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
 header("location:index.php?option=customer");
