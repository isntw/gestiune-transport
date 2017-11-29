
<div class="panel-body">
    <div class="dataTable_wrapper table-responsive">
        <table class="table table-striped table-bordered table-hover" id="transporturi">
            <thead>
                <tr>                 
                    <th>Firma</th>
                    <th>CUI</th>
                    <th>Detalii</th>
                    <th>Actiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr class="odd gradeX">
                    <td>{{$company->name}}</td>
                    <td>{{$company->cui}}</td>
                    <td>{{$company->note ? $company->note : '-'}}</td>
                    <td class="text-right">
                        @unless($company->trashed())
                        {!! \Html::editButton('companies.edit', $company->id) !!}
                        @endunless
                        {!! \Html::deleteButton('companies.destroy', $company->id, $company->trashed()) !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>