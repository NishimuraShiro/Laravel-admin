<?php

namespace App\Admin\Controllers;

use App\Models\Technologies;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TechnologyController extends AdminController
{
  /**
   * Title for current resource.
   *
   * @var string
   */
  protected $title = 'Technologies';

  /**
   * Make a grid builder.
   *
   * @return Grid
   */
  protected function grid()
  {
    $grid = new Grid(new Technologies());

    $grid->column('tech_id', __('技術番号'));
    $grid->column('proficient_language', __('言語'));

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
    $show = new Show(Technologies::findOrFail($id));

    $show->field('tech_id', __('技術番号'));
    $show->field('proficient_language', __('言語'));

    return $show;
  }

  /**
   * Make a form builder.
   *
   * @return Form
   */
  protected function form()
  {
    $form = new Form(new Technologies());

    $form->text('proficient_language', __('言語'));

    return $form;
  }
}
