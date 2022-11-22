<?php

namespace App\Repositories;

use App\Interfaces\LikeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LikeRepository implements LikeRepositoryInterface
{

    public function checkIfUserLikePost($post_id,$user_id)
    {
        $like = DB::table('likes')
                ->where('post_id',$post_id)
                ->where('user_id',$user_id)
                ->first();
        return $like;
    }

    public function insertIntoLikes($user_id , $post_id)
    {
        DB::table('likes')->insert([
            'user_id' => $user_id,
            'post_id' => $post_id,
        ]);

    }

    public function deleteLike($like_id)
    {
        DB::table('likes')->where('id',$like_id)->delete();
    }

}