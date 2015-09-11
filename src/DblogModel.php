<?php

namespace Supersixtwo\Dblog;

use Illuminate\Database\Eloquent\Model;

class DblogModel extends Model
{
 
    // Tell it the table name (different than model name) 
    protected $table = 'dblogs';
    
    // remove the timestamps
    public $timestamps = false;

    
}
