<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product,$image,$imageExtension,$imageName, $directory,$imageURL;

    public static function getImageURL($request)
    {

        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(1,100000).'.'.self::$imageExtension;
        self::$directory = 'product-images/' ;
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;

    }


    public static function createProduct($request)
    {

        self::$product                      = new Product();
        self::$product->category_id         = $request->category_id;
        self::$product->sub_category_id     = $request->sub_category_id;
        self::$product->brand_id            = $request->brand_id;
        self::$product->unit_id             = $request->unit_id;
        self::$product->name                = $request->name;
        self::$product->code                = $request->code ;
        self::$product->slug                = $request->slug;
        self::$product->regular_price       = $request->regular_price;
        self::$product->selling_price       = $request->selling_price;
        self::$product->stock_amount        = $request->stock_amount;
        self::$product->short_description   = $request->short_description;
        self::$product->long_description    = $request->long_description;
        self::$product->image               = self::getImageURL($request);
        self::$product->save();
        return self::$product;

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);

        if($request->file('image'))
        {
          if(file_exists(self::$product->image))
          {
              unlink(self::$product->image);
          }
          self::$imageURL = self::getImageURL($request) ;
        }
        else
        {
            self::$imageURL = self::$product->image ;
        }

        self::$product->category_id         = $request->category_id;
        self::$product->sub_category_id     = $request->sub_category_id;
        self::$product->brand_id            = $request->brand_id;
        self::$product->unit_id             = $request->unit_id;
        self::$product->name                = $request->name;
        self::$product->code                = $request->code ;
        self::$product->slug                = $request->slug;
        self::$product->regular_price       = $request->regular_price;
        self::$product->selling_price       = $request->selling_price;
        self::$product->stock_amount        = $request->stock_amount;
        self::$product->short_description   = $request->short_description;
        self::$product->long_description    = $request->long_description;
        self::$product->image               = self::$imageURL;
        self::$product->save();
        return self::$product;

    }

    public static function deleteProduct($id)
    {
         self::$product = Product::find($id);
         if(file_exists(self::$product->image))
             {
                 unlink(self::$product->image);
             }
         self::$product->delete();
    }


























}
