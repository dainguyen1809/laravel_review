<?php

namespace App\Models;

use App\Enums\StudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'birthdate',
        'status',
        'avatar',
        'course_id',
    ];

    protected function formatDate() : Attribute
    {
        return Attribute::make(
            get: function () {
                return date_format(date_create($this->created_at), 'd/m/Y');
            }
        );
    }

    protected function formatAge() : Attribute
    {
        return Attribute::make(
            get: function () {
                return date_diff(date_create($this->birthdate), date_create())->y;
            }
        );
    }

    protected function formatGender() : Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->gender === 0 ? 'Female' : 'Male';
            }
        );
    }

    public function formatStatus() : Attribute
    {
        return Attribute::make(
            get: function () {
                return StudentStatusEnum::getKeyByValue($this->status);
            }
        );
    }
    public function courseName() : Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->course->name;
            }
        );
    }

    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

}
