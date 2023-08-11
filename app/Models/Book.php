<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
   use HasFactory;
   
    protected $guarded = ['id'];

    public function authors(): BelongsTo
    {
       return $this->belongsTo(Author::class);
    }

    public function genres(): HasOne
    {
       return $this->hasOne(Genre::class);
    }

    public function orders(): BelongsToMany
    {
       return $this->belongsToMany(Genre::class);
    }


}
