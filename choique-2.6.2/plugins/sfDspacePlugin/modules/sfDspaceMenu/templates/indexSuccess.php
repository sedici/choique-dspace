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
 
<p>
<?php echo __('Handle');?><input id="context" name='handle' type="text" value="<?php echo $value[$i]['handle'];?>" />
</p>
<p>
<?php echo __('Author');?><input id="context" name='author' type="text" value="<?php echo $value[$i]['author'];?>" />
</p>
<p>
<?php echo __('Free search');?><input id="context" name='key_words' type="text" value="<?php echo $value[$i]['key_words'];?>" />
</p>

<p> 
<?php
$duration = $value[$i]['cache'];
if (empty($duration)) { $duration = $defaultcache;}
echo __('Cache days');
?>
    <select id="cache" name="cache" value="<?php echo $value[$i]['cache'];?>">
		<?php
		foreach ($all_days as $day){
			?>
			<option value=<?php echo $day * $one_day;?>
			<?php echo ($duration==($day * $one_day))?'selected':''; ?>>
                        <?php echo $day;?> <?php echo('días'); ?></option>
		<?php } //end foreach?>
    </select>
    
</p>

<p> 
       <?php echo __('Show authors');?><input type="checkbox" name="show_author" id="show_author" <?php if ($value[$i]['show_author']) echo 'checked="checked"';?>  />
</p>
<p> 
       <?php echo __('Share in social networks');?><input type="checkbox" name="share" id="share" <?php if ($value[$i]['share']) echo 'checked="checked"';?>  />
</p>
<p>
        <?php echo __('Show date');?><input type="checkbox" name="date" id="date" <?php if ($value[$i]['date']) echo 'checked="checked"';?>  />
</p>

<p> 
       <?php echo __('Show document types');?><input type="checkbox" name="show_subtype" id="show_subtype" <?php if ($value[$i]['show_subtype']) echo 'checked="checked"';?>  />
</p>

<p class="description-ds">
        <?php echo __('Show abstract');?><input type="checkbox" name="description" id="description" <?php if ($value[$i]['description']) echo 'checked="checked"';?>  />
</p>

<p class="conditional-summary"
   <?php if(!$value[$i]['description']) echo ' style="display: none;" '; else echo ''; ?>>
        <?php echo __('Show summary');?><input type="checkbox" name="summary" id="summary" <?php if ($value[$i]['summary']) echo 'checked="checked"';?>  />
</p>

<p class="conditionally-description"
    <?php if(!$value[$i]['description']) echo ' style="display: none;" '; else echo ''; ?>>

<span class='limit'>
        <?php echo __('Limit text lenght');?><input type="checkbox" name="limit" id="limit" <?php if ($value[$i]['limit']) echo 'checked="checked"';?>  />
</span>
<span class="conditionally-limit"
	<?php if(!$value[$i]['limit']) echo ' style="display: none;" '; else echo ''; ?>>  
        <input name='max_lenght' type="number" value="<?php echo $value[$i]['max_lenght'];?>"  onKeyPress="return justNumbers(event);"/>
</span>
</p>
<p>
<?php 
$results = $value[$i]['max_results'];
echo __('Results by subtypes');
?>
    <select id="max_results" name="max_results" value="<?php echo $value[$i]['max_results'];?>">
		<?php
		foreach ($total_results as $res){
			?>
			<option value=<?php echo $res;?>
			<?php echo ($results==$res)?'selected':''; ?>>
                        <?php echo $res; ?></option>
		<?php } //end foreach?>
    </select>
</p>    


<p> 
       <?php echo __('Group by year');?><input type="checkbox" name="group_year" id="group_year" <?php if ($value[$i]['group_year']) echo 'checked="checked"';?>  />
</p>
<p> 
       <?php echo __('Group by document subtype');?><input type="checkbox" name="group_subtype" id="group_subtype" <?php if ($value[$i]['group_subtype']) echo 'checked="checked"';?>  />
</p>

<p class="show-filter">
      <?php echo __('All result without filtering by subtypes');?><input type="checkbox" name="all" id="all" 
           <?php if ($value[$i]['all']) echo 'checked="checked"';?>  />
</p>
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

