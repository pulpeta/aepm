<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table = 'Users';
    protected  $primaryKey = 'id';
    //dichiaro i due protected perchè nome tabella non coincide con nome classe

}
