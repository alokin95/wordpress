<table class="table">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">Title</th>
		<th scope="col">Author</th>
		<th scope="col">Posted</th>
		<th scope="col">Remove</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post) : ?>
	<tr>
		<th scope="row">1</th>
		<td><?php echo $post->post_title?></td>
		<td><?php echo $post->display_name?></td>
		<td><?php echo $post->post_date?></td>
		<td><button class="add-to-favs-button" data-id="<?php echo $post->ID?>">Remove</button></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>