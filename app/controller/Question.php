<?php

namespace app\controller;

use app\model\Question as QuestionModel;
use support\{Request, Response};
use Throwable;

class Question extends AbstractCRUD
{
        protected static $model = QuestionModel::class;
}