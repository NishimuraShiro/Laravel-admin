<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    protected $table = 'laravel_technologies';
    protected $primaryKey = 'tech_id';
    protected $fillable = ['proficient_language'];
    public $timestamps = false;
}
