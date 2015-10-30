<div>
     
<?php echo form_tag('sfPrueba/save') ?>
// Cuadro de texto (input)
<div>
<?php echo input_tag('name', $prueba ) ?>
</div>

 
<?php echo submit_tag(__('Guardar cambios'), 'class=sf_admin_action_save') ?>

</form>

</div>

