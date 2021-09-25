	<!DOCTYPE html>
	<!--start of html-->
	<html>

	<!--start of head-->

	<head>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<!--end of head-->

	<!--start of body-->

	<body>		
		<!--start of division class 1-->
		<div class="col-lg-12">									
						<center>
							<br />
							<!--title-->
							<h3><b>Active Project</b></h3><br />
							<?php
							//variable declaration
							$count = 1;	
							$spent = 0;
							$budgetAmount = 100;
if($count != 0){
								//the percentage of the spending amount compare to the budget amount
								$percent = $spent / $budgetAmount * 100;

								if ($percent > 100) {
									$percent = 100;
								}

								//notified the user if they are having an issue on budget spending
								if ($percent <= 50) {
									$color = "success";
								} else if ($percent <= 80) {
									$color = "warning";
								} else {
									$color = "danger";
								}

								//table alignment and settings
								if ($count == 0) {
									echo "<table width='90%'>";
								}
								//display the data
								echo "<tr>";
								echo "<td style='width: 5%;'></td>";
								echo "<td style='vertical-align: middle; width: 60%;'>";
								echo "<div class='progress' style='vertical-align: middle; height: 21px; width: 100%;'>";
								echo "<div class='progress-bar progress-bar-$color' role='progressbar' aria-valuenow='$percent' aria-valuemin='0' aria-valuemax='100' style='width:$percent%'></div>";
								echo "</div>";
								echo "</td>";
								echo "</tr>";

								$count++;
}else if ($count == 0) { //if there is no data in the table
								//display message
								echo "<p>No images are active right now</p>";
							} else {
								//close the table tag
								echo "</table>";
							}
							?>
							<br /><br />
						</center>

						
		</div>
		<!--end of division class 1-->		
	</body>
	<!--end of body-->

	</html>
	<!--end of html-->


