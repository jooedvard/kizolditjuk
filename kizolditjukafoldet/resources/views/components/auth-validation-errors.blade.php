@props(['errors'])

@if ($errors->any())
    <div class="mt-3 text-center text-red-600" style="font-size: 1.2rem">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
@endif
