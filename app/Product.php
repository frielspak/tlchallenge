<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Disable timestamps
     */
    public $timestamps = false;

    /**
     * Fillable fields on create method
     */
    protected $fillable = ['id', 'description', 'category', 'price'];

    /**
     * Disable increment so it wont cast our string primary key as integer.
     */
    public $incrementing = false;
}