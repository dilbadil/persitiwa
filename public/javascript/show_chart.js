$(function () {
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //--------------
  //- AREA CHART -
  //--------------

  // Get context with jQuery - using jQuery's .get() method.
  // var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  // var areaChart = new Chart(areaChartCanvas);


// $(document).ready(function() {
  var data1 = [
      {
        label: "Penebangan Liar",
        fillColor: "#16a085",
        strokeColor: "#16a085",
        pointColor: "#16a085",
        pointStrokeColor: "#16a085",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "#16a085",
        data: [91, 70, 40, 88, 36, 10, 41]
      },
      {
        label: "Pembakaran Hutan dan Pembukaan Lahan",
        fillColor: "#c0392b",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [78, 18, 40, 29, 66, 57, 10]
      },
      {
        label: "Dukungan Masyrakat",
        fillColor: "#d35400",
        strokeColor: "#d35400",
        pointColor: "#d35400",
        pointStrokeColor: "#d35400",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "#d35400",
        data: [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label: "Dukungan Pemerintah",
        fillColor: "#3498db",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [21, 48, 49, 30, 40, 27, 60]
      },
      {
        label: "Penilaian Masyarakat Terhadap Pemerintah",
        fillColor: "#f39c12",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [58, 58, 50, 59, 66, 87, 90]
      }
    ];

  var areaChartData = {
    labels: ["Mei","Juni","Juli","Agustus","September", "Oktober", "November"],
    datasets: data1
  };

  //-------------
  //- BAR CHART -
  //-------------
  var barChartCanvas = $("#barChart").get(0).getContext("2d");


  var barChart = new Chart(barChartCanvas);
  var barChartData = areaChartData;
  barChartData.datasets[1].fillColor = "#00a65a";
  barChartData.datasets[1].strokeColor = "#00a65a";
  barChartData.datasets[1].pointColor = "#00a65a";
  var barChartOptions = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: true,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - If there is a stroke on each bar
    barShowStroke: true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth: 0,
    //Number - Spacing between each of the X value sets
    barValueSpacing: 10,
    //Number - Spacing between data sets within X values
    barDatasetSpacing: 3,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    //Boolean - whether to make the chart responsive
    responsive: true,
    maintainAspectRatio: true
  };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
// });
