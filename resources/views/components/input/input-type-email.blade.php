@props([
    'name' => null,
    'id' => null,
    'value' => null,
    'class' => 'block w-full border-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
])
@php
    if($errors->get($name)){
        $class = 'input-error ' . $class;
    }
@endphp

<input type="email" name="{{ $name }}" id="{{ $id }}" class="{{ $class }}" value="{{ $value }}">
