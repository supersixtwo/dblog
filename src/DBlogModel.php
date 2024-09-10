<?php

namespace Supersixtwo\Dblog;

use Illuminate\Database\Eloquent\Model;

class DBlogModel extends Model
{
 
    /**
     * declare the table name,
     * different than the model name.
     *
     * @var  $table
     */
     
    protected $table = 'dblogs';
    
    /**
     * Remove timestamps (not needed)
     *
     * @var $timestamps
     */
     
    public $timestamps = false;

    
}
