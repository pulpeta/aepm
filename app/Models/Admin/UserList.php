<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table = 'Users';
    protected  $primaryKey = 'id';
    //li usiamo perchè nome tabella non coincide con nome classe

    //protected $fillable = [''];
    //si usa co metodo create per aggiungee record, specifica quali campi possono
    // essere scritti in modo da proteggere da tentativi di scrittura non autorizzata

}
