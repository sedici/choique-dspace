<?php
// auto-generated by sfAdvancedAdmin
// date: 2015/10/30 10:56:51
?>
<td colspan="9">
    <?php echo link_to(get_partial('name', array('type' => 'list', 'article' => $article)) ? get_partial('name', array('type' => 'list', 'article' => $article)) : __('-'), 'article/edit?id='.$article->getId()) ?>
     - 
    <?php echo (null !== ($val = $article->getTitle()) && isset($maps["title"][$val])?$maps["title"][$val]:$val) ?>
     - 
    <?php echo (null !== ($val = $article->getAuthor()) && isset($maps["author"][$val])?$maps["author"][$val]:$val) ?>
     - 
    <?php echo (null !== ($val = $article->getTypeText()) && isset($maps["type_text"][$val])?$maps["type_text"][$val]:$val) ?>
     - 
    <?php echo (null !== ($val = $article->getSection()) && isset($maps["section"][$val])?$maps["section"][$val]:$val) ?>
     - 
    <?php echo (null !== ($val = $article->getMultimedia()) && isset($maps["multimedia"][$val])?$maps["multimedia"][$val]:$val) ?>
     - 
    <?php echo (null !== ($val = $article->getCurrentStatus()) && isset($maps["current_status"][$val])?$maps["current_status"][$val]:$val) ?>
     - 
    <?php echo (null !== ($val = ($article->getUpdatedAt() !== null && $article->getUpdatedAt() !== '') ? format_date($article->getUpdatedAt(), "dd/MM/yyyy H:mm") : '') && isset($maps["updated_at"][$val])?$maps["updated_at"][$val]:$val) ?>
     - 
    <?php echo (null !== ($val = ($article->getCreatedAt() !== null && $article->getCreatedAt() !== '') ? format_date($article->getCreatedAt(), "dd/MM/yyyy H:mm") : '') && isset($maps["created_at"][$val])?$maps["created_at"][$val]:$val) ?>
     - 
</td>