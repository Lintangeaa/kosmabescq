<div class="mb-4">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">
        {{ ucfirst($name) }}:
    </label>

    @if($type === 'select')
    <select
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $required ? 'required' : '' }}
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        @foreach($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}" {{ old($name) == $optionValue ? 'selected' : '' }}>
            {{ $optionLabel }}
        </option>
        @endforeach
    </select>
    @elseif($type === 'file')
    <div id="{{ $id }}-container">
        <input
            type="file"
            name="{{ $name }}[]"
            id="{{ $id }}-0"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <button
        id="{{ $id }}-add"
        type="button"
        class="mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        Add More Images
    </button>
    @else
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let index = 1;

        document.getElementById('{{ $id }}-add').addEventListener('click', function() {
            const container = document.getElementById('{{ $id }}-container');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = '{{ $name }}[]';
            input.id = '{{ $id }}-' + index;
            input.className = 'mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm';

            container.appendChild(input);
            index++;
        });
    });
</script>