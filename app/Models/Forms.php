<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forms extends Model
{
    protected $table = 'laravel_forms'; //テーブル名の指定
    protected $primaryKey = 'id'; //プライマリキーの指定
    public $timestamps = true; //タイムスタンプ有効
    protected $fillable = ['name', 'mail', 'age', 'tech_id']; //各カラムを指定
    protected $searchable = [
        'name', 'mail', 'age', 'technology.proficient_language',
    ];
    use SoftDeletes;
    use HasFactory;

    // Technologiesモデルのリレーションシップを設定（Eloquentモデル）
    public function technology()
    {
        return $this->belongsTo(Technologies::class, 'tech_id', 'tech_id');
    }
}
