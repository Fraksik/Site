<section class="liter">
	<h1> Список литературы </h1>
	<dl>
		<?php foreach ($books as $book): ?>

			<dt><?=$book->author ?></dt>
			<dd><?=$book->book ?></dd>

		<?php endforeach; ?>
	</dl>
</section>