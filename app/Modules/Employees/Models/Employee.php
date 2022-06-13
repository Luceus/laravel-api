<?php

namespace App\Modules\Employees\Models;

use App\Modules\Companies\Models\Company;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    //protected $table = 'flight_id';

    /**
     * 
     * @return BelongsTo App\Modules\Users\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     * @return BelongsTo \App\Modules\Companies\Models\Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
