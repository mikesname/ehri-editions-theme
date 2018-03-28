<script>
$("#metadata-button").click(function() {
    $('html, body').animate({
        scrollTop: $("#metadata").offset().top + (+4)
    }, 400);
});
$("#document-text-button").click(function() {
    $('html, body').animate({
        scrollTop: $("#document-text").offset().top + (+4)
    } , 400);
});
$("#map-button").click(function() {
    $('html, body').animate({
        scrollTop: $("#map").offset().top + (+17)
    } , 400);
});
</script>

<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <?php endif; ?>
    <?php $languages = 0;
		  if ($elementName=="Language") {
			  if (strlen($text)>0) {
				  $languages = 1;		  
			  }
		  }
    ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
		<?php if (in_array($elementName, array("Creator", "Date", "Description", "Language", "Original Format", "Publisher", "Source", "Text", "Type")) == True) { ?>
			<div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
				<?php foreach ($elementInfo['texts'] as $text):
						if ($elementName=="Creator") { $creatorString = $text; }
						if ($elementName=="Date") { $dateString = $text; }
						if ($elementName=="Description") { $descriptionString = $text; }
						if ($elementName=="Language") { $languageString = $text; }	
						if ($elementName=="Original Format") { $textOriginalString = $text; }
						if ($elementName=="Publisher") { $placeString = $text; }
						if ($elementName=="Source") { $sourceString =  metadata($record, array('Dublin Core', 'Source')); 
							                          $sourceLink = $text; }
						if ($elementName=="Text") { $textString = $text; }	
						if ($elementName=="Type") { $mapString = $text; }
					  endforeach; ?>
			</div><!-- end element -->
		<?php } ?>
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach; ?>

<!-- METADATA -->
<h3 id="metadata"><?php echo "Metadata" ?></h3>	
	<?php 
		if(isset($descriptionString)){ $metadataString = $descriptionString; ;}
		if(isset($creatorString)){ $metadataString = $creatorString  . " | " . $metadataString; ;}
		if(isset($placeString)){ $metadataString = $placeString  . " | " . $metadataString; ;}
		if(isset($dateString)){ $metadataString = $dateString  . " | " . $metadataString; ;}
	?>
	<?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
		<div id="content-files">
			<?php echo item_image_gallery_custom(array('wrapper'=>array('id'=>'photogallery', 'itemscope'=>'', 'itemtype'=>'http://schema.org/ImageGallery'),
												'linkWrapper'=>array('id'=>'gallery-item', 'itemprop'=>'associatedMedia', 'itemscope'=>'', 'itemtype'=>'http://schema.org/ImageObject'),
												'link'=>array( 'itemprop'=>'contentUrl')),'thumbnail'); ?>			
			<div id="content-files-zoom-icon" class="material-icons">zoom_in</div>
			<div id="content-files-gallery-icon" class="material-icons">insert_drive_file</div>
			<div id="content-files-counter"><?php echo metadata('item', 'file_count'); ?></div>
		</div>	
	<?php endif; ?>
	<div id="contentDescription"><p><?php echo $metadataString; ?></p>
	<?php if(isset($sourceString)){ 
		if (substr($sourceLink,0,4) == "http") {
			echo  "<p>", $sourceString, "</p>";
			echo  '<p><a href="', $sourceLink, '" target=_blank>', $sourceLink, '</a></p>';
		} else {
			echo  "<p>", $sourceString, "</p>";
		}
	} ?>
	</div>
	
	<?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>

		<div id="content-files-mobile">
			<?php echo item_image_gallery_custom(array('wrapper'=>array('id'=>'photogallery', 'itemscope'=>'', 'itemtype'=>'http://schema.org/ImageGallery'),
												'linkWrapper'=>array('id'=>'gallery-item-mobile', 'itemprop'=>'associatedMedia', 'itemscope'=>'', 'itemtype'=>'http://schema.org/ImageObject'),
												'link'=>array( 'itemprop'=>'contentUrl')),'thumbnail'); ?>			
			<div id="content-files-zoom-icon" class="material-icons">zoom_in</div>
			<div id="content-files-gallery-icon" class="material-icons">insert_drive_file</div>
			<div id="content-files-counter"><?php echo metadata('item', 'file_count'); ?></div>
		</div>	
		
		<script>

		</script>
	<?php endif; ?>

<!-- DOCUMENT TEXT -->
<?php if (isset($textString)) { ?>
	<h3 id="document-text"><?php echo "Document text" ?></h3>
	<?php if ( $language = 1 ) { 
		$arr = explode(',',trim($languageString));
		$language01 = $arr[0];
		$language02 = $arr[1];
		
		if ( $language02 ) { ?>
			<div id="language-button-01" class="element-text-language-selected"><?php echo $language01; ?></div><div id="language-button-02" class="element-text-language"><?php echo $language02; ?></div>
		<?php } 
	} ?>

	<div id="element-text-page" class="element-text-page"><div id="element-text-page-icon" class="material-icons">insert_drive_file</div>Text from <a href="#">page 1</a></div>
	<div id="content-info">
		<div id="annotation-001" class="content-info-annotation">
			1. Kárný, M.: Obóz familijny w Brzezince dla Zydów z Theresienstadt, in: Zeszyty oświecimskie nr 20, 1993, s.159.
		</div>
		<div id="person-001" class="content-info-person">
			<h5>Edita Hellerová</h5>
			<div id="content-info-person-close" class="material-icons">close</div>
			<div id="content-info-person-open" class="material-icons">launch</div>
			<div class="content-info-person-body">
				<img src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/edita.png" alt="photo">
				<p>Narozena 02. 03. 1896</p>
				<p>Poslední bydliště před deportací: Praha I</p>
				<p>Adresa/místo registrace v Protektorátu: Praha XVI, tř. Matyáše Brauna 16</p>
				<p>Transport Eo, č. 882 (06. 10. 1944, Terezín -> Osvětim)</p>
				<p>Zahynula</p>
				<p>Další text, overflow okna.</p>
				<p>Lorem ipsum</p>
				<p>etc.</p>
			</div>
		</div>
		<div id="annotation-002" class="content-info-annotation">
			2. Kárný, M.: Obóz familijny w Brzezince dla Zydów z Theresienstadt, in: Zeszyty oświecimskie nr 20, 1993, s.159.
		</div>
	</div>

	<div id="language-01" class="element-text-document"><?php echo $textString; ?></div>
	<?php if ($language02) { ?>
		<div id="language-02" class="element-text-document" style="display:none"><?php echo $textOriginalString; ?></div>
	<?php } ?>
	<?php } else { ?>
	<script>
		$( "#document-text-button" ).hide(0, function() {});
	</script>
	<?php }?>
	
	<div id="annotation-001" class="content-info-annotation-mobile">
		1. Kárný, M.: Obóz familijny w Brzezince dla Zydów z Theresienstadt, in: Zeszyty oświecimskie nr 20, 1993, s.159.
	</div>
	
<!-- MAP -->
<?php if (isset($mapString)) { ?>
<div id="map"></div><h3 class="map-document">Map</h3><h3 class="map-document-mobile">View Map</h3><div id="map-toggle-fullscreen"><span class="map-document-text">Toggle fullscreen</span><div id="map-toggle-fullscreen-icon" class="material-icons">fullscreen</div></div>
<iframe class="element-map" src="<?php echo $mapString ?>" width=100% height="410" frameborder="0" allowfullscreen></iframe>
<?php } else { ?>
<script>
	$( "#map-button" ).hide(0, function() {});
</script>
    
<?php }?>

<script>
	$( "#language-button-02" ).click(function() {
		$( "#language-01" ).hide( "fast", function() {});
		$( "#language-02" ).show( "fast", function() {});
		$( "#language-button-01" ).attr('class', 'element-text-language');
		$( "#language-button-02" ).attr('class', 'element-text-language-selected');
	});

	$( "#language-button-01" ).click(function() {
		$( "#language-02" ).hide( "fast", function() {});
		$( "#language-01" ).show( "fast", function() {});
		$( "#language-button-02" ).attr('class', 'element-text-language');
		$( "#language-button-01" ).attr('class', 'element-text-language-selected');
	});
</script>


<?php
