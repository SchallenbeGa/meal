<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Planning extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'user_id',
        'plan'
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}