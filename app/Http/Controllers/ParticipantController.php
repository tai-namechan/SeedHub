<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Meeting;
use App\Participant;
use Auth;

class ParticipantController extends Controller
{
    //
    public function store(Request $request)
    {
        $participant = new Participant;
        $login_user_id = Auth::id();
        $participant->user_id = $login_user_id;
        $participant->meeting_id = $request->id;
        // dd($participant);
        $participant->save();
        return redirect('posts/index');
    }
}
