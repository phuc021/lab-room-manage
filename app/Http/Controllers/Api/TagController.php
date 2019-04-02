<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TagsRequest;
use App\Models\Tag;
use Validator;

class TagController extends BaseController
{
    public function index()
    {
        $itemperPage = 15;
        $tagsList = DB::table('tags')->paginate($itemperPage);
        
        return api_success(['tagsList' => $tagsList]);
    }

    public function store(TagsRequest $request)
    {
    	//Still error
        $tag = Tag::create($request->all());
        if($tag){
            return api_errors(400, ['errors' => trans('tags/langTag.notExist')]);
        }else{
            return api_success(['tag' => $tag]);
        }
    }

    public function update(TagsRequest $request, $id)
    {
        $tags = Tag::findOrFail($id);
        $tags->Update($request->all());
        if ($all->fails()) {
        	return api_errors(400,['errors' => trans('tags/langTag.notExist')]);
        }
        else{
        	return api_success(['tag' => $tags]);
        }
        
    }

    public function destroy($id)
    {
        Tag::destroy($id);
        
         return api_success(['message'=>trans('tags/langTag.delSuccess')]);
    }

}
