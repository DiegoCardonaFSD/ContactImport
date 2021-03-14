<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $user_id
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    /**
     * @return HasMany
     */
    public function failedContacts(){
        return $this->hasMany(FailedContact::class);
    }

    /**
     * @return HasMany
     */
    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
