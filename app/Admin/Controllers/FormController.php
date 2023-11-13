<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\BatchReplicate;
use App\Admin\Actions\Post\BatchRestore;
use App\Models\Forms;
use App\Models\Technologies;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FormController extends AdminController
{
    protected $title = 'フォームテーブル';

    protected function grid()
    {
        Admin::style('
            th {font-size: 20px; background: #DFEFFF;}
            td {font-size: 18px;}
            tr:nth-child(odd) {background: #DAFFE0;}
        ');
        $grid = new Grid(new Forms());

        // フリーワード検索欄（Quick search）の付与
        $grid->quickSearch(function ($model, $input) {
            $model->where('id', 'like', "%{$input}%")
                ->orWhere('name', 'like', "%{$input}%")
                ->orWhere('mail', 'like', "%{$input}%")
                ->orWhere('age', 'like', "%{$input}%")
                ->orWhereHas('technology', function ($query) use ($input) {
                    $query->where('proficient_language', 'like', "%{$input}%");
                });
        })->placeholder('名前・年齢・得意な言語等');

        // カラムの付与
        $grid->column('id', __('フォームID'));
        $grid->column('name', __('名前'));
        $grid->column('mail', __('メールアドレス'));
        $grid->column('age', __('年齢'));
        $grid->column('technology.proficient_language', __('得意な言語'));
        $grid->column('created_at', __('作成日時'))->display(function ($time) {
            return date("Y/m/d H:i:s", strtotime($time));
        });
        $grid->column('updated_at', __('更新日時'))->display(function ($time) {
            return date("Y/m/d H:i:s", strtotime($time));
        });
        // $grid->column('deleted_at', __('削除日時'))->display(function ($time) {
        //     return date("Y/m/d H:i:s", strtotime($time));
        // });
        $grid->column('deleted_at', __('削除日時'))->display(function ($time) {
            if (request()->has('_scope_') && request()->input('_scope_') === 'trashed') {
                return date("Y/m/d H:i:s", strtotime($time));
            } else {
                return ''; // 削除日時を非表示にする
            }
        });

        // フィルターの設定
        $grid->filter(function ($filter) {
            $filter->like('name', '名前');
            $filter->like('mail', 'メールアドレス');
            $filter->equal('age', '年齢');
            $filter->like('technology.proficient_language', '得意な言語');
            $filter->scope('trashed', 'ごみ箱')->onlyTrashed();
        });

        $grid->batchActions(function ($batch) {
            // デフォルトの物理削除機能を無効化する
            $batch->disableDelete();
            // フィルタの範囲が「ごみ箱」であったら、論理削除を取り消すボタンを追加
            if (\request('_scope_') == 'trashed') {
                $batch->add(new BatchRestore());
            } else {
                // 論理削除をするボタンを追加
                $batch->add(new BatchReplicate());
            }
        });
        $grid->disableExport();
        // $grid->disable;

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Forms::findOrFail($id));

        $show->field('id', __('フォームID'));
        $show->field('name', __('名前'));
        $show->field('mail', __('メールアドレス'));
        $show->field('age', __('年齢'));
        $show->field('technology.proficient_language', __('得意な言語'));
        $show->field('created_at', __('作成日時'));
        $show->field('updated_at', __('更新日時'));
        $show->field('deleted_at', __('削除日時'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Forms());

        // 編集ページタブの切り替え
        $form->tab('名前・メールアドレス', function ($form) {
            $form->text('name', __('名前'))->rules('required');
            $form->email('mail', __('メールアドレス'));
        });
        $form->tab('年齢・得意な言語', function ($form) {
            $form->number('age', __('年齢'));

            // 'tech_id' カラムのデータを使用してオプションを取得
            $techOptions = Technologies::all()->pluck('proficient_language', 'tech_id')->toArray();
            $form->select('tech_id', __('得意な言語'))->options($techOptions);
        });

        return $form;
    }
}
