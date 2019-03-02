<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comment';
    protected $fillable = [ 'visitor_name', 'comment', 'post_id'];
}
