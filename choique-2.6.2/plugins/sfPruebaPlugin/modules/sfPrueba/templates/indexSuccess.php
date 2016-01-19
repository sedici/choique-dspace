<?php use_javascript('scrips1.js') ?>

<?php echo form_tag('sfPrueba/save') ?>
<?php echo $type;?>
<p class="show-author">
Handle <input type="radio" name="type" id="type" value="handle" <?php if ($type=="handle") echo 'checked="checked"';?>  />
Autor <input type="radio" name="type" id="type" value="author" <?php if ($type=="author") echo 'checked="checked"';?>  />
Busqueda Libre <input type="radio" name="type" id="type" value="free" <?php if ($type=="free") echo 'checked="checked"';?>  />
</p>
 
<p class="conditionally-author"
	<?php if($type!='author') echo ' style="display: none;" ';
            else  echo ''; ?>>
	Mostrar Autores <input type="checkbox" name="show_author" id="show_author" <?php if ($show_author) echo 'checked="checked"';?>  />

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

