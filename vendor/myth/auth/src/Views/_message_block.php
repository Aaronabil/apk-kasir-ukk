<?php if (session()->has('message')) : ?>
	<div class="alert alert-success text-light" >
		<?= session('message') ?>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="alert alert-danger text-light">
		<?= session('error') ?>
	</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="alert alert-danger text-light">
	<?php foreach (session('errors') as $error) : ?>
		<?= $error ?>
	<?php endforeach ?>
	</ul>
<?php endif ?>
