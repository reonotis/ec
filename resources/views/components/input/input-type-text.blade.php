@props([
    'type' => 'text',
    'name' => null,
    'id' => null,
    'value' => null,
    'required' => false,
    'class' => 'block w-full border-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
])
@php
    if($errors->get($name)){
        $class = 'input-error ' . $class;
    }
@endphp

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="{{ $class }}" value="{{ $value }}"
    @if($required)
        required
    @endif
>
