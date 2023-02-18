<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $fillable = [
        'website_id',
        'title',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function websites()
    {
        return $this->hasOne(Website::class);
    }
}
