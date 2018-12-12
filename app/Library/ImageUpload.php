<?php
/**
 * Created by PhpStorm.
 * User : zhaoqian
 * Email: haomani521@gmail.com
 * Date : 2018/12/12
 * Time : 16:21
 */

namespace App\Library;


use Image;

class ImageUpload
{
    //允许上传的后缀
    protected $allowed_ext = ['png', 'jpeg', 'jpg', 'gif'];

    //上传图片
    public function save($file, $folder, $filePrefix,$maxWidth=false)
    {
        $folderPath="uploads/images/$folder/".date('Ym/d', time());
        //上传图片路径
        $uploadPath = public_path().'/'.$folderPath;
        //获取文件夹后缀
        $ext = strtolower($file->getClientOriginalExtension()) ?: 'png';
        //检测文件夹后缀如果不在允许的列表中则返回 false
        if (!in_array($ext, $this->allowed_ext)) {
            return false;
        }
        //文件夹名称
        $filename = $filePrefix.'_'.time().'_'.str_random().$ext;
        //上次图片
        $file->move($uploadPath, $filename);
        if($maxWidth && $ext!='gif'){
            // 此类中封装的函数，用于裁剪图片
            $this->reduceSize($uploadPath . '/' . $filename, $maxWidth);
        }
        //返回成功之后的图片路径
        return [
            'path' =>config('app.url')."/$folderPath/$filename"
        ];
    }

    //裁剪图片
    public function reduceSize($filePath,$maxWidth)
    {
        $image=\Intervention\Image\Facades\Image::make($filePath);
        $image->resize($maxWidth,null,function($constraint){
            // 设定宽度是 $max_width，高度等比例双方缩放
            $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });
        // 对图片修改后进行保存
        $image->save();
    }

}