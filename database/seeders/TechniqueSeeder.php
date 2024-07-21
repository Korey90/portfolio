<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $techniques = [
            'CSS',
            'JavaScript',
            'React',
            'Angular',
            'Vue.js',
            'Svelte',
            'Sass',
            'LESS',
            'Stylus',
            'Bootstrap',
            'Tailwind CSS',
            'Foundation',
            'Node.js',
            'Python',
            'Ruby',
            'PHP',
            'Laravel',
            'Java',
            'C#',
            'Go',
            'Rust',
            'NestJS',
            'Flask',
            'Django',
            'ASP.NET Core',
            'Ruby on Rails',
            'MySQL',
            'PostgreSQL',
            'SQLite',
            'MariaDB',
            'Oracle Database',
            'MongoDB',
            'Cassandra',
            'Redis',
            'CouchDB',
            'Firebase Realtime Database',
            'Git',
            'Rest',
            'GraphQL',
            'WebSockets',
            'jQuery',
            'APIs',
            'Web3',
            'JWT',
            'WebRTC',
            'OAuth/OIDC',
        ];

        foreach ($techniques as $name) {
            DB::table('techniques')->insert([
                'name' => $name,
            ]);
        }
    }
}
