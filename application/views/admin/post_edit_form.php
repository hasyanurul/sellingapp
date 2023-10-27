<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_section/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_section/side.php') ?>

		<div class="content">
			<h1>Edit Item</h1>

			<form action="" method="POST">
				<label for="name">Name</label>
				<input type="text" name="name" placeholder="Name"
					value="<?= $item->name ?>"/>
				
				<label for="stock">Stock</label>
				<Input name="stock" placeholder="Stock"
                    value="<?= $item->stock ?>"/>

                <label for="type">Type</label>
				<input type="text" name="type" placeholder="Type"
					value="<?= $item->type ?>"/>

                <label>Quantity Sold</label>
				<input name="quantity_sold" placeholder="Quantity Sold"
                    value="<?= $item->quantity_sold ?>"/>
                
                <label>Date</label>
				<input type="date" name="date" placeholder="Date"
                    value="<?= $item->date ?>"/>

				<div>
					<button type="submit" name="draft" class="button button-primary" value="false">Publish Update</button>
				</div>
			</form>

			<?php $this->load->view('admin/_section/footer.php') ?>
		</div>
	</main>
</body>

</html>