<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/4 0004
 * Time: 上午 11:16
 */
namespace App\Handlers;

class ImageUploadHandler{
    protected $allowed_ext = ['png','jpg','jpeg','jpg'];
    public function save($file,$folder,$file_prefix)
    {
        $folder_name = "uploads/images/$folder/".date('Ym/d'.time());

        $upload_path = public_path().'/'.$folder_name;

        $extension = strtolower($file->getClientOriginalExtension())?:'png';

        $file_name = $file_prefix.'_'.time().'_'.str_random(10).'.'.$extension;

        if(!in_array($extension,$this->allowed_ext)){
            return false;
        }
        $file->move($upload_path,$file_name);
        return [
            'path'=>config('app.url')."/$folder_name/$file_name",
        ];

    }
}