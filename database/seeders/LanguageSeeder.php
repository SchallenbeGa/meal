<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
  
class LanguageSeeder extends Seeder
{
    /**
     * Run the database sseeds.
     * you can predefine the price
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'language' => 'Français'
            ],
            [
                'language' => 'Anglais'
            ],
            [
                'language' => 'Allemand'
            ],
            [
                'language' => 'Espagnol'
            ]
        ];
  
        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
