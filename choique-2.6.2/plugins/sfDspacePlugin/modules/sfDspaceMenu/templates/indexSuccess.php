<?php use_javascript('ds-menu.js') ?>
<?php echo form_tag('sfDspaceMenu/save') ?>

<p class="show-author">
Handle <input type="radio" name="type" id="type" value="handle" <?php if ($value['type']=="handle") echo 'checked="checked"';?>  />
Autor <input type="radio" name="type" id="type" value="author" <?php if ($value['type']=="author") echo 'checked="checked"';?>  />
Busqueda Libre <input type="radio" name="type" id="type" value="free" <?php if ($value['type']=="free") echo 'checked="checked"';?>  />
</p>
 
<p class="conditionally-author"
	<?php if($value['type']!='author') echo ' style="display: none;" ';
            else  echo ''; ?>>
	Mostrar Autores <input type="checkbox" name="show_author" id="show_author" <?php if ($value['show_author']) echo 'checked="checked"';?>  />

</p>


<p>
Contexto: <input id="context" name='context' type="text" required="required" value="<?php echo $value['context'];?>" />
</p>

<p>
        Mostrar Fecha<input type="checkbox" name="date" id="date" <?php if ($value['date']) echo 'checked="checked"';?>  />
</p>

<p class="description">
        Mostrar Resumen<input type="checkbox" name="description" id="description" <?php if ($value['description']) echo 'checked="checked"';?>  />
</p>


<p class="conditionally-description"
    <?php if(!$value['description']) echo ' style="display: none;" '; else  echo ''; ?>>        
        Mostrar Sumario<input type="checkbox" name="summary" id="summary" <?php if ($value['summary']) echo 'checked="checked"';?>  />
</p>

<p class="limit">
        Limitar longitud del texto<input type="checkbox" name="limit" id="limit" <?php if ($value['limit']) echo 'checked="checked"';?>  />
</p>
<p class="conditionally-limit"
	<?php if(!$value['limit']) echo ' style="display: none;" '; else  echo ''; ?>>  
        <input name='max_lenght' type="number" value="<?php echo $value['max_lenght'];?>"  onKeyPress="return justNumbers(event);"/>
</p>


<p> 
Duración de la Cache <?php echo select_tag('cache', options_for_select($valores, $value['cache'])) ?>
</p>

<p class="show-filter">
       Todos los Resultados<input type="checkbox" name="all" id="all" <?php if ($value['all']) echo 'checked="checked"';?>  />
</p>

<p class="conditionally-filter"
<?php if($value['all']) echo ' style="display: none;" '; else  echo ''; ?>> 
Resultados por subtipo <?php echo select_tag('max_results', options_for_select($total_results, $value['max_results'])) ?>
<br/>

<?php $iterador = 0;?>
<?php foreach ($subtypes as $key => $val){
    echo $val;
    $iterador ++;
?>    
<input type="checkbox" name="<?php echo $key; ?>" id="<?php echo $key; ?>" <?php if ($st[$key]) echo 'checked="checked"';?>  /> | 
<?php
if ($iterador == 3) { $iterador = 0; echo "<br/>";};;
}
?>
</p>


<?php echo submit_tag(__('Guardar cambios'), 'class=sf_admin_action_save') ?>

</form>

</div>

