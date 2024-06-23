<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\select;

class Brand extends Model
{
    use HasFactory;


    private static $brand, $image, $imageExtension, $imageName, $directory, $imageURL;

    public static function getImageURL($request)
    {

        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension ;
        self::$directory = 'brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;


    }


    public static function createBrand($request)
    {

        self::$brand = new Brand();
        self::$brand->name          = $request->name;
        self::$brand->description   = $request->description;
        self::$brand->image         = self::getImageURL($request);
        self::$brand->save();

    }

    public static function updateBrand($id, $request)
    {

        self::$brand = Brand::find($id);

        if($request->file('image')){

            if(file_exists(self::$brand->image)){
                unlink(self::$brand->image);
            }
            self::$imageURL = self::getImageURL($request);
        }
        else
        {
            self::$imageURL = self::$brand->image;
        }


         self::$brand->name = $request->name;
         self::$brand->description = $request->description;
         self::$brand->image =self::$imageURL ;
         self::$brand->save();

    }


    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);

        if(file_exists(self::$brand->image)){

            unlink(self::$brand->image);

        }

        self::$brand->delete();

    }









}
