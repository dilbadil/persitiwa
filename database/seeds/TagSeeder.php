<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Titik Api',
            'Penebangan Hutan',
            'Response Pemerintah +',
            'Response Pemerintah -',
        ];

        foreach ($tags as $tag)
        {
            $name = str_replace(" ", "_", $tag);
            $name = strtolower($name);

            Tag::create([
                'name' => $name,
                'label' => $tag
            ]);
        }
    }
}
