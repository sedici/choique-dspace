<?php 
/**
 * Plugin Name: Sedici-Plugin
 * Plugin URI: http://sedici.unlp.edu.ar/
 * Description: This plugin connects the repository SEDICI in choique, with the purpose of showing the publications of authors or institutions
 * Version: 1.0
 * Author: SEDICI - Paula Salamone Lacunza
 * Author URI: http://sedici.unlp.edu.ar/
 * Copyright (c) 2016 SEDICI UNLP, http://sedici.unlp.edu.ar
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 */
?>
<?php use_javascript('ds-menu.js');
echo stylesheet_tag('backend/ds-css'); ?>

<div id="menu-selector">
   <ul> 
   <?php for ($i = 0; $i < $cant; $i++) { 
       $menu="menu".$i;
       ?> 
   <li><a href="#<?php echo $menu; ?>" title="Opción <?php echo $i; ?>"><?php echo __('Module ');echo $i; ?></a></li>

   <?php } ?>
   </ul>

<?php for ($i = 0; $i < $cant; $i++) { 
       $menu="menu".$i;
?>

<div id="<?php echo $menu; ?>">
<?php echo form_tag('sfDspaceMenu/save') ?>

    <h1><?php echo __('Module ');echo $i; ?></h1>
    
<input type="hidden" name="id" id="id" value="<?php echo $value[$i]['id']; ?>" />

<p id="pshow-author">
<?php echo __('Handle');?><input type="radio" name="type" id="type" value="handle" <?php if ($value[$i]['type']=="handle") echo 'checked="checked"';?>  />
<?php echo __('Author');?><input type="radio" name="type" id="type" value="author" <?php if ($value[$i]['type']=="author") echo 'checked="checked"';?>  />
<?php echo __('Free search');?><input type="radio" name="type" id="type" value="free" <?php if ($value[$i]['type']=="free") echo 'checked="checked"';?>  />
</p>
 
<p id="conditionally-author"
       <?php if($value[$i]['type'] == 'author') echo ' '; else  echo ' style="display: none;"'; ?>> 
       <?php echo __('Show authors');?><input type="checkbox" name="show_author" id="show_author" <?php if ($value[$i]['show_author']) echo 'checked="checked"';?>  />
</p>


<p>
<?php echo __('Search criteria');?><input id="context" name='context' type="text" required="required" value="<?php echo $value[$i]['context'];?>" />
</p>

<p>
        <?php echo __('Show date');?><input type="checkbox" name="date" id="date" <?php if ($value[$i]['date']) echo 'checked="checked"';?>  />
</p>

<p class="description">
        <?php echo __('Show abstract');?><input type="checkbox" name="description" id="description" <?php if ($value[$i]['description']) echo 'checked="checked"';?>  />
</p>


<p class="conditionally-description"
    <?php if(!$value[$i]['description']) echo ' style="display: none;" '; else  echo ''; ?>>        
        <?php echo __('Show summary');?><input type="checkbox" name="summary" id="summary" <?php if ($value[$i]['summary']) echo 'checked="checked"';?>  />
</p>

<p class='limit'>
        <?php echo __('Limit text lenght');?><input type="checkbox" name="limit" id="limit" <?php if ($value[$i]['limit']) echo 'checked="checked"';?>  />
</p>
<p class="conditionally-limit"
	<?php if(!$value[$i]['limit']) echo ' style="display: none;" '; else  echo ''; ?>>  
        <input name='max_lenght' type="number" value="<?php echo $value[$i]['max_lenght'];?>"  onKeyPress="return justNumbers(event);"/>
</p>

<p> 
<?php echo __('Cache days');?><?php echo select_tag('cache', options_for_select($valores, $value[$i]['cache'])) ?>
</p>

<p class="show-filter">
      <?php echo __('All result without filtering by subtypes');?><input type="checkbox" name="all" id="all" 
           <?php if ($value[$i]['all']) echo 'checked="checked"';?>  />
</p>

<span class="conditionally-filter" 
    <?php if($value[$i]['all']) echo ' style="display: none;" '; else  echo ''; ?>>    
<?php echo __('Results by subtypes');?>
<?php echo select_tag('max_results', options_for_select($total_results, $value[$i]['max_results'])) ?>
</span>

<ul class="subtipos" <?php if($value[$i]['all']) echo ' style="display: none;" '; else  echo ''; ?> >
<?php foreach ($subtypes as $key => $val){ ?>    
<li>    
<input type="checkbox" name="<?php echo $key; ?>" id="<?php echo $key; ?>" <?php if ($value[$i]['subtypes'][$key]) echo 'checked="checked"';?>  />
<?php echo __(str_replace('_',' ',ucfirst($key))); ?>
</li>
<?php } ?>
</ul>

<?php echo submit_tag(__('Save'), 'class=sf_admin_action_save') ?>

</form>
 <span class="tony"> <?php echo (link_to(__('Preview'), 'sfDspaceMenu/preview?modulo='.$value[$i]['id'], 'post=true')); ?></span>
</div>
<?php } 
?>
</div>

