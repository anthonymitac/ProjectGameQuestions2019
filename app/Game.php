<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//Generated By PlantUML Command
class Game extends Model{
public function users(){ 
    return $this->belongsTo('App\User'); 
}

}