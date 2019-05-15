<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contacts';
    protected $guarded = ['*'];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
    	1 => [
			'name' => 'Public',
			'class' => 'label-danger'
    	],
    	0 => [
    		'name' => 'Private',
    		'class' => 'label-default'
    	]
    ];

    public function getStatus(){
    	return array_get($this->status,$this->c_status,'[N\A]');
    }

    public function user(){
    	return $this->belongsTo(User::class,'id');
    }
}
