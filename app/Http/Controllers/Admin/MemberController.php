<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.members.create');
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
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $member = Member::find($id);
    return view('admin.members.create', compact('member'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $members = Member::all();
    return view('admin.members.index', compact('members'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $member = Member::find($id);
    return view('admin.members.show', compact('member'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'first_name' => 'required',
      'last_name' => 'required',
      // 'social_sec_nr' => ['regex:^([A-Z]{6}[0-9LMNPQRSTUV]{2}[ABCDEHLMPRST]{1}[0-9LMNPQRSTUV]{2}[A-Z]{1}[0-9LMNPQRSTUV]{3}[A-Z]{1})$'],
      'date_of_birth' => 'date',
      // 'postal_code' => 'regex:^[0-9]{5}$',
      'email' => 'email', //TODO: add rfc,dns once you're ready to start with real data
    ]);

    $data = $request->all();
    $newRecord = new Member();
    $newRecord->fill($data);
    $newRecord->save();
    return redirect()->route('admin.members.show', ['member' => $newRecord->id]);
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


}
