<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Stores pages to be read. 
 */
class Page extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Fields that can be filled.
     * 
     * @var array
     */
    protected $fillable = ['slug', 'title', 'body'];
}