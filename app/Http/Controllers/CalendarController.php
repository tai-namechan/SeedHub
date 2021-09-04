<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use App\Meeting;

class CalendarController extends Controller
{
  public function show(){

		$calendar = new CalendarView(time());

		return view('posts.calendar', [
			"calendar" => $calendar,
		]);
	}

	public function contributios()
	{
		$calendar = new CalendarView(time());

		return view('users.mypage', [
			"calendar" => $calendar,
		]);
	}
}
