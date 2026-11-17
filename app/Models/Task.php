<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
}
//論理削除　https://qiita.com/t1k2a/items/1620ff10009dc6affdd1
