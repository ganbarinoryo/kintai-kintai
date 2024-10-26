<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BreakTime;
use App\Models\Clock;
use Carbon\Carbon;
use Auth;

class BreakTimeController extends Controller
{
    // 休憩開始
    public function start(Request $request)
    {
        $clockId = $request->input('clock_id');
        BreakTime::create([
            'clock_id' => $clockId,
            'break_in' => Carbon::now()->format('H:i:s'),
        ]);

        return redirect()->back()->with('status', '休憩を開始しました。');
    }

    // 休憩終了
    public function end(Request $request)
    {
        $clockId = $request->input('clock_id');
        $breakTime = BreakTime::where('clock_id', $clockId)
                            ->whereNull('break_out')
                            ->first();

        if ($breakTime) {
            $breakTime->update(['break_out' => Carbon::now()->format('H:i:s')]);
        }

        return redirect()->back()->with('status', '休憩を終了しました。');
    }
}
