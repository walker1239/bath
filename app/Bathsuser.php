<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Baths_User
 *
 * @package App
 * @property string $bath
 * @property string $user
 * @property string $photo
 * @property string $code_qr
 * @property dateTime $time_exit
 * @property dateTime $time_entry
 * @property string $latitude
 * @property string $longitude
*/
class Bathsuser extends Model
{
    use SoftDeletes;

    protected $fillable = ['photo', 'baths_id', 'employees_id','time_entry','time_exit','latitude','longitude'];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->employees_id = auth()->employee()->id;
        });
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setBathIdAttribute($input)
    {
        $this->attributes['baths_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setEmployeeIdAttribute($input)
    {
        $this->attributes['employees_id'] = $input ? $input : null;
    }
    
    public function bath()
    {
        return $this->belongsTo(Bath::class, 'baths_id')->withTrashed();
    }
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employees_id');
    }
    
}
