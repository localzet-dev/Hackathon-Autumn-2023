<?php

namespace app\controller;

use support\{Request, Response};
use support\exception\BusinessException;
use support\Model;

abstract class AbstractCRUD extends Model
{
    protected static $model;

    public function all(Request $request): Response
    {
        /** @var Model $model */
        $model = static::$model;

        $where = $request->get('where');
        if ($where && $where_json = @json_decode($where)) {
            if ($where_json && is_array($where_json)) {
                $model->where($where_json);
            }
        }

        $collection = $model->all();

        $sortby = $request->get('sortby');
        if ($sortby) {
            $collection->sortBy($sortby);
        }

        return responseJson($collection);
    }

    public function create(Request $request): Response
    {
        $data = $request->post();

        $item = static::$model::create($data);
        $item->save();

        return response($item);
    }

    public function find(Request $request): Response
    {
        $id = $request->get('id');

        $item = static::$model::find($id);

        return response($item);
    }

    public function update(Request $request): Response
    {
        $id = $request->get('id');
        $data = $request->post();

        $item = static::$model::find($id);

        if (!$item) {
            throw new BusinessException("Объект не найден", 404);
        }

        $item->update($data);

        return response($item);
    }

    public function delete(Request $request): Response
    {
        $id = $request->get('id');

        $item = static::$model::find($id);

        if (!$item) {
            throw new BusinessException("Объект не найден", 404);
        }

        $item->delete();

        return response(['success' => true]);
    }
}