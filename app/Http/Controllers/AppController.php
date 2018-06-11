<?php

namespace App\Http\Controllers;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class AppController extends Controller
{
    /**
     * Shows a message for the / route.
     *
     * @return string
     */
    public function index() {
        return 'Hello Teamleader discount challange';
    }
}

