@php
    $precision = $precision ?? '2';
    $currency = $currency ?? '$';
    $decimalSeparator = $decimalSeparator ?? '.';
    $thousandSeparator = $thousandSeparator ?? '';
@endphp

<a17-twill-numeric-input
    label="{{ $label }}"
    :precision="{{ $precision }}"
    currency="{{ $currency }}"
    decimal-separator="{{ $decimalSeparator }}"
    thousand-separator="{{ $thousandSeparator }}"
    @include('twill::partials.form.utils._field_name')
    in-store="value"
></a17-twill-numeric-input>

@unless($renderForBlocks || $renderForModal || (!isset($item->$name) && null == $formFieldsValue = getFormFieldsValue($form_fields, $name)))
@push('vuexStore')
    window['{{ config('twill.js_namespace') }}'].STORE.form.fields.push({
        name: '{{ $name }}',
        value: {!! json_encode($item->$name ?? $formFieldsValue) !!}
    })
@endpush
@endunless
