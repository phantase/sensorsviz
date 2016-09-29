var chart = circularHeatChart()
  .innerRadius(20)
  .range(["blue", "red"])
  .radialLabels(["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"])
  .segmentLabels(["Midnight", "1am", "2am", "3am", "4am", "5am", "6am", "7am", "8am", "9am", "10am",
  "11am", "Midday", "1pm", "2pm", "3pm", "4pm", "5pm", "6pm", "7pm", "8pm", "9pm", "10pm", "11pm"]);

/* Define an accessor function */
chart.accessor(function(d) {
  if( d.min != -999 )
    return d.average;
  return null;
});

d3.select('#circular')
  .selectAll('svg')
  .data([phpjsondata])
  .enter()
  .append('svg')
  .call(chart);

/* Add a mouseover event */
d3.selectAll("#circular path").on('mouseover', function() {
  var d = d3.select(this).data()[0];
  if( d.average !== null ){
    d3.select("#info").text('On ' + d.rounded_date + ' the value was ' + Math.ceil(d.average*10)/10 );
  } else {
    d3.select("#info").text('On ' + d.rounded_date + ' we don\'t have the value');
  }
});
d3.selectAll("#circular svg").on('mouseout', function() {
  d3.select("#info").text('Hover the graph to view the value.');
});
