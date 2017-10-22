@extends('../welcome')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">
        <!-- <form id="mscs-form"> -->
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kpi">KPI</label>
                <select class="form-control" onchange="TrigerKPI(this.value)" name="kpi" id="kpi">
                  <option>Select KPI</option>
		  <option value="trunk">Trunk Utilisation</option>
                  <option value="lusgs">Location Update, SGs-interface</option>
		  <option value="csfb">Paging for LTE to CS Fallback (CSFB), SGs-interface</option>
                  <option value="paging">Paging for SMS, SGs-interface</option>
                  <option value="location">Location Update</option>
                  <option value="map">MAP SRI Signalling</option>
                  <option value="mobilecall">Mobile IN Calls</option>
                  <option value="originating">Short Messages Service (SMS), Originating</option>
	          <option value="terminating">Short Messages Service (SMS), TERM</option>
   	          <option value="processor">Processor Load</option>
                  <option value="rab">RAB Assignment</option>
                  <option value="srvcc">SRVCC, Single Radio Voice Call Continuity (general)</option>
            	  <option value="wcdma">Paging, WCDMA</option>
		  <option value="intramschandover">Intra MSC SRNS Relocation - WCDMA</option>
		  <option value="signalling">Signaling Link Utilisation, ETSI</option>

                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="node">Node Name</label>
                <select class="form-control select2" multiple name="node" id="node">
                  <option>Select Node Name</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="type">Type Name</label>
                <select disabled class="form-control select2" multiple name="type" id="type">

                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="counter">Counter Type</label>
                <select class="form-control" disabled name="counter" onchange="changeCounter(this.value)" id="counter">
                  <option>Select Counter Type</option>
                  <option value="node">Node Level</option>
                  <option value="blade">Blade Level</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
		<label for="dateRange">Date Range</label>
		<div class="input-group">
                   <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                   </div>
                   <input type="text" id="dateRange" name="dateRange" class="form-control"/>
	        </div>  
              </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                  <button name="button" style="margin: 25px 0px 0" onclick="initChart()" class="btn btn-primary">
                    <i class="fa fa-gear"></i> Generate Statistics
                  </button>
                </div>
              </div>
	  </div>
        <!-- </form> -->
      </div>
    </div>
    <div class="box">
      <div class="box-body">
        <div id="cart-container" style="width: 100%;">
          <h3 class="text-center">Chart will appear here</h3>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<!-- 
 Additional html css data,
 daterange picker
-->
<link rel="stylesheet" href="{{ asset("/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css") }}">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

<script>

// $("#mscs-form").submit(
//   function(e){
//       e.preventDefault();
//       // var kpi = $("#kpi").val();
//       console.log(kpi);
//       var startDate = moment($("#dateRange").data('daterangepicker').startDate).format('YYYY-MM-DD h:mm:ss A');
//       var endDate = moment($("#dateRange").data('daterangepicker').endDate).format('YYYY-MM-DD h:mm:ss A');
//       initChart(kpi);
//   }
// );

var seriesOptions = [],
    seriesCounter = 0,
    names = ['PI_ETSI_SS7_UTIL_REC', 'PI_ETSI_SS7_UTIL_TRANS'];
/**
 * Create the chart when all data is loaded
 * @returns {undefined}
 */
function createChart() {
    Highcharts.stockChart('cart-container', {

        rangeSelector: {
            selected: 4
        },

        yAxis: {
            labels: {
                formatter: function () {
                    return (this.value > 0 ? ' + ' : '') + this.value + '%';
                }
            },
            plotLines: [{
                value: 0,
                width: 2,
                color: 'silver'
            }]
        },

        plotOptions: {
            series: {
                compare: 'percent',
                showInNavigator: true
            }
        },

        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
            valueDecimals: 2,
            split: true
        },

        series: seriesOptions
    });
}


function TrigerKPI(kpi){
  $.get("/api/"+kpi+"/node_name", function(data){
      var html = "";
      for(i = 0; i < data.length; i++){
        html += "<option value='"+data[i]+"'>"+data[i]+"</option>";
        console.log(html);
      }
      $("#node").html(html);
  });
}


function initChart(){
        var dataArr = [];
        dataArr.push($("#node").serializeArray());
        console.log(dataArr);
        // console.log(encodeURIComponent('alfian hidayat'));
        var kpi = $("#kpi").val();
        var urls = [];
        dataArr.forEach(function (items, index) {
          
        });
        // $.each(urls, function (i, url) {
        //   // var url = 'http://localhost:8000/api/'+kpi+'?counterType=node&nodeName='+data[0].value+'&typeName=3-9632-0&startDate=2017-10-03%2010:00:00&endDate=2017-10-03%2010:00:00&valueType='+name;
        //     console.log(url);
        //   // $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=' + name.toLowerCase() + '-c.json&callback=?',    function (data) {
        //     $.getJSON(url, function (data) {

        //       seriesOptions[i] = {
        //           name: name,
        //           data: data
        //       };

        //       // As we're loading the data asynchronously, we don't know what order it will arrive. So
        //       // we keep a counter and create the chart when all the data is loaded.
        //       seriesCounter += 1;

        //       if (seriesCounter === names.length) {
        //           createChart();
        //       }
        //   });
        // });
}
</script>
<!-- 
 Additional javascript template,
 daterange picker -->

<!-- date-range-picker -->
<!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
<!-- <script src="js/bootstrap-datepicker.js"></script> -->
<script src="{{ asset("/AdminLTE/bower_components/moment/min/moment.min.js") }}"></script>
<script src="{{ asset("/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js") }}"></script>

<script>
$(function () {
     //Date range picker with time picker	
     $('#dateRange').daterangepicker({timePicker: true, startDate: '2017/06/28', endDate: '2017/07/01', timePickerIncrement: 30,locale:{ format: 'YYYY/MM/DD hh:mm'}});
   });
</script>



