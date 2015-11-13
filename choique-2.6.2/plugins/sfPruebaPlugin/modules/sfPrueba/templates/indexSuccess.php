<?php use_javascript('scrips1.js') ?>

<?php echo form_tag('sfPrueba/save') ?>

<p class="show-author">
Handle <input type="radio" name="type" id="type" value="handle"  />
Autor <input type="radio" name="type" id="type" value="author" />
Busqueda Libre <input type="radio" name="type" id="type" value="free" />
</p>
 
<p class="conditionally-author">
        
	Mostrar Autores <?php echo checkbox_tag('show_author', 1, true) ?>

</p>

<?php if ($context == "") $context="Ingrese un contexto"?>
<div>
Context <?php echo input_tag('context', $context ) ?>
</div>

<p class="limit">
	Limitar longitud del texto <?php echo checkbox_tag('limit', 1, true) ?>
</p>
<?php if($maxlenght == "") $maxlenght=0;?>
<p class="conditionally-limit">
	Longitud del texto en caracteres: 
        <input type="number" onKeyPress="return justNumbers(event);"
		id="maxlenght"
		name="maxlenght" 
		value="<?php echo $maxlenght; ?>" />
        
</p> 

<p class="description">
	Mostrar resumen <?php echo checkbox_tag('description', 1, true) ?>
</p>

<p class="conditionally-description">
	Mostrar sumario <?php echo checkbox_tag('summary', 1, true) ?>
</p>

<p>
	Mostrar fecha <?php echo checkbox_tag('date', 1, true) ?>
</p>
<?php 
$un_dia=86400;
$valores=array(
  $un_dia  => '1',
  $un_dia * 3    => '3',
  $un_dia * 7 => '7',
  $un_dia * 14    => '14',
);

?>
<p>
<?php echo select_tag('cache', options_for_select($valores, $un_dia * 7)) ?>
</p>


<?php echo submit_tag(__('Guardar cambios'), 'class=sf_admin_action_save') ?>

</form>

</div>

