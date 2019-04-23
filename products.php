<?php
    #-------------------------------------------------------------------------------
    #           Santiago Rivera
    #               Hw - 4
    #              4/13/2019
    #-------------------------------------------------------------------------------
require('database.php');
  
	$selected_val = 1;
	$queryAll = 'SELECT * FROM product';
	$statement1 = $db->prepare($queryAll);
	$statement1->bindValue(':selected_val', $selected_val);
	$statement1->execute();
	$all_data = $statement1->fetchAll();
	$statement1->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Validate</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	
</head>
	<body>
		<div class="top">
				<table align="center">
					<tr>
						<td align="center" width="400"><img src="Images/santilogo2.png" width="350" height="100"></td>
						<td width="800" align="center" >
							<h1>Sports Supply</h1>
						</td>	
						<td >
							 <h2>Phone: (555)555-5555</h2> 
							 <h2>Adress: 2 Central Ave, New Jersey.</h2>
							 
						</td>
					</tr>
					
				</table>
				
				</div>
			
		<?php if ($selected_val == 1): ?>
		    <h2><center><table>
			<form action="" method="get">
				<tr><th>Product ID</th>
					<th>Product Name</th>
					<th>Product Quantity</th>
					<th>Cost</th>
					<th>Description</th>
					<th>Image</th>
					<th>Category Type</th>
				</tr>
				
			<?php foreach ($all_data as $all) : ?>
				<tr><td><?php echo $all['Product_ID']; ?></td>
					<td><?php echo $all['PName']; ?></td>
					<td><?php echo $all['Pquantity']; ?></td>
					<td><?php echo $all['cost']; ?></td>
					<td><?php echo $all['description']; ?></td>
					<td><?php echo $all['image']; ?></td>
					<td><?php echo $all['Cat_type']; ?></td>
					<td><input type="submit" value="Add Product"></td>
					
			<?php endforeach; ?> 

					</tr>			
			<?php endif ?>	
			</table></center></h2>
</body>
</html>