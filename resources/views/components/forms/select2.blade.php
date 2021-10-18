@push('vendor-style')
    @once
        <!-- vendor css files -->
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    @endonce
@endpush

{{-- <input type="hidden" name="{{ $name }}_id" value="{{ $last->$name.'_id' }}"> --}}

<div class="form-group col-6">
    <label class="form-label" for="basic-icon-default-fullname">{{ $name }}</label>
    <select class="select2-data-ajax-{{ $name }} form-control" data-url="{{ route('test.list_select') }}"
        id="select2-data-ajax-{{ $name }}" name="{{ $name }}_id" id="">
    </select>

    @error('{{ $name }}_id')
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
            var selectAjax{{ $name }} = $('.select2-data-ajax-{{ $name }}'),
                selectInModal = $('.select2InModal');

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
                placeholder: 'Search for a client',
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
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
