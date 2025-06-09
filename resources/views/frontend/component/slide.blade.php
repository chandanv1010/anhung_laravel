@php
    $slideKeyword = App\Enums\SlideEnum::MAIN;
@endphp
@if(count($slides[$slideKeyword]['item']))
<div class="panel-slide page-setup" data-setting="{{ json_encode($slides[$slideKeyword]['setting']) }}">
    <div class="video-item">
        {!! $system['homepage_video_youtube_pc'] !!}
    </div>
</div>
@endif
@foreach($slides[$slideKeyword]['item'] as $key => $val )
    @if(isset($val['description']) && strpos($val['description'], 'iframe') !== false)
    <div id="modal-{{ $key }}" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            {!! $val['description'] !!}
        </div>
    </div>
    @endif
@endforeach