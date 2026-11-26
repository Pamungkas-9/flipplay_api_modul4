<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Member;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $media = [
            ['title' => 'Sousou no Frieren', 'type' => 'Anime', 'year' => 2023,
             'genres' => ['Fantasy', 'Adventure', 'Drama'], 'rating' => 9.3, 'episodes' => 28],
            ['title' => 'Cowboy Bebop', 'type' => 'Anime', 'year' => 1998,
             'genres' => ['Action', 'Sci-Fi'], 'rating' => 8.8, 'episodes' => 26],
            ['title' => 'Crash Landing on You', 'type' => 'Drama', 'year' => 2019,
             'genres' => ['Romance', 'Comedy'], 'rating' => 8.7, 'episodes' => 16, 'country' => 'Korea Selatan'],
            ['title' => 'Reply 1988', 'type' => 'Drama', 'year' => 2015,
             'genres' => ['Family', 'Slice of Life'], 'rating' => 9.0, 'episodes' => 20, 'country' => 'Korea Selatan'],
            ['title' => 'Monster', 'type' => 'Manga', 'year' => 1994,
             'genres' => ['Thriller', 'Mystery'], 'rating' => 9.1, 'chapters' => 162, 'author' => 'Naoki Urasawa'],
            ['title' => 'Vagabond', 'type' => 'Manga', 'year' => 1998,
             'genres' => ['Action', 'Historical'], 'rating' => 9.2, 'chapters' => 327, 'author' => 'Takehiko Inoue'],
            ['title' => 'The Melancholy of Haruhi Suzumiya', 'type' => 'Light Novel', 'year' => 2003,
             'genres' => ['Comedy', 'Sci-Fi'], 'rating' => 7.9, 'volumes' => 11, 'author' => 'Nagaru Tanigawa'],
        ];

        foreach ($media as $item) {
            Media::create($item);
        }

        Member::create(['name' => 'Maul', 'member_id' => 'M001']);
    }
}
