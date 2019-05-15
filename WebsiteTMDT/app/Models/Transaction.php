<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transactions';
    protected $guarded = ['*'];

    public function user(){
    	return $this->belongsTo(User::class,'tr_user_id');
    }

    const STATUS_DONE = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
    	1 => [
			'name' => 'Đã xử lý',
			'class' => 'label-danger'
    	],
    	0 => [
    		'name' => 'Chưa xử lý',
    		'class' => 'label-default'
    	]
    ];

    public function getStatus(){
    	return array_get($this->status,$this->tr_status,'[N\A]');
    }
}
