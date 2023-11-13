<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class BatchReplicate extends BatchAction
{
    public $name = 'ごみ箱';

    /**
     * チェックを付けたレコードを論理削除する
     *
     * @param   Collection $collection 　チェックを付けたレコードの集まり
     * @return  Grid                     テーブル一覧で「ごみ箱に入れました」というフラッシュを表示する
     *
     */
    public function handle(Collection $collection)
    {
        $collection->each->delete();

        return $this->response()->success('ごみ箱に入れました')->refresh();
    }

    /**
     * テーブル一覧で「ごみ箱に入れてよろしいですか？」というフラッシュを表示する
     *
     */
    public function dialog()
    {
        $this->confirm('ごみ箱に入れてよろしいですか？');
    }
}
