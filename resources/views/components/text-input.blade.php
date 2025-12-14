@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'border-gray-700 bg-neutral-800 text-white placeholder-gray-400 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm'
    ]) }} 
/>