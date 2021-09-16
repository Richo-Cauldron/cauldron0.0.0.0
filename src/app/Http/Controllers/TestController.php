<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('testViews.pagination-test');
    }

    public function homeToSearch()
    {
        return view('testViews.home-to-search');
    }

    public function brew_test($searchTerm)
    {
        return view('testViews.h-t-s-brew', compact('searchTerm'));
    }
}
