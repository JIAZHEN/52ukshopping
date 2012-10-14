<script type="text/javascript">
$(document).ready(function() {
	var line1=[['2008-06-30 8:00AM',4], ['2008-7-30 8:00AM',6.5], ['2008-8-30 8:00AM',5.7], ['2008-9-30 8:00AM',9], ['2008-10-30 8:00AM',8.2]];
  var plot2 = $.jqplot('chartdiv', [line1], {
      title:'Customized Date Axis',
      gridPadding:{right:35},
      axes:{
        xaxis:{
          renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{formatString:'%b %#d, %y'},
          min:'May 30, 2008',
          tickInterval:'1 month'
        }
      },
      series:[{lineWidth:4, markerOptions:{style:'square'}}]
  });	
});
</script>