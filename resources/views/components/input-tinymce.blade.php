@props(['name', 'label' => null, 'value' => null, 'required' => false, 'messages' => null])

<div class="mb-4">
    <!-- Label -->
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif

    <!-- Textarea -->
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
    >{{ old($name, $value) }}</textarea>

    <!-- TinyMCE Initialization Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#{{ $name }}', 
                license_key: 'gpl',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
                toolbar: 'blocks | bold italic underline | alignleft aligncenter alignjustify | numlist bullist | forecolor backcolor removeformat | pagebreak | insertfile image media template link | code',
                valid_elements: '*[*]'
            });
        });
    </script>

    <!-- Validation Messages -->
    @if($messages)
        <ul class="text-sm text-red-600 space-y-1 mt-1">
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
</div>
