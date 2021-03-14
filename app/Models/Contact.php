<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name','date_of_birth', 'phone', 'address', 'card_token', 'card_last_digits', 'franchise', 'email', 'file_id'];

    /**
     * @param $value
     * @return string
     */
    public function getDateOfBirthAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->isoFormat('YYYY MMMM d');
    }
    /**
     * @return BelongsTo
     */
    public function file(){
        return $this->belongsTo(File::class, 'file_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
