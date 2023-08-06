<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request) {
        $data = [
            'js' => 'js/index.js',
        ];
        return view('index', compact('data'))->render();
    }

    public function preview(Request $request) {
        $data = [
            'js' => 'js/preview.js',
        ];
        return view('preview', compact('data'))->render();
    }

    public function add(Request $request) {
        $data = [
            'js' => 'js/add.js',
        ];
        return view('add', compact('data'))->render();
    }

    public function edit(Request $request) {
        $data = [
            'js' => 'js/edit.js',
        ];
        return view('edit', compact('data'))->render();
    }
}
