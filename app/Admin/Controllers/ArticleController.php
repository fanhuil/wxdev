<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\Delete;
use App\Admin\Actions\Post\HardDelete;
use App\Models\Article;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Actions\Post\Restore;
use App\Admin\Actions\Post\Replicate;

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
        $grid->column('id', __('Id'))->sortable()->help('文章id')->style('text-align:center');
        $grid->column('title', __('Title'))->style('text-align:center');
        $grid->column('author', __('Author'))->style('text-align:center');
        //$grid->column('seo_title', __('Seo title'));
        //$grid->column('seo_keyword', __('Seo keyword'));
        //$grid->column('seo_description', __('Seo description'));
        $grid->column('is_hot', __('Is hot'))->display(function ($is_hot) {
            return $is_hot ? '是' : '否';
        })->style('text-align:center');
        $grid->column('created_at', __('Created at'))->style('text-align:center');
        $grid->column('updated_at', __('Updated at'))->style('text-align:center');
        $grid->quickSearch(function ($model,$query){
            $model->where('id', $query)->orWhere('title', 'like', "%{$query}%")->orWhere('author',$query);
        });
        $grid->column('category.category_name',__('Category category name'))->style('text-align:center');
        //$grid->category()->category_name()->style('text-align:center');

        $grid->filter(function ($filter) {
            // 回收站
            $filter->scope('trashed', '回收站')->onlyTrashed();
            // 设置created_at字段的范围查询
            $filter->between('created_at', __('Created at'), 'Created Time')->datetime();
        });

        $grid->actions(function ($actions) {
            // 回收站的操作
            if (\request('_scope_') == 'trashed') {
                // 去掉删除
                $actions->disableDelete();
                $actions->add(new Restore());
                $actions->add(new HardDelete());
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

        // 关联文章分类模型
        $form1 = new Form(new Category());
        $category = $form1->model()::all();
        $categoryList = [];
        foreach ($category as $cate){
            $categoryList[$cate->id] = $cate->category_name;
        }
        $form->select('categoryid')->options($categoryList);

        $form->UEditor('content', __('Content'))->rules('required');
        $form->radio('is_hot', __('Is hot'))->options([1 => '是',0 => '否'])->default('0');
        $form->radio('is_top', __('Is top'))->options([1 => '是',0 => '否'])->default('0');
        $form->radio('is_original', __('Is original'))->options([1 => '是',0 => '否'])->default('0');

        return $form;
    }
}
