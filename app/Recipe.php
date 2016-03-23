<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
    protected $fillable = [
        'title', 'description'
        ];
        
    public function user(){
        return $this->belongsTo('App\User');
    }
        
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->withTimestamps();
    }
    
    public function getIngredientListAttribute()
    {
        //$recipe->ingredients
        return $this->ingredients->lists('id')->all();
    }
    
}
