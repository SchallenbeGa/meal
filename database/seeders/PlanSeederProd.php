<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;
  
class PlanSeederProd extends Seeder
{
    /**
     * Run the database seeds.
     * you can predefine the price
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Plan free', 
                'slug' => 'free', 
                'purchase_type' =>  'free',
                'stripe_plan' => "prod_MyEMwUesRDC6Ll", 
                'api_id'=>"price_1MIjReL9uAJs7tE4aAs6C9UO",
                'price' => 0, 
                'id_plan'=>0,
                'tokens_limit'=>5,
                'description' => 'free'
            ],
            [
                'name' => 'Bundle de base', 
                'slug' => 'bundle-basic',
                'purchase_type' =>  'bundle', 
                'stripe_plan' => "prod_N6omq7kz8qk3DM", 
                'api_id'=>"price_1MMb8ZJLrvkp2lFnpsq6G105",
                'price' => 5.99, 
                'id_plan'=>4,
                'tokens_limit'=>20,
                'description' => 'Bundle de base'
            ],
            [
                'name' => 'Plan standard', 
                'slug' => 'standard', 
                'purchase_type' =>  'subscription',
                'stripe_plan' => "prod_N326TbmeoxwI6Y", 
                'api_id'=>"price_1MIw2CJLrvkp2lFnFJMK6m2U",
                'price' => 4.99, 
                'id_plan'=>2,
                'tokens_limit'=>25,
                'description' => 'standard'
            ],
            [
                'name' => 'Plan premium', 
                'slug' => 'premium',
                'purchase_type' =>  'subscription', 
                'stripe_plan' => "prod_N3271ORAFf2Z4A", 
                'api_id'=>"price_1MIw3NJLrvkp2lFn6i9a9STx",
                'price' => 9.99,
                'id_plan'=>3,                 
                'tokens_limit'=>100,
                'description' => 'Premium'
            ]
        ];
  
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
