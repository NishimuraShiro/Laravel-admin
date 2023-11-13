<?php

namespace Encore\Admin\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
  public function index(Content $content)
  {
    return $content
      ->title($this->title())
      ->description($this->description['index'] ?? trans('admin.list'))
      ->body($this->grid());
  }
}
