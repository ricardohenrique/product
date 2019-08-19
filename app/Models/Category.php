<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements ModelInterface
{
	use SoftDeletes;

    protected $table = 'categoria';
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'COD_CATEGORIA',
        'DESCRICAO'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
