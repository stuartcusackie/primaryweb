<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SiteController extends Controller
{
    /**
     * Show the School's site index page.
     */
    public function index(School $school)
    {
        echo $school->name;
        echo route('site.slug.index', $school);
    }
}