<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'HTML',
                'slug' => 'html',
            ],
            [
                'name' => 'CSS3',
                'slug' => 'css3',
            ],
            [
                'name' => 'JAVASCRIPT',
                'slug' => 'javascript',
            ],
            [
                'name' => 'JQUERY',
                'slug' => 'jquery',
            ]
        ];

        foreach ($tags as $key => $tag) {
           Tag::create($tag);
        }
    }
}
