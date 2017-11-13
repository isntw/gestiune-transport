
<div class="panel-body">
    <div class="dataTable_wrapper table-responsive">
        <table class="table table-striped table-bordered table-hover" id="transporturi">
            <thead>
                <tr>                 
                    <th>Nr. Intrare</th>
                    <th>Tip Cheltuiala</th>
                    <th>Data</th>
                    <th>Detalii</th>
                    <th>Suma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($costs as $cost)
                <tr class="odd gradeX">
                    <td>{{$cost->id}}</td>
                    <td>{{$cost->costCategory->name}}</td>
                    <td>{{Carbon\Carbon::parse($cost->pay_date)->format('d-m-Y')}}</td>
                    <td>{{$cost->detalii}}</td>
                    <td>{{$cost->suma}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>