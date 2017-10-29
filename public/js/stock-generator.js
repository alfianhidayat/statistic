function initStock(rootUrl, datas, container, title){
  //type : enum('node','blade') -> exam : node, or blade,BC0
  var series = [];
  var counter = 0;
  $.each(datas, function(i, data){
    $.getJSON(rootUrl+"?"+data.url, function(o){
      series[i] = {
        name : data.title,
        data : (typeof o.data != "undefined") ? o.data : o,
        marker: {
          enabled: false,
          symbol: "circle"
        }
      }
      counter++;
      if(counter === datas.length){
        generateStock(series);
      }
    })
  });

  function generateStock(seriesObj){
    Highcharts.stockChart(container, {
        rangeSelector: false,

        title: {
            text: title
        },
        credits: {
          enabled: false
        },
        legend: {
            enabled: true,
            align: 'right',
            backgroundColor: '#FCFFC5',
            borderColor: 'black',
            borderWidth: 2,
            layout: 'vertical',
            verticalAlign: 'top',
            y: 100,
            shadow: true
        },
        yAxis: {
          opposite: false,
          title: {
            text: "Success Rate (%)"
          }
        },
        xAxis: {
          title: {
            text: "Time"
          }
        },
        navigator : false,
        scrollbar: false,
        tooltip: {
          crosshairs: true,
        },
        series: seriesObj
    });
  }
}
