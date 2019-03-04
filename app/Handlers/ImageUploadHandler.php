<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/4 0004
 * Time: 上午 11:16
 */
namespace App\Handlers;
use Image;
class ImageUploadHandler{
    protected $allowed_ext = ['png','jpg','jpeg','gif'];
    public function save($file,$folder,$file_prefix,$max_width=false)
    {
        $folder_name = "uploads/images/$folder/".date('Ym/d'.time());

        $upload_path = public_path().'/'.$folder_name;

        $extension = strtolower($file->getClientOriginalExtension())?:'png';

        $file_name = $file_prefix.'_'.time().'_'.str_random(10).'.'.$extension;

        if(!in_array($extension,$this->allowed_ext)){
            return false;
        }
        $file->move($upload_path,$file_name);
        if($max_width&&$extension!='jpg')
        {
            $this->reduceSize($upload_path.'/'.$file_name,$max_width);
        }
        return [
            'path'=>config('app.url')."/$folder_name/$file_name",
        ];

    }
    public function reduceSize($file_path,$max_width)
    {
        $image = Image::make($file_path);
        $image->resize($max_width,null,function($constraint){
            // 设定宽度是 $max_width，高度等比例双方缩放
            $constraint->aspectRatio();
            //防止截图时图片尺寸变大
            $constraint->upsize();
        });
        $image->save();
    }
}