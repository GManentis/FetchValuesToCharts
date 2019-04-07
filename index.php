<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="jquery-3.3.1.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.min.css">
<script type="text/javascript" src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="ajax/stocks.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body>
<center>
<div class="container">
<h3 style="color:red;">
Stock Price
</h3>
<br>
<hr>
<br>
</div>
<div class="container">
<span style="float:left;"><br><br><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">+New StockPrice</button><br><br><br><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Check StockPrice</button></span>
<span id="mySpan" style="width:800px; height: 500px;float:right;"></span>
</div>
<!--Modal Part-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button id="end" type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:red;">Add a new StockPrice</h3>
        </div>
        <div class="modal-body">
			<center>
            <table>
			<tr><td>Stockprice:</td><td><input type="text" id="stockprice" class="form-control" style="width:200px;"></td></tr>
			<tr><td>Date:</td><td><input type="text" id="date" class="form-control" style="width:200px;"></td></tr>
			</table>
			<br>
			</center>
		</div>
		<div class="modal-footer"><centeR><button class="btn btn-primary" id="submit">Submit Stockprice!</button></center></div>	
      </div>
      </div>	  
</div>
<!--modal end-->
<!--Modal Part-->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button id="end2" type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:red;">Check StockPrice</h3>
        </div>
        <div class="modal-body">
			<center>
            <table>
			<tr><td>From:</td><td><input type="text" id="from" class="form-control" style="width:200px;"></td></tr>
			<tr><td>To:</td><td><input type="text" id="to" class="form-control" style="width:200px;"></td></tr>
			</table>
			<br>
			</center>
		</div>
		<div class="modal-footer"><centeR><button class="btn btn-primary" id="fetch">Fetch!</button></center></div>
      </div>
      </div>	  
</div>
<!--modal end-->
<div id="result" style="color:red;"></div>		  
</center>

</body>
</html>