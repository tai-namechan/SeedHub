<?php
namespace App\Kusa;

use Carbon\Carbon;
use App\Participant;
use Auth;

class KusaView {

	private $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}
	/**
	 * タイトル
	 */
	public function getTitle(){
		return $this->carbon->format('Y年n月');
	}
    /**
	 * カレンダーを出力する
	 */
	function render(){
		$html = [];
		$html[] = '<div class="calendar">';
		$html[] = '<table class="table">';
		$html[] = '<thead>';
		$html[] = '<tr>';
		$html[] = '<th>月</th>';
		$html[] = '<th>火</th>';
		$html[] = '<th>水</th>';
		$html[] = '<th>木</th>';
		$html[] = '<th>金</th>';
		$html[] = '<th>土</th>';
        $html[] = '<th>日</th>';
		$html[] = '</tr>';
		$html[] = '</thead>';

        $html[] = '<tbody>';

		$weeks = $this->getWeeks();
		foreach($weeks as $week){
			$html[] = '<tr class="'.$week->getClassName().'">';
            $days = $week->getDays();
			foreach($days as $day){
                $html[] = $this->renderDay($day);
            }
			$html[] = '</tr>';
		}

		$html[] = '</tbody>';

		$html[] = '</table>';
		$html[] = '</div>';
		return implode("", $html);
	}

    // 週の情報を取得
    protected function getWeeks(){
		$weeks = [];

		//初日
		$firstDay = $this->carbon->copy()->firstOfMonth();

		//月末まで
		$lastDay = $this->carbon->copy()->lastOfMonth();
        //1週目
		$week = new KusaWeek($firstDay->copy());
		$weeks[] = $week;

		//作業用の日
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

		//月末までループさせる
		while($tmpDay->lte($lastDay)){
			//週カレンダーViewを作成する
			$week = new KusaWeek($tmpDay, count($weeks));
			$weeks[] = $week;

            //次の週=+7日する
			$tmpDay->addDay(7);
		}

		return $weeks;
	}
       /**
	 * 日を描画する
	 */
	protected function renderDay(KusaWeekDay $day){
        $month = $this->carbon->format('n');

        $hoge=$day->render();
        // var_dump($day->render());
        $hoge = preg_replace('/[^0-9]/', '', $hoge);
        // var_dump($hoge);

        $login_user_id = Auth::id();
        // dd($login_user_id);
        $participants = Participant::where('user_id', $login_user_id)->whereMonth('created_at', date($month))->whereDay('created_at', $hoge)->get();
        // dd($participants);
        // dd($participants[0]->meeting_id);
        // foreach ($participants as $participant) {
        //     // dd($participant->meeting_id);
        //     $meeting_id = $participant->meeting_id;
        //     // dd($meeting_id);
        // }
        // $participantsDates = $participants->where();
        // $participants = Participant::where('meeting->id' == )->whereMonth('meeting->start_time', '=', date($month))->whereDay('meetings->start_time', $hoge)->get();
        

		$html = [];
		$html[] = '<td class="'.$day->getClassName().'">';
		$html[] = $day->render();
        foreach ($participants as $participant) {
            $html[] = "🌱";
            $html[] = "<br>";
        }
		$html[] = '</td>';
		return implode("", $html);
	}
} 
