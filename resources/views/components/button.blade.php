<button type="{{ $type }}" style="border-radius: 5px;padding: 7px 12px;background-color: #7339FF; margin-top:10px; color: #FFF" {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
    {{ $slot }}
</button>
