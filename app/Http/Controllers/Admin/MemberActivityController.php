<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use App\MemberActivity;
use DateTime;
use DateInterval;
use Illuminate\Http\Request;

class MemberActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $activities = MemberActivity::all();
      return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($id)
    // {
    //   $member = Member::find($id);
    //   return view('admin.activities.create', compact('member'));
    // }

    public function new($id)
    {
      $member = Member::find($id);
      return view('admin.activities.new', compact('member'));
    }

    public function stock(Request $request, $id)
    {
      $valid_data = $request->validate([
        'membership_for_year' => ['regex:^([0-9]{4})^'],//TODO: ma sta cosa funziona davvero???
        'membership_start' => 'date: Y-m-d H:i:s',
      ]);

      $data = $request->all();
      $newActivity = new MemberActivity();
      $newActivity->fill($data);
      // dd($data['membership_start']); OK
      $membership_expiration_date = new DateTime($data['membership_start']);
      $membership_duration = new DateInterval('P6M');
      $membership_expiration_date->add($membership_duration);
      // dd($membership_expiration_date);
      $newActivity->membership_end = $membership_expiration_date;
      $newActivity->member_id = $id;
      $newActivity->save();
      // dd($newActivity->id);
      return redirect()->route('admin.activities.show', ['activity' => $newActivity->id]);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request, $id)
    // {
    //   $valid_data = $request->validate([
    //     'membership_for_year' => ['regex:^([0-9]{4}^'],//TODO: ma sta cosa funziona davvero???
    //   ]);

    //   $data = $request->all();
    //   $newActivity = new MemberActivity();
    //   $newActivity->fill($data);
    //   dd($data['membership_start']);
    //   $membership_expiration_date = new DateTime($data['membership_start']);
    //   $newActivity->save();
    //   return redirect()->route('admin.activities.show', ['activity' => $newActivity->id]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $activity = MemberActivity::find($id);
      // dd($activity); //OK
      $member = Member::where('id', $activity->member_id)->first();
      // dd($member); //OK
      return view('admin.activities.show', compact('activity', 'member'));
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
