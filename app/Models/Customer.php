<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    private static $customer, $image, $imageExtension, $imageName, $directory, $imageURL;

    public static function getImageUrl($request)
    {

        self::$image                = $request->file('image');
//        self::$imageName = self::$image->getClientOriginalName();
        self::$imageExtension       = self::$image->getClientOriginalExtension();
        self::$imageName            = time().'.'.self::$imageExtension; //394833.png
        self::$directory            = 'customer-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL             = self::$directory.self::$imageName;
        return self::$imageURL;

    }

    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name  = $request->name;
        self::$customer->email  = $request->email ;
        self::$customer->password = bcrypt($request->mobile);
        self::$customer->mobile  = $request->mobile ;
        self::$customer->save();
        return self::$customer;

    }

    public static function updateCustomer($request)
    {
        self::$customer = Customer::find(session()->get('customer_id'));

        if($request->file('image'))
        {
            if(file_exists(self::$customer->image))
            {
                unlink(self::$customer->image);
            }
            self::$imageURL = self::getImageUrl($request);
        }
        else
        {
            if(self::$customer->image)
            {
                self::$imageURL = self::$customer->image;
            }
            else
            {
                self::$imageURL = 'download/avater.png' ;
            }

        }

        self::$customer->name  = $request->name;
        self::$customer->email  = $request->email ;
        self::$customer->mobile  = $request->mobile ;
        self::$customer->nid  = $request->nid ;
        self::$customer->address  = $request->address ;
        self::$customer->image  = self::$imageURL ;
        self::$customer->date_of_birth  = $request->date_of_birth ;
        self::$customer->blood_group  = $request->blood_group ;
        self::$customer->save();



    }













}
