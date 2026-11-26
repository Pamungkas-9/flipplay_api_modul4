<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCollectionRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Resources\MediaResource;
use App\Http\Resources\MemberResource;
use App\Models\Media;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        return MemberResource::collection(Member::paginate(10));
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->validated());

        return (new MemberResource($member))->response()->setStatusCode(201);
    }

    public function show(Member $member)
    {
        return new MemberResource($member->load('media'));
    }

    public function collection(Member $member)
    {
        return MediaResource::collection($member->media()->paginate(10));
    }

    public function addToCollection(AddToCollectionRequest $request, Member $member)
    {
        if ($member->media()->where('media_id', $request->media_id)->exists()) {
            return response()->json(['message' => 'Media sudah ada di koleksi'], 409);
        }

        $member->media()->attach($request->media_id);

        return response()->json([
            'message' => 'Media berhasil ditambahkan ke koleksi',
            'data' => new MemberResource($member->load('media')),
        ], 201);
    }

    public function removeFromCollection(Member $member, Media $media)
    {
        if (! $member->media()->where('media_id', $media->id)->exists()) {
            return response()->json(['message' => 'Media tidak ada di koleksi'], 404);
        }

        $member->media()->detach($media->id);

        return response()->json(['message' => 'Media berhasil dihapus dari koleksi']);
    }
}
