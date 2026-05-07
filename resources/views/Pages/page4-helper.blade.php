@extends('layout.app')

@section('content')

<x-page-header pagetitle="Built In and Custom Helpers" class="bg-info" />
<div class ="warpper wrapper-content">
    <div class="">
        @php
            $salary = 100000.78;
        @endphp
        <p>{{Number::format($salary,2)}}</p>
        <p>{{Number::format($salary,precision:2)}}</p>
        <p>{{Number::format($salary,maxPrecision:2)}}</p>
        <p>{{Number::ordinal(2)}}</p>
        <p>{{Number::percentage(2)}}</p>
        <p>{{Number::spell(200567.67)}}</p>
        <p>{{Number::abbreviate(200567.67)}}</p>
        <p>{{Str::upper('norene')}}</p>
        <p>{{Str::lower('Norene')}}</p>
@php
    $firstname = "narene";
    $lastname = "nagares";
    $middlename ="santos";
    $suffix = "jr";
@endphp
<p>Full name: {{format_fullname($firstname,$lastname) }} </p>
<p>Full name: {{format_fullnameV2($firstname,$middlename,$lastname,$suffix,0,1) }} </p>
<p>Full name: {{format_fullnameV2($firstname,$middlename,$lastname,$suffix,1,0) }} </p>
<p>Full name: {{format_fullnameV2($firstname,$middlename,$lastname,$suffix,0,0) }} </p>
<p>Full name: {{format_fullnameV2($firstname,$middlename,$lastname,$suffix,1,1) }} </p>

@php
    $d = "2026-05-05";
@endphp

<p> Format 1: {{ format_report_date($d,1) }}</p>

<p> Format 2: {{ format_report_date($d,2) }}</p>

<p> Format 3: {{ format_report_date($d,3) }}</p>

<p> Format 4: {{ format_report_date($d,4) }}</p>


@php
    $grade = 91;
@endphp

<div class="widget  text-center blue-bg" >
    <div class="m-b-md">
        <h1 class="m-xs">Your grade is : {{ $grade}} Remarks: {{ gradeRemarks($grade) }}
        </h1>

    </div>
</div>
@php
date_default_timezone_set('Asia/Manila');
$time = date("H:i:s");
@endphp
<div class="widget  text-center blue-bg" >
    <div class="m-b-md">
        <h1 class="m-xs">Time is: {{ $time}} Greet: {{ greet($time) }}
        </h1>

    </div>
</div>

    </div>
</div>
@endsection
