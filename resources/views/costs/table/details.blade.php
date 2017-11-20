
<div class="panel-body">
    <div class="dataTable_wrapper table-responsive">
        <table class="table table-striped table-bordered table-hover" id="transporturi">
            <thead>
                <tr>                 
                    <th>Tip Cheltuiala</th>
                    <th>Data</th>
                    <th>Detalii</th>
                    <th>Suma</th>
                    <th>Actiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($costs as $cost)
                <tr class="odd gradeX">
                    <td>{{$cost->costCategory->name}}</td>
                    <td>{{Carbon\Carbon::parse($cost->pay_date)->format('d-m-Y')}}</td>
                    <td>{{$cost->detalii}}</td>
                    <td>{{$cost->suma}}</td>
                    <td class="text-right">
                        {!! \Html::viewButton('costs.show', $cost->id) !!}
                        {!! \Html::editButton('costs.show', $cost->id) !!}
                        {!! \Html::deleteButton('costs.destroy', $cost->id) !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>