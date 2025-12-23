<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // 1. Import Post Model

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * Đây là phương thức được gọi khi truy cập route /posts
     */
    public function index()
    {
        // 2. Lấy tất cả bài viết từ database
        $posts = Post::all();
        
        // 3. Trả về view "home" và truyền dữ liệu $posts vào view
        return view("home", compact("posts")); 
        
        // Hoặc: return view("home", ['posts' => $posts]);
    }
}