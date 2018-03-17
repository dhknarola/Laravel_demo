<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Member;
// use DB;

class MemberController extends Controller
{
    public function index()
    {
        
        // DB::enableQueryLog();
        $members = Member::latest()->paginate(10);
        // $query = DB::getQueryLog();
        // $query = end($query);
        // dd($query);
        return view('members.index',compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:members',
        ]);
        Member::create($request->all());
        return redirect()->route('members.index')
                        ->with('success','Member created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('members.show',compact('member'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit',compact('member'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Member $member)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:members,email,'.$member->id,
        ]);
        $member->update($request->all());
        return redirect()->route('members.index')
                        ->with('success','Member updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::destroy($id);
        return redirect()->route('members.index')
                        ->with('success','Member deleted successfully');
    }
}
