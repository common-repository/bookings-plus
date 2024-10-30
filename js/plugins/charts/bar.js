jQuery(function () {
    var previousPoint;
 
    var d1 = [];
    for (var i = 0; i <= 30; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);
 
    var d2 = [];
    for (var i = 0; i <= 30; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);
 
    var d3 = [];
    for (var i = 0; i <= 30; i += 1)
        d3.push([i, parseInt(Math.random() * 30)]);

	 var d4 = [];
    for (var i = 0; i <= 30; i += 1)
        d4.push([i, parseInt(Math.random() * 30)]);        
 
    var ds = new Array();
 
     ds.push({
        data:d1,
        bars: {
            show: true, 
            barWidth: 0.1, 
            order: 1,
        }
    });
    ds.push({
        data:d2,
        bars: {
            show: true, 
            barWidth: 0.1, 
            order: 2
        }
    });
    ds.push({
        data:d3,
        bars: {
            show: true, 
            barWidth: 0.1, 
            order: 3
        }
    });
     ds.push({
        data:d4,
        bars: {
            show: true, 
            barWidth: 0.1, 
            order: 4
        }
    });
                
    //tooltip function
    function showTooltip(x, y, contents, areAbsoluteXY) {
        var rootElt = 'body';
	
        jQuery('<div id="tooltip4" class="chart-tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y - 35,
            left: x - 5,
			'z-index': '9999',
			'color': '#fff',
			'font-size': '11px',
            opacity: 0.9
        }).prependTo(rootElt).show();
    }
                
    //Display graph
      var plot = jQuery.plot(jQuery("#placeholder1"), ds, {
        grid:{ hoverable:true },
        
    },[ { data: d1, label: "Approval Pending"}, { data: d2, label: "Approved" },{ data: d3, label: "Disapproved" } ]);
         

 
//add tooltip event
jQuery("#placeholder1").bind("plothover", function (event, pos, item) {
    if (item) {
        if (previousPoint != item.datapoint) {
            previousPoint = item.datapoint;
 
            //delete de prГ©cГ©dente tooltip
            jQuery('.chart-tooltip').remove();
 
            var x = item.datapoint[0];
 
            //All the bars concerning a same x value must display a tooltip with this value and not the shifted value
            if(item.series.bars.order){
                for(var i=0; i < item.series.data.length; i++){
                    if(item.series.data[i][3] == item.datapoint[0])
                        x = item.series.data[i][0];
                }
            }
 
            var y = item.datapoint[1];
 
            showTooltip(item.pageX+5, item.pageY+5,x + " = " + y);
 
        }
    }
    else {
        jQuery('.chart-tooltip').remove();
        previousPoint = null;
    }
 
});
 
    
});