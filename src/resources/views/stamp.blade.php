@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
<link rel="stylesheet" href="{{ asset('css/common.css') }}" />
@endsection

@section('content')

<div class="stamp__content">
    <div class="stamp-form__heading">
        <h2>福場凛太郎さんお疲れ様です！</h2>
    </div>

<!--勤務-->
<div class="flex__form__group">
    <form class="form" action="{{ route('clock.in') }}" method="POST">
        @csrf
        <div class="form__group-content">
            <div class="form__clock-in-button">
                <button class="form__button-submit {{ $currentClock->is_active ? 'disabled' : '' }}" type="submit" {{ $currentClock->is_active ? 'disabled' : '' }}>
                    勤務開始
                </button>
            </div>
        </div>
    </form>

    <form class="form" action="{{ route('clock.out') }}" method="POST">
        @csrf
        <div class="form__group-content">
            <div class="form__clock-out-button">
                <button class="form__button-submit" type="submit" {{ !$currentClock->is_active ? 'disabled' : '' }}>
                    勤務終了
                </button>
            </div>
        </div>
    </form>
</div>


<!--休憩-->

<div class="flex__form__group">

    <form class="form" action="{{ route('break.start') }}" method="POST">
        @csrf
        <div class="form__group-content">
            <div class="form__break-in-button">
                <input type="hidden" name="clock_id" value="{{ $currentClock->id }}">
                <button class="form__button-submit" type="submit">休憩開始
            </button>
            </div>
        </div>
    </form>

    <form class="form" action="{{ route('break.end') }}" method="POST">
        @csrf
        <div class="form__group-content">
            <div class="form__break-out-button">
                <input type="hidden" name="clock_id" value="{{ $currentClock->id }}">
                <button class="form__button-submit" type="submit" >休憩終了
            </button>
            </div>
        </div>
    </form>
</div>

</div>
@endsection