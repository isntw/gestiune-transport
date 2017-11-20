
<div class="panel-body">
    <div class="dataTable_wrapper table-responsive">
        <table class="table table-striped table-bordered table-hover" id="transporturi">
            <thead>
                <tr>                
                    <th>Firma</th>
                    <th>Adresa Plecare</th>
                    <th>Km</th>
                    <th>Data Plecare</th>
                    <th>Kg</th>
                    <th>Valoare</th>
                    <th>Actiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transports as $transport)
                <tr class="odd gradeX">
                    <td>{{$transport->firma}}</td>
                    <td>{{$transport->adresa_plecare}}</td>
                    <td>{{$transport->km}}</td>
                    <td>{{Carbon\Carbon::parse($transport->data_plecare)->format('d-m-Y')}}</td>
                    <td>{{$transport->kg}}</td>
                    <td>{{$transport->suma}}</td>
                    <td class="text-right">
                        {!! \Html::editButton('transports.edit', $transport->id) !!}
                        {!! \Html::deleteButton('transports.destroy', $transport->id, null, 'asdas') !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>