<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = "commentaires";

    protected $fillable = ["nom", "prenom", "dateDePublication", "contenu", "video_id"];

    public function video(){
        return $this->belongsTo(Video::class);
    }

}
