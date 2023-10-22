<?php

namespace app\controller;

use app\model\User as UserModel;
use support\{Request, Response};
use Throwable;

class User extends AbstractCRUD
{
    protected static $model = UserModel::class;
}