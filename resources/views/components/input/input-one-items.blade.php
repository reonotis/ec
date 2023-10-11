{{-- デフォルト値の設定 --}}
@props([
    'required' => false,
    'label' => null,
    'options' => [],
    'min' => 0,
    'step' => 1,
])

<div class="form-label-area">
    <label for="{{ $form_name }}">{{ $label_name }}</label>
    @if($required)
        <span class="form-required">※必須</span>
    @endif
</div>

<div class="form-input-area">
    @switch($type)
        @case('textarea')
            @component('components.input-type-textarea',
                [
                    'name' => $form_name,
                    'id' => $id,
                    'value' => $value,
                ])
            @endcomponent
            @break
        @case('number')
            @component('components.input-type-number',
                [
                    'name' => $form_name,
                    'id' => $id,
                    'value' => $value,
                    'min' => $min,
                    'step' => $step,
                ])
            @endcomponent
            @break
        @case('select')
            @component('components.input-type-select',
                [
                    'name' => $form_name,
                    'id' => $id,
                    'value' => $value,
                    'options' => $options,
                    'step' => $step,
                ])
            @endcomponent
            @break
        @default
            @component('components.input.input-type-text',
                [
                    'type' => $type,
                    'name' => $form_name,
                    'id' => $id,
                    'value' => $value,
                    'required' => $required,
                ])
            @endcomponent
            @break
    @endswitch

    @if($errors->get($form_name))
        <div class="">
            @component('components.input-error',
                [
                    'messages' => $errors->get($form_name),
                    'class' => 'mt-2',
                ])
            @endcomponent
        </div>
    @endif
</div>




