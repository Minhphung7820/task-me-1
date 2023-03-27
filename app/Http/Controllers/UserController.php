<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use  App\Transformers\UserTransformer;

class UserController extends Controller
{
    protected $value = 0;
    private $fractal;

    private $userTransformer;
    function __construct(Manager $fractal, UserTransformer $userTransformer)
    {
        $this->fractal = $fractal;
        $this->userTransformer = $userTransformer;
    }
    // public function increase()
    // {
    //     // $this->value++;
    //     // Http::get();
    //     // return $this->value;
    //     return $this;
    // }
    public function index()
    {
        $users = User::query()->get();
        $users = new Collection($users, $this->userTransformer); // Create a resource collection transformer
        $users = $this->fractal->createData($users); // Transform data

        return $users->toArray(); // Get transformed array of data
    }
}
