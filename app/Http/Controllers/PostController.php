<?php
namespace App\Http\Controllers;
use App\Post;
use App\Permission;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // print_r(\Auth::user()->getAllPermissions());
        $posts = Post::latest()->paginate(10); 
        return view('admin.posts.index', compact('posts'));
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permissions = Permission::all();//Get all permissions
      return view('admin.posts.create', compact('permissions'));
    }
}