<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    protected function formatDate() : Attribute
    {
        return Attribute::make(
            get: function () {
                return date_format(date_create($this->created_at), 'd/m/Y');
            }
        );
    }
}

