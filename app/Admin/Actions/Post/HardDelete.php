<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\Response;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * 物理删除
 * Class HardDelete
 * @package App\Admin\Actions\Post
 */
class HardDelete extends RowAction
{
    public $name = "删除";

    public function handle(Model $model)
    {
        $trans = [
            'failed'    => trans('admin.delete_failed'),
            'succeeded' => trans('admin.delete_succeeded'),
        ];

        try {
            DB::transaction(function () use ($model) {
                $model->forceDelete();
            });
        } catch (\Exception $exception) {
            return $this->response()->error("{$trans['failed']} : {$exception->getMessage()}");
        }

        return $this->response()->success($trans['succeeded'])->refresh();
    }

    /**
     * @return void
     */
    public function dialog()
    {
        $this->confirm('删除后不可恢复，确定删除？');
    }
}
