$(function () {
  $.ajax({
    url: "http://localhost/simpleweb/project1/pages/charts/chart_data.php",
    type: "GET",
    success: function (data) {
      chartData = data;
      var chartProperties = {
        caption: "Count of Books by Author",
        xAxisName: "Author Name",
        yAxisName: "Number of Books",
        rotatevalues: "0",
        showPercentInTooltip: "0",
        tooltipBorderRadius: "10",
        decimals: "2",
        theme: "fusion",
      };

      apiChart = new FusionCharts({
        // type: "pie2d",
        type: "column2d",
        // type: "column3d",
        renderAt: "chart-container",
        width: "1000",
        height: "500",
        dataFormat: "json",
        dataSource: {
          chart: chartProperties,
          data: chartData,
        },
      });
      apiChart.render();
    },
  });
});
