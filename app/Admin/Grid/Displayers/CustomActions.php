<?php

namespace App\Admin\Grid\Displayers;

use Encore\Admin\Grid\Displayers\Actions;

class CustomActions extends Actions
{
    protected function renderView()
    {
        return '';
    }

    protected function renderEdit()
    {
        return <<<EOT
<a
href="{$this->getResource()}/{$this->getRouteKey()}/edit"
class="{$this->grid->getGridRowName()}-edit btn btn-sm btn-default"
style="color: white; background-color: #3c8dbc; padding: 5px 10px; border: none; cursor: pointer;">
    編集
</a>
EOT;
    }

    protected function renderDelete()
    {
        $this->setupDeleteScript();
        if(\request('_scope_') == 'trashed'){
        return <<<EOT
<a
href="javascript:void(0);"
data-id="{$this->getKey()}"
class="{$this->grid->getGridRowName()}-delete btn btn-sm btn-default"
style="color: white; background-color: red;">
    削除
</a>
EOT;
        }else{return '';}
    }
}
