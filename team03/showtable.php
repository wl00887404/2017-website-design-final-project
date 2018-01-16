<?php

include("Announcement.php");
// $res = mysqli_query($conn, "SELECT * FROM ???");//?

$q = $_POST['parkname'];
// $q = intval($_GET['q']);
$sql="SELECT * FROM ticket WHERE AP_name = '$q'";
$res = mysqli_query($conn,$sql);
showtable($res);
mysqli_close($conn);

function showtable($res){ 
	//table tags 
	echo "
	<div class=\"container\" id=\"tableshow\">
		<section class=\"tableform\">
			<ul class=\"actions thh\">
				<!-- <tr> -->
					<li><div class=\"Default\">Name</div></li>
					<li><div class=\"Default\">Description</div></li>
					<li><div class=\"Default\">Price</div></li>
					<li><div class=\"Default\">Volume</div></li>
					<li><div class=\"Default\">Add to Cart</div></li>
				<!-- </tr> -->
			</ul>
		</section>
		";
		 //cuostom 
		 while($row = mysqli_fetch_array($res)){ 
			 echo "
		<section class=\"tableform\">
			<form method=\"post\" action=\"addtocart.php\">
				<ul class=\"actions tdd\">
					<!-- <tr> -->
						<li><div class=\"Default\">".$row['AP_name']."
							<input type=\"hidden\" name=\"AP_name\" value=\"".$row['AP_name']. "\">
						</div></li>
						<li><div class=\"Default\">".$row['T_name']."
							<input type=\"hidden\" name=\"T_name\" value=\"".$row['T_name']. "\">
						</div></li>
						<li><div class=\"Default\">".$row['T_price']."
							<input type=\"hidden\" name=\"T_price\" value=\"".$row['T_price']. "\">
						</div></li>
						<li><div class=\"Default\">
							<div class=\"12u$\">
								<div class=\"select-wrapper\">
									<select name=\"volume\" id=\"category\">
										<option value=\"\">- Volume -</option>
										<option value=\"1\">1</option>
										<option value=\"2\">2</option>
										<option value=\"3\">3</option>
										<option value=\"4\">4</option>
									</select>
								</div>
							</div>
						</div></li>
						<li><div class=\"Default\">
							<div class=\"12u$\">
								<ul class=\"actions\">
									<li>
										<input type=\"submit\" value=\"Add to Cart\" >
									</li>
									<!-- <li><input type=\"reset\" value=\"Reset\" /></li> -->
								</ul>
							</div>
						</div></li>
					<!-- </tr> -->
				</ul>
			</form>
		</section>
		"; } 
		//table tags 
		echo "
	</div>"; 
	}
?>
