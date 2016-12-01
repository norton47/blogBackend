<?php

namespace App\Http\Controllers;

/**
 * Comment Controller
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    public function index()
    {
        return view('post.index');
    }


}