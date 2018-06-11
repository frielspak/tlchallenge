<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * Disable timestamps
     */
    public $timestamps = false;

    /**
     * Fillable fields on create method
     */
    protected $fillable = ['id', 'name', 'since', 'revenue'];
}