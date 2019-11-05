<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('plans')->insert([
        'name' => 'Basic',
        'slug' => 'basic',
        'stripe_plan' => 'plan_G5i2fMD9esGQgl',
        'cost' => 10,
        'payment_plan' => 'monthly',
        'description' => 'Monthly Basic Subscription',
      ]);

      DB::table('plans')->insert([
        'name' => 'Professional',
        'slug' => 'professional',
        'stripe_plan' => 'plan_G5XhxwPgoiFepN',
        'cost' => 50,
        'payment_plan' => 'monthly',
        'description' => 'Monthly Professional Subscription',
      ]);

      DB::table('plans')->insert([
        'name' => 'Basic_Year',
        'slug' => 'basic_year',
        'stripe_plan' => 'plan_G5wF8oyLmY2eFC',
        'cost' => 100,
        'payment_plan' => 'yearly',
        'description' => 'Yearly Basic Subscription',
      ]);

      DB::table('plans')->insert([
        'name' => 'Professional_Year',
        'slug' => 'professional_Year',
        'stripe_plan' => 'plan_G5wG4XhirYGoeZ',
        'cost' => 480,
        'payment_plan' => 'yearly',
        'description' => 'Yearly Professional Subscription',
      ]);
    }
}
