<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use Validator;

class TagController extends BaseController
{
    public function index()
    {
        $tagList = DB::table('tags')->orderBy('id','ASC')->get();        
        return api_success(['data' => $tagList],"",200);
    }

    public function store(TagStoreRequest $request)
    {
        $tag = Tag::create($request->all());
            return api_success(['tag' => $tag],200);
    }

    public function update(TagUpdateRequest $request, $id)
    {
        $tags = Tag::findOrFail($id);
        $tags->Update($request->all());
        return api_success(['tag'=> $tags],200);
    }

    public function destroy($id)
    {
        Tag::destroy($id);
         return api_success(['message'=>trans('tags/langTag.delSuccess')],200);
    }
    
}
