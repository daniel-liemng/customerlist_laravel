<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // fillable for mass assignment
    // protected $fillable = ['name', 'email', 'active'];

    // guarded
    protected $guarded = [];

    // set default value for Active attribute
    protected $attributes = [
        'active' => 1
    ];

    public function getActiveAttribute($attribute) {
        return $this->activeOptions()[$attribute];
    }

    // active customers
    public function scopeActive($query) {
        return $query->where('active', '1');
    }

    // inactive customers
    public function scopeInactive($query) {
        return $query->where('active', '0');
    }

    // relationship
    public function company() {
        return $this->belongsTo(Company::class);
    }

    // refactor Active Option
    public function activeOptions() {
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Process'
        ];
    }
}
