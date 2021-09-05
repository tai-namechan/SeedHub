<?php
namespace App\Kusa;

/**
* 余白を出力するためのクラス
*/
class KusaWeekBlankDay extends KusaWeekDay {

    function getClassName(){
		return "day-blank";
	}

	/**
	 * @return 
	 */
	function render(){
		return '';
	}

} 
