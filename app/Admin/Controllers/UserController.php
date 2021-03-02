<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('username', __('Username'));
        $grid->column('truename', __('Truename'));
//        $grid->column('password', __('Password'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('sex', __('Sex'));
        $grid->column('last_ip', __('Last ip'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('deleted_at', __('Deleted at'));

        $grid->paginate(15);

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('truename', __('Truename'));
        $show->field('password', __('Password'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('sex', __('Sex'));
        $show->field('last_ip', __('Last ip'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('remember_token', __('Remember token'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('username', __('Username'));
        $form->text('truename', __('Truename'))->default('未知');
        $form->password('password', __('Password'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->text('sex', __('Sex'))->default('男');
        $form->text('last_ip', __('Last ip'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
