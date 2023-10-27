<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_section/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_section/side.php') ?>

		<div class="content">
			<h1>Item List</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/post/new_item') ?>" class="button button-primary" role="button">Add Item Transaction</a>
			</div>

			<table class="table">
				<thead>
					<tr>
						<th>Item Name</th>
						<th style="width: 15%;" class="text-center">Stock</th>
                        <th style="width: 15%;" class="text-center">Item Type</th>
						<th style="width: 25%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach($items as $item): ?>
					<tr>
						<td>
                            <div><?= $item->name ?></div>
						</td>
						<td>
                            <div class="text-center"><?= $item->stock ?></div>
                        </td>
                        <td>
                            <div class="text-center"><?= $item->type ?></div>
                        </td>
						<td>
							<div class="action">
                                <a href="<?= site_url('admin/post/edit/'.$item->item_id) ?>" class="button button-small" role="button">Edit</a>
								<a href="#" 
									data-delete-url="<?= site_url('admin/post/delete/'.$item->item_id) ?>" 
									class="button button-small button-danger" 
									role="button"
									onclick="deleteConfirm(this)">Delete</a>
							</div>
						</td>
					</tr>
                    <?php endforeach ?>
				</tbody>
			</table>

			<?php $this->load->view('admin/_section/footer.php') ?>
		</div>
	</main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function deleteConfirm(event){
			Swal.fire({
				title: 'Delete Confirmation!',
				text: 'Are you sure to delete the item?',
				icon: 'warning',
				showCancelButton: true,
				cancelButtonText: 'No',
				confirmButtonText: 'Yes Delete',
				confirmButtonColor: 'red'
			}).then(dialog => {
				if(dialog.isConfirmed){
					window.location.assign(event.dataset.deleteUrl);
				}
			});
		}
	</script>

	<?php if($this->session->flashdata('message')): ?>
		<script>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('message') ?>'
			})
		</script>
	<?php endif ?>
</body>

</html>