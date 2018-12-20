<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $table = 'services';
    protected $fillable = [
        'title', 'type','link','description','client_id',
    ];
   
}
