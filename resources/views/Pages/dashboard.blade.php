@extends('layout.app')

@section('content')

<x-page-header pagetitle="Dashboard" class="bg-info" />
    <div class="wrapper wrapper-content">
        <div class="animated fadeInRight">
            <div class = "row">
            <div class="col-4">
                    <x-widget class="red-bg" icon="fa-bell">
                        <x-slot name="value">56</x-slot>
                        <x-slot name="title">Notification</x-slot>
                        <x-slot name="subtitle">We detect the error</x-slot>
                    </x-widget>
                    </div>
                    <div class="col-4">
                    <x-widget class="blue-bg" icon="fa-thumbs-up">
                        <x-slot name="value">520</x-slot>
                        <x-slot name="title">Likes</x-slot>
                        <x-slot name="subtitle">amount</x-slot>
                    </x-widget>
                    </div>
                    <div class="col-4">
                    <x-widget class="yellow-bg" icon="fa-warning">
                        <x-slot name="value">Alarm</x-slot>
                        <x-slot name="title">Do</x-slot>
                        <x-slot name="subtitle">something</x-slot>
                    </x-widget>
                    </div>

<div class="col-4">
    <x-box class="white-bg">
        <x-slot name="title"><h5> Banana</h5>
        <small> 2025</small></x-slot>
        <x-slot name="content"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            At tenetur laudantium provident ipsam modi maxime illo quia molestia
            s similique, maiores blanditiis saepe aut eveniet dolorem
            dolor nesciunt dolores nam distinctio.</p></x-slot>
        <x-slot name="footer"><button type="button" class="btn btn-primary"> Send  </button></x-slot>
    </x-box>
</div>
<div class="col-4">
    <x-box class="white-bg">
        <x-slot name="title"><h5> Banana</h5>
        <small> 2025</small></x-slot>
        <x-slot name="content"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            At tenetur laudantium provident ipsam modi maxime illo quia molestia
            s similique, maiores blanditiis saepe aut eveniet dolorem
            dolor nesciunt dolores nam distinctio.</p></x-slot>
        <x-slot name="footer"><button type="button" class="btn btn-primary"> Send  </button></x-slot>
    </x-box>
</div>
<div class="col-4">
    <x-box class="white-bg">
        <x-slot name="title"><h5> Banana</h5>
        <small> 2025</small></x-slot>
        <x-slot name="content"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            At tenetur laudantium provident ipsam modi maxime illo quia molestia
            s similique, maiores blanditiis saepe aut eveniet dolorem
            dolor nesciunt dolores nam distinctio.</p></x-slot>
        <x-slot name="footer"><button type="button" class="btn btn-primary"> Send  </button></x-slot>
    </x-box>
</div>




                    </div>
                    </div>
            </div>
        </div>
{{--
<div class ="ibox">
    <div classs ="ibox-title">

    </div>
    <div classs ="ibox-content">
        {{$content }}
    </div>
    <div classs ="ibox-footer">
        {{$footer }}
    </div>

</div> --}}



@endsection
