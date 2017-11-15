
<div class="panel-body">
    <div class="dataTable_wrapper table-responsive">
        <table class="table table-striped table-bordered table-hover" id="transporturi">
            <thead>
                <tr>                
                    <th>#</th>
                    <th>Firma</th>
                    <th>Adresa Plecare</th>
                    <th>Adresa Destinatie</th>
                    <th>Km</th>
                    <th>Dis. Km</th>
                    <th>Data Plecare</th>
                    <th>Durata</th>
                    <th>Kg</th>
                    <th>Valoare</th>
                    <th>Actiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transports as $transport)
                <tr class="odd gradeX">
                    <td>{{$transport->id}}</td>
                    <td>{{$transport->firma}}</td>
                    <td>{{$transport->adresa_plecare}}</td>
                    <td>{{$transport->adresa_destinatie}}</td>
                    <td>{{$transport->km}}</td>
                    <td>{{$transport->dislocare_km}}</td>
                    <td>{{Carbon\Carbon::parse($transport->data_plecare)->format('d-m-Y')}}</td>
                    <td>{{$transport->timp}}</td>
                    <td>{{$transport->kg}}</td>
                    <td>{{$transport->suma}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>