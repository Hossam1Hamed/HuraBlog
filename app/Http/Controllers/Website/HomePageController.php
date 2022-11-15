<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    private $postRepo;
    public function __construct(PostRepositoryInterface $postRepoInterface)
    {
        $this->postRepo = $postRepoInterface;
    }
    
    public function index()
    {
        $posts = $this->postRepo->getAllWithRelations(5);
        // return $posts[0]->likes->contains(Auth::user());
        // dd($posts);
        return view('web.pages.home',compact('posts'));
    }
    
}
