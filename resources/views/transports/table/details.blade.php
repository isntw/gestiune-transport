
<div class="panel-body">
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="transporturi">
            <thead>
                <tr>                 
                    <th>Firma</th>
                    <th>Adresa Plecare</th>
                    <th>Adresa Destinatie</th>
                    <th>Data Plecare</th>
                    <th>Data Destinatie</th>
                    <th>KM</th>
                    <th>Incasare</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transports as $transport)
                <tr class="odd gradeX">
                    <td>{{$transport->firma}}</td>
                    <td>{{$transport->adresa_plecare}}</td>
                    <td>{{$transport->adresa_destinatie}}</td>
                    <td>{{Carbon\Carbon::parse($transport->data_plecare)->format('d-m-Y')}}</td>
                    <td>{{Carbon\Carbon::parse($transport->data_destinatie)->format('d-m-Y')}}</td>
                    <td>{{$transport->km}}</td>
                    <td>{{$transport->incasare}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>