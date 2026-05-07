<div {{ $attributes->merge(['class' => 'widget  p-lg text-center']) }}>
    <div class="m-b-md">
        <i class="fa fa-bell fa-4x {{ $icon }}"></i>
        <h1 class="m-xs">{{$value}}
        </h1>
        <h3 class="font-bold no-margins">
            {{ $title }}
        </h3>
        <small>{{ $subtitle }}</small>
    </div>
</div>
