<select
    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
    @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}
>
    <option value="">Select Vaccine Center</option>
    @foreach ($centers as $center)
        <option value="{{ $center->id }}" {{ old('vaccine_center') == $center->id ? 'selected' : '' }}>
            {{ $center->name }} ({{ $center->phone }})
        </option>
    @endforeach
</select>
