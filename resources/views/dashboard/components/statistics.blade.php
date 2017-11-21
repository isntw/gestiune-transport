
{!! \Html::statisticsDiv('suma', 'Venituri', route('transports.index'), 'LEI', 'fa-tasks', 'panel-green') !!}
{!! \Html::statisticsDiv('cheltuieli', 'Cheltuieli', route('costs.index'), 'LEI', 'fa-credit-card', 'panel-yellow') !!}
{!! \Html::statisticsDiv('km', 'KM', null, 'KM', 'fa-road', 'panel-primary') !!}
{!! \Html::statisticsDiv('payed', 'Transporturi Neachitate', null, 'TRANSPORTURI', 'fa-support', 'panel-red') !!}
