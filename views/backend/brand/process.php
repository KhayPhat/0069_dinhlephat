<?php
use App\Models\Brand;
use App\Libraries\MessageArt;
use App\Libraries\MyClass;
if(isset($_POST['THEM']))
{
    $row = new Brand;
    $row->name=$_POST['name'];
    $row->slug=MyClass::str_slug($_POST['name']);
    //$row->sort_order=$_POST['sort_order'];
    $row->status=$_POST['status'];
    $row->created_at=date('Y-m-d H:i:s');
    $row->created_by=1;
    $row->save();
    MessageArt::set_flash('message',['type'=>'success','msg'=>'Thêm thành công']);
header('location:index.php?option=brand');
}
if(isset($_POST['CAPNHAT']))
{
    $id=$_POST['id'];
    $row = Brand::find($id);
    $row->name=$_POST['name'];
    $slug = $_POST['slug'];
    $row->description = $description;
    $row->status=$_POST['status'];
    $row->slug=MyClass::str_slug($_POST['name']);
    $row->updated_at=date('Y-m-d H:i:s');
    $row->updated_by=1;
    $row->save();
    MessageArt::set_flash('message',['type'=>'success','msg'=>'Cập nhật thành công']);
header('location:index.php?option=brand');
}

// $name = $_POST['name'];
//             $slug = $_POST['slug'];
//             $description = $_POST['description'];

//             // Cập nhật các trường dữ liệu của thương hiệu
//             $brand->name = $name;
//             $brand->slug = $slug;
//             $brand->description = $description;
//             $brand->status = 1;

//             // Lưu các thay đổi vào cơ sở dữ liệu
//             $brand->save();
//             $error = 'Cập nhật thành công !!!';
//             header("location:index.php?option=brand");
//         } else {
//             $error = "thất bại !!!";
//         }