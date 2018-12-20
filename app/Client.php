<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'title', 'description', 'status','contact_phone','contract_start','contract_end',
    ];
    public function services() {
        return $this->hasMany('App\Service');
    }
}
