
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // Dòng này là bắt buộc!
// use App\Http\Controllers\HomeController; // Chỉ cần nếu dùng cho route '/'

// ...
// Định nghĩa Route cho /posts
Route::get("posts", [PostController::class, "index"]);