<div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge suma">0</div>
                    <div><b>LEI</b></div>
                </div>
            </div>
        </div>
        <a href="{{route('transports.index')}}">
            <div class="panel-footer">
                <span class="pull-left">Venituri {{\Carbon\Carbon::now()->format('F')}}</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-credit-card fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{ $costInfo['Total'] != 0 ? $costInfo['Total'] : 0  }}</div>
                    <div><b>LEI</b></div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">Cheltuieli {{\Carbon\Carbon::now()->format('F')}}</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-road fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{is_null($transportsInfo->km) ? 0 : $transportsInfo->km }}</div>
                    <div><b>KM</b></div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">Km parcursi {{\Carbon\Carbon::now()->format('F')}}</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-support fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">13</div>
                    <div>Support Tickets!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>