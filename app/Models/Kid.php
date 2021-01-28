<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    //テーブル名
    protected $table = 'kids';

    // 可変項目（保存したい値）
    protected $fillable = [
        'user_id',
        'name',
        'birthday',
        'sex',
        'father_name',
        'mother_name',
        'gridRadios',
        'memo',
        'formated_interval'
    ];

    protected $dates = [
        // 'id',
        // 'name',
        // 'user_id',
        'now',
        'birthday',
        // 'now_formated_date',
        // 'formated_interval',
        // 'diff'
    ];

    // kidテーブルとは多対１の関係であることを定義
    public function user() {
        return $this -> belongsTo(User::class);
    }
}
