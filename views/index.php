<section class="cmain">
	<dl>
<?php foreach ($events as $event): ?>

		<dt><?=$event->my_date ?></dt>
		<dd><?=$event->my_event ?></dd>

<?php endforeach; ?>
	</dl>
</section>