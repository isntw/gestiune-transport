
<div class="panel-body">
    <div class="dataTable_wrapper table-responsive">
        <table class="table table-striped table-bordered table-hover" id="transporturi">
            <thead>
                <tr>                
                    <th>Stare</th>
                    <th>Firma</th>
                    <th>Adresa Plecare</th>
                    <th>Km</th>
                    <th>Data Plecare</th>
                    <th>Kg</th>
                    <th>Valoare</th>
                    <th>Actiuni</th>
                </tr>
<!--                <tr>                
                    <th>Total</th>
                </tr>-->
            </thead>
            <tbody>
                @foreach($transports as $transport)
                <tr class="odd gradeX">
                    @if($transport->is_payed)
                    <td class="text-center"><span class='label label-success'> Achitat</span></td>
                    @else
                    <td class="text-center"><span class='label label-danger'> Neachitat</span></td>
                    @endif
                    <td>{{$transport->company->name}}</td>
                    <td>{{$transport->adresa_plecare}}</td>
                    <td>{{$transport->km}}</td>
                    <td>{{Carbon\Carbon::parse($transport->data_plecare)->format('d-m-Y')}}</td>
                    <td>{{$transport->kg}}</td>
                    <td>{{$transport->suma}}</td>
                    <td class="text-right">
                        {!! \Html::viewButton('transports.show', $transport->id) !!}
                        {!! \Html::editButton('transports.edit', $transport->id) !!}
                        {!! \Html::deleteButton('transports.destroy', $transport->id) !!}
                    </td>

                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total:</th> 
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>