<?php if (count($errors) > 0): ?>

<div class="error">
	<?php foreach ($errors as $error): ?>
		<div class="alert alert-warning" role="alert">
				        
				        <!-- Accessible Rich Internet Applications (ARIA) -->
				        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
				          <span aria-hidden="true">&times;</span>
				        </button>

				        <strong><?php echo $error; ?></strong> 
				    </div>
	<?php endforeach ?>
</div>
<?php endif ?>

<?php if (count($returncp) > 0): ?>

<div class="errow">
	<?php foreach ($returncp as $errow): ?>
		<div class="alert alert-info" role="alert">
				        
				        <!-- Accessible Rich Internet Applications (ARIA) -->
				        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
				          <span aria-hidden="true">&times;</span>
				        </button>

				        <strong>><?php echo $errow; ?></strong> 
				    </div>
				    <?php $_SESSION['sucessopaci'] = $errow; ?>
	<?php endforeach ?>
</div>
<?php endif ?>