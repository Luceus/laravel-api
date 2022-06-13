<?php

namespace App\Modules\Companies\Models;

use App\Modules\Employees\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 
     * @return HasMany App\Modules\Employees\Models\Employee
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
