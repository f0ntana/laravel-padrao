<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'slug', 'active'];

    public function getValidations($action)
    {
        switch($action)
        {
            case 'get':
            case 'destroy':
            {
                return [];
            }
            case 'store':
            {
                return [
                    'name' => 'required'
                ];
            }
            case 'update':
            {
                return [
                    'name' => 'required'
                ];
            }
            default:break;
        }
    }
}
