 <?php  
try {
		
		$conn = new PDO("mysql:host=localhost;dbname=foto_radnja", 'root', '');

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$result = $conn->query("SELECT tip_proslave, COUNT(tip_proslave)  as number FROM user GROUP BY tip_proslave");

		$rows = array();
		$table = array();
		$table['cols'] = array(

        array('label' => 'Tip Proslave', 'type' => 'string'),
        array('label' => 'Broj proslava', 'type' => 'number')

    );
 
        foreach($result as $r) {

          $temp = array();

          $temp[] = array('v' => (string) $r['tip_proslave']); 


          $temp[] = array('v' => (int) $r['number']); 
          $rows[] = array('c' => $temp);
        }

    $table['rows'] = $rows;
    
    $jsonTable = json_encode($table);
 
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
 ?>  
 <!DOCTYPE html>  
 <html>  
	
    <head>  
		<meta charset="utf8">
           <title>Grafički prikaz</title>  
		   <style>
		      body{
				background-color: #e6faff;  
			  }
			  .pita {
				  width: 900px;
				  border: 3px groove navy;
				  background-color: #1ad1ff;
				  margin: 1% 2% 0 20%;
			  }
			  #piechart {
				 width: 900px; height: 500px; 
				 
			  }
			  a{margin: 0 25% 0 25%;font-size:16pt;
			text-decoration:none; color: blue;}
		   </style>
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
			google.charts.load('current', {'packages':['corechart']});  
			google.charts.setOnLoadCallback(drawChart);  
			function drawChart()  
			{<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
			<script type="text/javascript">

			// Load the Visualization API and the piechart package.
			google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
			google.setOnLoadCallback(drawChart);

			function drawChart() {

          // Create our data table out of JSON data loaded from server.
			var data = new google.visualization.DataTable(<?=$jsonTable?>);
			var options = {
				title: 'Procenat odredjene kategorije-tipa proslave',
				is3D: 'true',
				width: 900,
				
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        } 
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="pita">  
                <h2 align="center">PIE CHART</h2>  
                <br />  
                <div id="piechart"></div>  
           </div>  
		   <a href="../ulogovan.htm">&#10148;Korak unazad~admin panel</a><br>
		   <a href="../../">&#10148;Povratak na Početnu</a>
      </body>  
 </html>  