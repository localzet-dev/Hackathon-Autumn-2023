<?php

namespace app\controller;

use app\model\Poll as PollModel;
use support\{Request, Response};
use Throwable;

class Poll extends AbstractCRUD
{
        protected static $model = PollModel::class;
}