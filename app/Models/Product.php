<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements ModelInterface
{
	use SoftDeletes;

    protected $table = 'produto';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'COD_PRODUTO';
    
    protected $fillable = [
        'COD_PRODUTO',
        'DESCRICAO',
        'COD_CATEGORIA',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
