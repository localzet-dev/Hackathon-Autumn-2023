<?php

namespace app\controller;

use app\model\User as UserModel;
use support\{Request, Response};
use support\Model;
use Throwable;

class User extends Model
{
    // protected static $model = UserModel::class;
    public function index(Request $request) {
        return view('user/index');
    }
}