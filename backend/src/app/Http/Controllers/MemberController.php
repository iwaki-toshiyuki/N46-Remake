<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    // メンバー一覧取得
    public function index()
    {
        return Member::with('status')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    // メンバー詳細取得
    public function show(string $id)
    {
        $member = Member::with([
                'status',
                'diagnosisResults'
            ])
            ->withCount('favoritedByUsers')
            ->findOrFail($id);

        return response()->json($member);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
