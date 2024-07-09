@php
    $uuid = Str::uuid();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div 
        x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
        x-init="
            if (window.states) {
                window.states['{{ $uuid }}'] = state;
            }

            window.addEventListener('vue-state-change.{{ $uuid }}', (e) => {
                state = e.state;
            });
        "
    >
        <div    wire:ignore 
                data-vue="{{ $getComponentName() }}" 
                uuid="{{ $uuid }}" 
                :state="state"
                @foreach($getOptions() as $key => $value)
                    {{ $key }}="{{ $value }}"
                @endforeach
        ></div>
    </div>
</x-dynamic-component>