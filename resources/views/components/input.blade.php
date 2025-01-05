@props(['disabled' => false, 'label' => null, 'messages' => null])

<div class="mb-4">
    @if($label)
        <label>{{ $label }}</label> 
    @endif

    <input
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
            'class' => 'mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm'
        ]) !!}
    />

    @if ($messages)
        <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 mt-1']) }}>
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
</div>
