<?php

namespace Database\Factories\Modules\Employees\Models;

use App\Modules\Companies\Models\Company;
use App\Modules\Employees\Models\Employee;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Employees\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'job_title' => $this->faker->jobTitle(),
            'user_id' => function () {
                $user = User::inRandomOrder()->first();
                return $user->id;
            },
            'company_id' => function () {
                $company = Company::inRandomOrder()->first();
                return $company->id;
            },
        ];
    }
}
