<?php

namespace app\controller;

use app\model\Event as EventModel;
use support\{Request, Response};
use support\exception\BusinessException;

class Event extends AbstractCRUD
{
    protected static $model = EventModel::class;
}