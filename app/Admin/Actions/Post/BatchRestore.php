<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class BatchRestore extends BatchAction
{
    public $name = '復元';

    /**
     * チェックを付けたレコードの論理削除を取り消す
     *
     * @param   Collection $collection 　チェックを付けたレコードの集まり
     * @return  Grid                     テーブルのごみ箱一覧で「ごみ箱から戻しました」というフラッシュを表示する
     *
     */
    public function handle(Collection $collection)
    {
        $collection->each->restore();

        return $this->response()->success('ごみ箱から戻しました')->refresh();
    }

    /**
     * テーブルのごみ箱一覧で「ごみ箱から戻して良いですか？」というフラッシュを表示する
     *
     */
    public function dialog()
    {
        $this->confirm('ごみ箱から戻して良いですか？');
    }
}
