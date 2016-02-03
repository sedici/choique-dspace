<?php use_javascript('ds-menu.js') ?>


<link href="/stylesheets/ds-css.css" media="screen" rel="stylesheet" type="text/css" />

<div id="menu-selector">
   <ul> 
   <?php for ($i = 1; $i <= $cant; $i++) { 
       $menu="menu".$i;
       ?> 
   <li><a href="#<?php echo $menu; ?>" title="Opción 1"><?php echo "Módulo $i"; ?></a></li>

   <?php } ?>
   </ul>

<?php for ($i = 1; $i <= $cant; $i++) { 
       $menu="menu".$i;
       
       ?>
     <div id="<?php echo $menu; ?>"
     <?php if ($i != 1) echo ' style="display: none;" '; else  echo ''; ?>>
       
<?php echo form_tag('sfDspaceMenu/save') ?>

<input type="hidden" name="id" id="id" value="<?php echo $value[$i]['id']; ?>" />
<p class="show-author">
Handle <input type="radio" name="type" id="type" value="handle" <?php if ($value[$i]['type']=="handle") echo 'checked="checked"';?>  />
Autor <input type="radio" name="type" id="type" value="author" <?php if ($value[$i]['type']=="author") echo 'checked="checked"';?>  />
Busqueda Libre <input type="radio" name="type" id="type" value="free" <?php if ($value[$i]['type']=="free") echo 'checked="checked"';?>  />
</p>
 
<p class="conditionally-author"
	<?php if($value[$i]['type']!='author') echo ' style="display: none;" ';
            else  echo ''; ?>>
	Mostrar Autores <input type="checkbox" name="show_author" id="show_author" <?php if ($value[$i]['show_author']) echo 'checked="checked"';?>  />

</p>


<p>
Contexto: <input id="context" name='context' type="text" required="required" value="<?php echo $value[$i]['context'];?>" />
</p>

<p>
        Mostrar Fecha<input type="checkbox" name="date" id="date" <?php if ($value[$i]['date']) echo 'checked="checked"';?>  />
</p>

<p class="description">
        Mostrar Resumen<input type="checkbox" name="description" id="description" <?php if ($value[$i]['description']) echo 'checked="checked"';?>  />
</p>


<p class="conditionally-description"
    <?php if(!$value[$i]['description']) echo ' style="display: none;" '; else  echo ''; ?>>        
        Mostrar Sumario<input type="checkbox" name="summary" id="summary" <?php if ($value[$i]['summary']) echo 'checked="checked"';?>  />
</p>

<p class="limit">
        Limitar longitud del texto<input type="checkbox" name="limit" id="limit" <?php if ($value[$i]['limit']) echo 'checked="checked"';?>  />
</p>
<p class="conditionally-limit"
	<?php if(!$value[$i]['limit']) echo ' style="display: none;" '; else  echo ''; ?>>  
        <input name='max_lenght' type="number" value="<?php echo $value[$i]['max_lenght'];?>"  onKeyPress="return justNumbers(event);"/>
</p>


<p> 
Duración de la Cache <?php echo select_tag('cache', options_for_select($valores, $value[$i]['cache'])) ?>
</p>

<p class="show-filter">
       Todos los Resultados<input type="checkbox" name="all" id="all" <?php if ($value[$i]['all']) echo 'checked="checked"';?>  />
</p>

<p class="conditionally-filter"
<?php if($value[$i]['all']) echo ' style="display: none;" '; else  echo ''; ?>> 
Resultados por subtipo <?php echo select_tag('max_results', options_for_select($total_results, $value[$i]['max_results'])) ?>
<br/>

<?php $iterador = 0;?>
<?php foreach ($subtypes as $key => $val){
    echo $val;
    $iterador ++;
?>    
<input type="checkbox" name="<?php echo $key; ?>" id="<?php echo $key; ?>" <?php if ($st[$i][$key]) echo 'checked="checked"';?>  /> | 
<?php
if ($iterador == 3) { $iterador = 0; echo "<br/>";};;
}
?>
</p>


<?php echo submit_tag(__('Guardar cambios'), 'class=sf_admin_action_save') ?>

</form>
</div>
<?php } 
?>


</div>

