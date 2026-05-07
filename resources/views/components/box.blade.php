<div {{ $attributes->merge(['class' => 'ibox shadow-sm rounded']) }}>
    <div class="ibox-title d-flex align-items-center justify-content-between border-bottom pb-2">
        {{ $title }}
    </div>
    <div class="ibox-content py-3">
        {{ $content }}
    </div>
    <div class="ibox-footer d-flex align-items-center justify-content-end border-top pt-2">
        {{ $footer }}
    </div>
</div>
