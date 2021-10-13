<?php

namespace App\Enjoythetrip\Repositories;

use App\Enjoythetrip\Interfaces\FrontendRepositoryInterface;
use App\{TouristObject,City,Room,Reservation,Article,User,Comment};

class FrontendRepository implements FrontendRepositoryInterface {

    public function getObjectsForMainPage()
    {
        return TouristObject::with(['city','photos'])->ordered()->paginate(8);
    }

    public function getObject($id)
    {
        return TouristObject::with(['city', 'photos', 'address', 'users.photos', 'rooms.photos', 'comments.user', 'articles.user', 'rooms.object.city'])->find($id);
    }

    public function getSearchCities(string $term)
    {
        return City::where('name', 'LIKE', $term . '%')->get();
    }

    public function getSearchResults(string $city)
    {
        return City::with(['rooms.reservations', 'rooms.photos', 'rooms.object.photos'])->where('name',$city)->first() ?? false;
    }

    public function like($likeable_id, $type, $request)
    {
        $likeable = $type::find($likeable_id);

        return $likeable->users()->attach($request->user()->id);
    }

    public function unlike($likeable_id, $type, $request)
    {
        $likeable = $type::find($likeable_id);

        return $likeable->users()->detach($request->user()->id);
    }

    public function addComment($commentable_id, $type, $request)
    {
        $commentable = $type::find($commentable_id);

        $comment = new Comment;

        $comment->content = $request->input('content');

        $comment->rating = $type == 'App\TouristObject' ? $request->input('rating') : 0;

        $comment->user_id = $request->user()->id;

        return $commentable->comments()->save($comment);
    }

}


