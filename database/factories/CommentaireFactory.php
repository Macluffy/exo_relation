<?php

namespace Database\Factories;

use App\Models\Commentaire;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commentaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        
                "nom" =>$this->faker->lastName(),
                "prenom" => $this->faker->firstName(),
                "dateDePublication" => $this->faker->date('d-m-Y'),
                "contenu" => $this->faker->text(),
                "video_id" => $this->faker->numberBetween(1, count(Video::all()))
            
        ];
    }
}
