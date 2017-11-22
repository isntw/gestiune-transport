@extends('layouts.app')

@section('content')
<div class="panel-body">
    {!! Form::open(['url' => route('raports.show'), 'method'=> 'get']) !!}
    {!! csrf_field() !!}
    <div class="form-group">
        <label>Selecteaza Categoria</label>
        <div class="radio">
            <label>
                <input type="radio" name="radio" id="optionsRadios1" value="transports" checked="">Transporturi
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="radio" id="optionsRadios2" value="costs">Cheltuieli
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Selecteaza Data/Perioada</label>
        <input type="text" class="form-control" name='daterange' value="" />
        {!! Form::hidden('start_date') !!}
        {!! Form::hidden('end_date') !!}

    </div>

    <div class="form-group">
        <input type="checkbox" name="check"> <label id="category">Selecteaza Firma</label> 
        <label class="is_payed"> <input type="checkbox" name='is_payed'> Platite</label>
        <select disabled class="form-control" id="options" name='value'></select>
    </div>
    {!! Form::submit('Genereaza',['class'=>'btn btn-primary'])!!}

    {{ Form::close() }}

</div>


@endsection
@push('scripts')
<script>
    function change(option) {
        $.ajax({
            url: "{{route('raport.option')}}",
            data: {option: option},
            method: 'GET',
            success: function (data) {
                $('#options').empty();
                $.each(data.data, function (id, data) {
                    $('#options').append($('<option>').text(data.name).attr('value', data.id));
                });
            },
        });
    }

    $(document).ready(function () {
        $('input[name=start_date]').val(moment().format('DD-MM-YYYY'));
        $('input[name=end_date]').val(moment().subtract(7, 'days').format('DD-MM-YYYY'));

        $('input[name=daterange]').daterangepicker({
            startDate: moment().subtract(7, 'days'),
            endDate: moment(),
            ranges: {
                'Ultima Saptamana': [moment().subtract(6, 'days'), moment()],
                'Ultima 30 zile': [moment().subtract(29, 'days'), moment()],
                'Luna Asta': [moment().startOf('month'), moment().endOf('month')],
                'Luna Trecuta': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale: {
                customRangeLabel: 'Selecteaza Periada',
            },
            "linkedCalendars": false,
            "alwaysShowCalendars": true,
            "autoApply": true,
        }, function (start_date, end_date) {
            console.log(start_date.format('DD-MM-YYYY'));
            $('input[name=start_date]').val(start_date.format('DD-MM-YYYY'));
            $('input[name=end_date]').val(end_date.format('DD-MM-YYYY'));


        });

        change('transports');
        $('input[type=radio][name=radio]').change(function () {
            if (this.value == 'transports') {
                $("#category").text("Selecteaza Firma");
                $(".is_payed").show();

                change('transports');
            } else if (this.value == 'costs') {
                $("#category").text("Selecteaza Categorie");
                $(".is_payed").hide();

                change('costs');
            }
        });

        $("input[name=check]").click(function () {
            if ($(this).is(':checked')) {
                $("#options").prop('disabled', false);
            }
            if (!$(this).is(':checked')) {
                $("#options").prop('disabled', true);
            }
        });

        $("input[name=is_payed]").click(function () {
            if ($(this).is(':checked')) {
            }
            if (!$(this).is(':checked')) {
            }
        });
    });
</script>
@endpush