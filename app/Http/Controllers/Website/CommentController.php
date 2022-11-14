<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\CommentRequest;
use App\Interfaces\CommentRepositoryInterface;
use Illuminate\Http\Request;
use App\Events\CommentEvent;
use App\Interfaces\UserRepositoryInterface;

class CommentController extends Controller
{
    private $commentRepo;
    private $userRepo;
    public function __construct(CommentRepositoryInterface $commentRepoInterface,UserRepositoryInterface $userRepoInterface)
    {
        $this->commentRepo = $commentRepoInterface;
        $this->userRepo = $userRepoInterface;
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(CommentRequest $request)
    {
        $comment = $this->commentRepo->create($request->all());
        $user = $this->userRepo->find($request->user_id);
        if($comment)
        {
            broadcast(new CommentEvent($user))->toOthers();
            return redirect()->route('website.home')->with('success','Comment Added Successfully');
        }else{
            return redirect()->route('website.home')->with('error','Somethig wrong occured ... please try again');
        }
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
