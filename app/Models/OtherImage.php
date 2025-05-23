<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    private static $product, $otherImage,$otherImages,$image,$imageExtension,$imageName, $directory,$imageURL;

    public static function getImageURL($image)
    {

//        self::$image = $request->file('image');
        self::$imageExtension = $image->getClientOriginalExtension();
        self::$imageName = rand(1,100000).'.'.self::$imageExtension;
        self::$directory = 'product-other-images/' ;
        $image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;

    }


    public static function newOtherImage($id, $otherImages)
    {

            foreach ($otherImages as $otherImage) {
                self::$otherImage = new OtherImage();
                self::$otherImage->product_id = $id;
                self::$otherImage->image = self::getImageURL($otherImage);
                self::$otherImage->save();
            }
    }


    public static function updateOtherImage($id,$otherImages)
    {

        self::$otherImages = OtherImage::where('product_id', $id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
        self::newOtherImage($id, $otherImages);

    }

    public static function deleteOtherImage($id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if(file_exists($otherImage->image)){

                unlink($otherImage->image);
            }
            $otherImage->delete();
        }

    }



















}
