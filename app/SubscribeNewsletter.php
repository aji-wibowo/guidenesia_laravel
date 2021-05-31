<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribeNewsletter extends Model 
{
	protected $table = 'subscribe_newsletter';
	protected $primaryKey = 'id';
	protected $fillable = ['email'];
}