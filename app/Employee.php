<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 *
 * @package App
 * @property string $name
 * @property string $phone
 * @property string $user
 * @property string $password
*/
class Employee extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name','phone', 'user', 'password', 'remember_token', 'invitation_token', 'property_id'];


    
}


