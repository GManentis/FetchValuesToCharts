$(document).ready(function()
{
	$("#from").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#to").datepicker({ dateFormat: 'yy-mm-dd' });
	
	$("#date").datepicker({ dateFormat: 'yy-mm-dd' });
	
	$("#submit").click(function()
	{
		var stock = $("#stockprice").val();
		var date = $("#date").val();
		
		if(stock != "" && date !="" && !isNaN(stock))
		{
			$.ajax({
				type: "POST",
				url: "ajax/AddValue.php" ,
				data: {stock:stock,date:date},
				/*contentType: "application/json; charset=utf-8",*/
				/*dataType: "json",*/
				success: function(data)
				{
					$("#result").html(data);
					$("#stockprice").val("");
					$("#date").val("");
					$("#end").click();
					$("#mySpan").html("");
				}
				
			});
		}
		else
		{
			alert("Not valid input!");
		}
		
		
	});
	
	
	$("#fetch").click(function()
	{
		var before = $("#from").val();
		var after = $("#to").val();
		
		if( after != "" && before !="")
		{
				$.ajax({
					type: "POST",
					url: "ajax/GetValues.php" ,
					data: {before:before,after:after},
					/*contentType: "application/json; charset=utf-8",*/
					/*dataType: "json",*/
					success: function(data)
					{
						
						//$("#result").html("");
						var fetch = JSON.parse(data);
						var values = [];
						var dates = [];
						for( var i = 0 ; i < fetch.length ;i++)
						{
							z = parseFloat(fetch[i].stock);
							values.push(z);
							dates.push(fetch[i].dato);
						}
										
						Highcharts.chart('mySpan', 
						{

						  title: {
							text: 'Stock Value'
						  },

						  xAxis: { 
						  categories: dates
						  },

						  /*yAxis: {
							title : {text :'Our Stock'
						  },*/

						  /*tooltip: {
							headerFormat: '<b>{series.name}</b><br />',
							pointFormat: 'x = {point.x}, y = {point.y}'
						  },*/

						  series: 
						  [{
							name : 'Our Stock',
							data: values
						  }]
						});
						$("#end2").click();
						$("#result").html("");
					}
				});
				}
				else
				{
					alert("Please enter your dates!");
				}
	});
	
});