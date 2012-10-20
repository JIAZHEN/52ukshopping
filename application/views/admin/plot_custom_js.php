<script type="text/javascript">
$(document).ready(function() {
	<?php if(sizeof($dailyOrders) != 0): ?>
	var line1 = new Array();
	<?php foreach($dailyOrders as $dailyOrder): ?>
		line1.push(<?php echo '["'.$dailyOrder['calendar_date'].'", '.$dailyOrder['orders'].']'; ?>);
	<?php endforeach; ?>
  var plot2 = $.jqplot('chartdiv', [line1], {
      title:'Customized Date Axis',
      gridPadding:{right:35},
      axes:{
        xaxis:{
          renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{formatString:'%b %#d, %y'},
          min:'<?php echo $dailyOrders[0]['calendar_date']; ?>',
          tickInterval:'1 week'
        }
      },
      series:[{lineWidth:4, markerOptions:{style:'square'}}]
  });
  <?php endif; ?>
});
</script>