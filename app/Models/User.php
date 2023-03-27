<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Interfaces\User as UserInterface;

class User extends Authenticatable implements UserInterface
{
    use HasApiTokens, HasFactory, Notifiable;
    protected static $arr;
    protected $connection = 'mongodb';
    protected $collection = 'users';
    protected $fillable = [
        'name',
        'email', 'password'
    ];

    public static function getAllUser()
    {
        return static::all()->toArray();
    }
    public static function getDetail($id)
    {
        return static::findOrFail($id);
    }
    public static function getByEmail($email)
    {
        return static::where(self::USER_EMAIL, $email)->first();
    }
    public static function check_number($num): bool
    {
        return is_numeric($num);
    }

    public static function getAll($flag = false)
    {
        if (empty(static::$arr) || $flag) {
            $data = self::getAllUser();
            $arrNew = [
                "_id" => "123",
                "name" => "tmp",
                "email" => "minhphung485@gmail.com",
                "password" => "SGSeg",
                "created_at" => "FSEG",
                "updated_at" => "SGSG",
            ];
            static::$arr = array_merge($data,$arrNew);
        }
        return static::$arr;
    }

    public function test()
    {
        return self::getAll();
    }
}
