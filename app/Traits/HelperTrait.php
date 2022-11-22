<?php

namespace App\Traits;



trait HelperTrait
{
    public function uploadImages($request)
    {
        $path = $request->file('image')->store('avatars','public');
        return $path;
    }
}

