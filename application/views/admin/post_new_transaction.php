<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_section/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_section/side.php') ?>

		<div class="content">
			<h1>Add new Item</h1>

			<form action="" method="POST">
				<label>Name</label>
				<input type="text" name="name" placeholder="name" />
				
				<label>Quantity Sold</label>
				<input name="quantity_sold" placeholder="quantity sold" />

                <label>Date</label>
				<input type="date" name="date" placeholder="date" />

				<div>
					<button type="submit" name="draft" class="button button-primary" value="false">Add</button>
				</div>
			</form>

			<?php $this->load->view('admin/_section/footer.php') ?>
		</div>
	</main>
</body>

</html>