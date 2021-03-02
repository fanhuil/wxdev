<?php

namespace App\Admin\Actions\Post;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Actions\RowAction;

class Restore extends RowAction
{
    public $name = '恢复';

    public function handle(Model $model)
    {
        $model->restore();

        return $this->response()->success('已恢复')->refresh();
    }

    public function dialog()
    {
        $this->confirm('确定恢复吗？');
    }
}
