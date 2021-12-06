<?php
//①入力処理：値取得、カレンダーの配列準備
$line_array = explode(" ", fgets(STDIN));
$calendar_days_num = $line_array[0];
$schedule_num = $line_array[1];

$calendar_days = array();
$calendar_days = array_pad($calendar_days, $calendar_days_num, 0);//0は空いている日

//②予定ごとに空きを確認
// 予定分のループ
for($i=0 ; $i < $schedule_num ; $i++){
    $line_array = explode(" ", trim(fgets(STDIN)));
    $schedule_day_first = $line_array[0];
    $schedule_days_num = $line_array[1];
    $schedule_day_first -= 1;

    // 予定の日数分のループ、空き日の確認
    $empty_flg = true; //trueなら予定が空いている
    for($j = $schedule_day_first; $j < $schedule_day_first+$schedule_days_num; $j++){
        // カレンダーの範囲を超える日程か確認
        if($j >= $calendar_days_num){
            $empty_flg= false;
            break;
        }
        // 空きの確認
        if($calendar_days[$j] > 0){
            $empty_flg= false;
            break;
        }
    }

    //③予定が空いていたらカレンダーを埋める処理
    if($empty_flg == true){
        //予定の日数分のループ
        for($j = $schedule_day_first; $j < $schedule_day_first+$schedule_days_num; $j++){
            // カレンダーを埋める処理
            $calendar_days[$j]=1;
        }
    }
}

//④出力処理：埋まっている日の数を出力
// print_r($calendar_days);
$count = 0;
for($i = 0; $i < $calendar_days_num; $i++){
    if($calendar_days[$i] > 0){
        $count++;
    }
}
echo $count . "\n";
?>