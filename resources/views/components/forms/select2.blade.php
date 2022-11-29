@push('vendor-style')
    @once
        <!-- vendor css files -->
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    @endonce
@endpush


@php
    $lastValue = null;

    $dataname = $dataname ?? $name;
    $dataobject = $dataobject ?? $name;
    $datavalue = $datavalue ?? $name;

    if (isset($last?->$dataname)) {
        $lastValue = $last?->$dataname;
    }

    $selectedText = ( $last?->$dataobject?->$dataname ?? null );
    $selecredValue = ( $last?->$dataobject?->$datavalue ?? null );
@endphp

<div class="form-group {{ $cols }}">
    <label class="form-label" for="basic-icon-default-fullname">{{ $label ?? $name }}</label>
    <select
        {{ $attributes->merge(['class' => "select2-data-ajax-". $name ." form-control" ]) }}
        data-url="{{ route($name.'.list_select') }}"
        id="select2-data-ajax-{{ $name }}"
        name="{{ $htmlname ?? $name }}"
        data-selected="{{ $selectedText ?? $lastValue }}"
    >
        <option value="{{ $selecredValue ?? $lastValue }}" selected="selected">initSelection</option>
    </select>

    @error( $name )
        <div class="invalid-feedback" style="display:BLOCK">
            {{ $message }}
        </div>
    @enderror
</div>

@push('vendor-script')
    @once
        <!-- vendor files -->
        <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    @endonce
@endpush

@push('page-script')
    <script>
        (function(window, document, $) {
            'use strict';

            console.log("Js of select2 : {{ $name }}")
            var selectAjax{{ $name }} = $('.select2-data-ajax-{{ $name }}');

            selectAjax{{ $name }}.wrap('<div class="position-relative"></div>').select2({
                dropdownAutoWidth: true,
                dropdownParent: selectAjax{{ $name }}.parent(),
                width: '100%',
                ajax: {
                    url: selectAjax{{ $name }}.data('url'),
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.item,
                            pagination: {
                                more: params.page * 30 < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Search for a {{ $name }}',
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
                initSelection: function (element, callback) {
                    callback($.map(element.val().split(','), function (id) {
                        var selected = $(element).data('selected');
                        return { id: selected};
                    }));
                },
                minimumInputLength: 1,
                templateResult: format{{ $name }},
                templateSelection: formatSelection{{ $name }}
            });

            function format{{ $name }}(repo) {
                if (repo.loading) return repo.name;
                return '<option value="' + repo.id + '">' + repo.name + '</option>'
            }

            function formatSelection{{ $name }}(repo) {
                return repo.name || repo.id;
            }
        })(window, document, jQuery);

    </script>
@endpush
