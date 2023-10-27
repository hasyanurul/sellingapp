<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_section/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_section/side.php') ?>

        <div class="content">
            <h1>Find Transaction</h1>

			<form action="" method="get" style="flex-direction: row; align-items:center">
                <div>
                    <input type="search" name="keyword" style="width: 360px;" placeholder="Keyword.." value="<?= html_escape($keyword) ?>" required maxlength="32" />
                    <input type="submit" class="button button-primary" style="width: 120px;" value="Cari">
                </div>

            </form>
            
            <table class="table">
				<thead>
					<tr>
                        <th style="width: 20%;" class="text-center">Date</th>
                        <th>Item Name</th>
						<th style="width: 15%;" class="text-center">Quantity Sold</th>
                        <th style="width: 15%;" class="text-center">Item Type</th>
					</tr>
				</thead>
				<tbody>
                    <?php if ($search_result != NULL){
                            foreach($search_result as $item): ?>                    
					<tr>
                        <td>
                            <div class="text-center"><?= $item->date ?></div>
                        </td>
                        <td>
                            <div><?= $item->name ?></div>
						</td>
						<td>
                            <div class="text-center"><?= $item->quantity_sold ?></div>
                        </td>
                        <td>
                            <div class="text-center"><?= $item->type ?></div>
                        </td>
					</tr>
                    <?php endforeach;
                    } ?>
				</tbody>
			</table>
            <?php $this->load->view('admin/_section/footer.php') ?>
		</div>
	</main>
</body>

</html>