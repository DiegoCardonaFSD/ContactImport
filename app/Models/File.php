<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class File extends Model
{
    use HasFactory;

    public function failedContacts(){
        return $this->hasMany(FailedContact::class);
    }

    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
