<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Property
 *
 * @package App
 * @property string $name
 * @property string $user
 * @property string $password
*/
class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'user', 'password'];
    
    
    
}
