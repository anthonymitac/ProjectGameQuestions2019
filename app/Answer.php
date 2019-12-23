<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
//Generated By PlantUML Command
class Answer extends Model{

    public $timestamps=false;
    public $table = "answer";
    protected $primaryKey = 'id';
    protected $fillable = ['id','answername'];

public function questions(){ 
    return $this->belongsTo('App\Questions'); 
}
}