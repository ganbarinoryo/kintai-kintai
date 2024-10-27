<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clock;
use Illuminate\Support\Facades\Auth;

class ClockController extends Controller
{
    // 勤務開始時の打刻
    public function clockIn()
    {
        Clock::create([
            'user_id' => Auth::id(),
            'clock_in' => now()->format('H:i:s'),
            'is_active' => true, // 勤務開始時にアクティブにする
        ]);

        return redirect()->back()->with('message', '勤務開始を打刻しました。');
    }

    // 勤務終了時の打刻
    public function clockOut()
    {
        $clock = Clock::where('user_id', Auth::id())
                    ->whereNull('clock_out')
                    ->first();

        if ($clock) {
            $clock->update([
                'clock_out' => now()->format('H:i:s'),
                'is_active' => false, // 勤務終了時に非アクティブにする
            ]);

            return redirect()->back()->with('message', '勤務終了を打刻しました。');
        }

        return redirect()->back()->with('error', '勤務開始の打刻がありません。');
    }

    // 打刻ページを表示する
    public function showStampPage()
    {
        $currentClock = Clock::where('user_id', Auth::id())
                             ->whereNull('clock_out')
                             ->first();
        
         // 勤務データがなくてもビューが正常に表示されるようにする
        return view('stamp', ['currentClock' => $currentClock ?? new Clock()]);
    }
}
