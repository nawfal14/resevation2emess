<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        Type::create(['name' => 'Comédien']);
        Type::create(['name' => 'Musicien']);
        Type::create(['name' => 'Danseur']);
        Type::create(['name' => 'Chanteur']);
        Type::create(['name' => 'Acteur']);
        Type::create(['name' => 'Magicien']);
        Type::create(['name' => 'Mime']);
        Type::create(['name' => 'Acrobate']);
        Type::create(['name' => 'Clown']);
        Type::create(['name' => 'Peintre']);
        Type::create(['name' => 'Sculpteur']);
        Type::create(['name' => 'Photographe']);
        Type::create(['name' => 'Illustrateur']);
        Type::create(['name' => 'Écrivain']);
        Type::create(['name' => 'Poète']);
        Type::create(['name' => 'Réalisateur']);
        Type::create(['name' => 'Chef d\'orchestre']);
        Type::create(['name' => 'Compositeur']);
        Type::create(['name' => 'Chorégraphe']);
        Type::create(['name' => 'Jongleur']);
        Type::create(['name' => 'Marionnettiste']);
        Type::create(['name' => 'DJ']);
        Type::create(['name' => 'Graffeur']);
        Type::create(['name' => 'Calligraphe']);
        Type::create(['name' => 'Perchiste']);
        Type::create(['name' => 'Animateur']);
        Type::create(['name' => 'Auteur']);
        Type::create(['name' => 'Artiste de rue']);
    }
}