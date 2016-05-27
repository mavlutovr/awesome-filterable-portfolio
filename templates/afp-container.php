<?php // AFP Main Container ?>
<div class="afp-clear"></div>
<div id="afp-container">

	
	<?php // Categories ?>
	<ul id="afp-filter">
		<li class="afp-active-cat"><a href="#" class="All" data-value="All"><?php
				echo __('All', 'awesome-filterable-portfolio')
		?></a></li>
		<?php
		foreach ( $cats as $cat ){
		?>
		<li><a href="#" class="<?php
			echo preg_replace("~[^A-Za-z0-9]~", "", $cat->cat_name);
			?>" data-value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; 
				?></a></li>
		<?php } ?>
	</ul>
	<?php // End Of Categories ?>

	
	<?php // Portfolio Items ?>
	<ul class="afp-items">
		<?php
		$k = 1;
		foreach ($items as $item ){
			
		// Item
		?><li class="afp-single-item" data-id="id-<?php echo $k; ?>" data-type="<?php 
		echo $item->item_category_id; ?>">
			
			<?php // Item Image ?>
			<a class="colorbox" title="<?php echo $item->item_description; ?>"
			   href="<?php echo $item->item_image; ?>"><img 
					alt="<?php echo $item->item_title; ?>" 
					class="img-link-initial" 
					src="<?php echo $item->item_thumbnail; ?>"></a><br />
			
			<?php // Item Details ?>
			<ul class="afp-item-details">
				<?php
				// Item Title
				if($item->item_title != null) { ?>
					<li><strong><?php echo $item->item_title; ?></strong></li>
					<?php
				}
				
				// Item Client
				if($item->item_client != null) { ?>
					<li><?php echo $item->item_client; ?></li>
					<?php
				}
				
				// Item Date
				if($item->item_date != '0000-00-00') { ?>
					<li><?php echo date("m/d/Y", strtotime($item->item_date)); ?></li>
					<?php
				}
				
				// Item Link
				if($item->item_link != null) { ?>
				<li><a target="_<?php echo $afpOptions['project_link']; ?>" 
						href="<?php echo $item->item_link; ?>"><?php 
						echo __('Project Link', 'awesome-filterable-portfolio'); 
						?></a></li>
					<?php
				}
				
				// Item Category
				if ($afpOptions['displayCat'] == 1) { ?>
				<li class="afp-item-category"><?php 
					echo getCategoryNameById($item->item_category_id);  ?></li>
					<?php
				} ?>
				</ul>
		</li><?php
		$k++;
		}
		?>
		</ul>

</div>

<div class="afp-clear"></div>