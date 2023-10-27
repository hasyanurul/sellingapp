<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_section/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_section/side.php') ?>

        <div class="content">
            <h1>Find Item</h1>
            
            <div class="toolbar">
				<a href="#" class="button button-primary" role="button">Search</a>
			</div>

			<table class="table">
				<thead>
					<tr>
                        <th style="width: 15%;" class="text-center">Date</th>	
                        <th class="text-center">Item Name</th>                        
						<th style="width: 15%;" class="text-center">Stock</th>
						<th style="width: 15%;" class="text-center">Quantity Sold</th>
                        <th style="width: 15%;" class="text-center">Item Type</th>
					</tr>
				</thead>
				<tbody>
					<tr>
                        <td class="text-center text-gray">Draft</td>
                        <td>
							<div>Hello World!</div>
						</td>
						<td class="text-center text-gray">Draft</td>
						<td class="text-center text-gray">Draft</td>
                        <td class="text-center text-gray">Draft</td>
					</tr>
					<tr>
                        <td class="text-center text-gray">Draft</td>
                        <td>
							<div>Hello World!</div>
						</td>
						<td class="text-center text-gray">Draft</td>
						<td class="text-center text-green">Published</td>
                        <td class="text-center text-gray">Draft</td>
					</tr>
				</tbody>
			</table>
            <?php $this->load->view('admin/_section/footer.php') ?>
		</div>
	</main>
</body>

</html>