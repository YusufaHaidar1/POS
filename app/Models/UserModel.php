<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    // // Implementing methods from Authenticatable interface

    // public function getAuthIdentifierName()
    // {
    //     return 'user_id'; // Assuming 'user_id' is the name of the primary key column
    // }

    // public function getAuthIdentifier()
    // {
    //     return $this->getKey(); // Returns the primary key value
    // }

    // public function getAuthPassword()
    // {
    //     return $this->password; // Returns the hashed password
    // }

    // public function getRememberToken()
    // {
    //     return $this->remember_token;
    // }

    // public function setRememberToken($value)
    // {
    //     $this->remember_token = $value;
    // }

    // public function getRememberTokenName()
    // {
    //     return 'remember_token';
    // }
}
