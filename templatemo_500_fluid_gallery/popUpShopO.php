<?php
		$quer = mysqli_query($connection, "select * from PRODUCTO where cat_id = 'OTR';");

		while ($row_as = mysqli_fetch_assoc($quer)) {
			echo "<div class='grid-item'>";
				echo "<figure class='effect-sadie'>";
						echo "<img src='".$row_as['pro_imagen']."' alt='Image' class='img-fluid tm-img'>";
						echo "<figcaption>";
								echo "<h2 class='tm-figure-title'>".$row_as['pro_tipo']." <span><strong>".$row_as['pro_nombre']."</strong></span></h2>";
								echo "<p class='tm-figure-description'>$".$row_as['pro_precio']."</p>";
								echo "<a href='#shopping-popup".$row_as['pro_id']."' class='open-popup-link'>View more</a>";
						echo "</figcaption>";
				echo "</figure>";
		echo "</div>";

		echo "<div id='shopping-popup".$row_as['pro_id']."' class='white-popup mfp-hide'>";
			echo "<div class='imgDes'>";
			echo "<img src=".$row_as['pro_imagen']." alt='Image' class='img-fluid tm-img'>";
			echo "</div>";


			echo "<h1 class='tm-contact-info' align=left>".$row_as['pro_tipo']." ".$row_as['pro_nombre']."</h1>";
			echo "<p class='tm-text' align=left>".$row_as['pro_descripcion']."</p>";
			echo "<h3 class='tm-text' align=left>$".$row_as['pro_precio']."</h3>";


			echo "<fieldset style='border:0;'>";
				echo "<form action='index-color.php' method='post'>";

							if ($row_as['pro_talla'] == 'S') {
								echo "<div class='form-group'>";
									echo "<label for='clothe_size'>Choose size:</label>";
									echo "<select name='clothe_size' required/>";
										echo "<option value='L'>L</option>";
										echo "<option value='M'>M</option>";
										echo "<option value='S'>S</option>";
									echo "</select>";
								echo "</div>";
								echo "<input type='hidden' name='item' value='".$row_as['pro_nombre']."'>";
								echo "<input type='hidden' name='cat_id' value='".$row_as['cat_id']."'>";
							}
							else if ($row_as['pro_talla'] == 'U'){
								echo "<input type='hidden' name='clothe_size' value='U'>";
								echo "<input type='hidden' name='item' value='".$row_as['pro_nombre']."'>";
								echo "<input type='hidden' name='cat_id' value='".$row_as['cat_id']."'>";
								echo "<br /> <br />";
							}
							else {
								echo "<input type='hidden' name='clothe_size' value='N'>";
								echo "<input type='hidden' name='item' value='".$row_as['pro_nombre']."'>";
								echo "<input type='hidden' name='cat_id' value='".$row_as['cat_id']."'>";
								echo "<br /> <br />";
							}

								echo "<div class='form-group'>";
										echo "Quantity (up to 5):";
										echo "<input type='number' name='quantity' min='1' max='5' required>";
								echo "</div>";

								if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
										echo "<button type='submit' name='addToCart' class='pull-xs-right tm-submit-btn'>Agregar al Carrito</button>";
								}else{
										echo "<button type='reset' onclick='logInAlert()' class='pull-xs-right tm-submit-btn'>Agregar al Carrito</button>";
								}

								echo "<br /> <br />";
							echo "</form>";
						echo "</fieldset>";
					echo "</div>";
				}
?>
