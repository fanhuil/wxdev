<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Actions\Post\Restore;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());
        $grid->column('id', __('Id'))->sortable()->help('文章id');
        $grid->column('title', __('Title'));
        $grid->column('author', __('Author'));
        $grid->column('seo_title', __('Seo title'));
        $grid->column('seo_keyword', __('Seo keyword'));
        $grid->column('seo_description', __('Seo description'));
        $grid->column('is_hot', __('Is hot'), '热门?')->display(function ($is_hot) {
            return $is_hot ? '是' : '否';
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->quickSearch(function ($model,$query){
            $model->where('id', $query)->orWhere('title', 'like', "%{$query}%")->orWhere('author',$query);
        });
        $grid->filter(function ($filter) {
            // 回收站
            $filter->scope('trashed', '回收站')->onlyTrashed();
            // 设置created_at字段的范围查询
            $filter->between('created_at', __('Created at'), 'Created Time')->datetime();
        });

        $grid->actions(function ($actions) {
            if (\request('_scope_') == 'trashed') {
                $actions->add(new Restore());
            }
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('author', __('Author'));
        $show->field('seo_title', __('Seo title'));
        $show->field('seo_keyword', __('Seo keyword'));
        $show->field('seo_description', __('Seo description'));
        $show->field('content', __('Content'));
        $show->field('is_hot', __('Is hot'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());
        $form->text('title', __('Title'))->rules('required|min:3');
        $form->text('author', __('Author'));
        $form->text('seo_title', __('Seo title'));
        $form->text('seo_keyword', __('Seo keyword'));
        $form->text('seo_description', __('Seo description'));
        $form->UEditor('content', __('Content'))->rules('required');
        $form->radio('is_hot', __('Is hot'))->options([1 => '是',0 => '否'])->default('0');
        return $form;
    }
}
