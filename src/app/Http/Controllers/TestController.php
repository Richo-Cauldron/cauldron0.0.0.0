<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('tests.pagination-test');
    }

    public function homeToSearch()
    {
        return view('tests.home-to-search');
    }

    public function brew_test($searchTerm)
    {
        return view('tests.h-t-s-brew', compact('searchTerm'));
    }
}
