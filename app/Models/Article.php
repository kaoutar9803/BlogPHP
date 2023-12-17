<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id',
    ];

    // Relation : Un article appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation : Un article appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation : Un article peut avoir plusieurs tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }
}
