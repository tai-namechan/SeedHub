<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Meeting;

class CalendarView {

	private $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
        // dd($this->carbon);
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
        // dd($weeks);
		foreach($weeks as $week){
			$html[] = '<tr class="'.$week->getClassName().'">';
			$days = $week->getDays();
            // dd($days);
			foreach($days as $day){
                // var_dump($day->date->format('d'));
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
		$week = new CalendarWeek($firstDay->copy());
		$weeks[] = $week;

		//作業用の日
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

		//月末までループさせる
		while($tmpDay->lte($lastDay)){
			//週カレンダーViewを作成する
			$week = new CalendarWeek($tmpDay, count($weeks));
			$weeks[] = $week;

            //次の週=+7日する
			$tmpDay->addDay(7);
		}

		return $weeks;
	}

    /**
	 * 日を描画する
	 */
	protected function renderDay(CalendarWeekDay $day){
        // 当月の数字を取得
        $month = $this->carbon->format('n');
        // dd($month);

        $hoge=$day->render();
        $hoge = preg_replace('/[^0-9]/', '', $hoge);


        // 当月に該当するデータを取得
        $meetings = Meeting::whereMonth('start_time', '=', date($month))->whereDay('start_time', $hoge)->get();
				// dd($meetings);


		$html = [];
		$html[] = '<td class="'.$day->getClassName().'">';
		$html[] = $day->render();

        foreach ($meetings as $meeting) {
            $html[] = $meeting->name;
            $html[] = "<br>";
        }

		$html[] = '</td>';
		return implode("", $html);
	}
}
