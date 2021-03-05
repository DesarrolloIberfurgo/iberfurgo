<?php
    //Check if display top bar
    $tg_topbar = kirki_get_option('tg_topbar');
    if(GRANDCARRENTAL_THEMEDEMO && isset($_GET['topbar']) && !empty($_GET['topbar']))
	{
	    $tg_topbar = true;
	}
    
    $grandcarrental_topbar = grandcarrental_get_topbar();
    grandcarrental_set_topbar($tg_topbar);
    
    if(!empty($tg_topbar))
    {
?>

<!-- Begin top bar -->
<div class="above_top_bar">
    <div class="page_content_wrapper">
	    
	<?php
    	//Get social profiles
	    get_template_part("/templates/template-socials");
    ?>
    
    <div class="top_contact_info">
	    <?php
		    $tg_menu_contact_address = kirki_get_option('tg_menu_contact_address');
		    
		    if(!empty($tg_menu_contact_address))
		    {
		?>
	    	<div class="company_address">
				<div id="top_contact_address"><span class="ti-location-pin"></span>Reservas: <i class="fas fa-phone-alt icon-top-bar"></i></span></i><a href="tel:0034964123456"> 964 123 456</a></div>
			</div>

			<div class="company_address">
				<div id="top_contact_address"><span class="ti-location-pin"></span><i class="far fa-envelope icon-top-bar"></i></span></i><a href="mailto:info@iberfurgo.com"> info@iberfurgo.com</a></div>
			</div>
		<?php
		    }
		?>
		<?php
		    $tg_menu_contact_number = kirki_get_option('tg_menu_contact_number');
		    
		    if(!empty($tg_menu_contact_number))
		    {
		?>
			<div class="company_address">
		    	<div id="top_contact_number"><a href="/preguntas-frecuentes"> PREGUNTAS FRECUENTES</a></div>
			</div>
		<?php
		    }
		?>
		<?php
		    $tg_menu_contact_hours = kirki_get_option('tg_menu_contact_hours');
		    
		    if(!empty($tg_menu_contact_hours))
		    {	
		?>
			<div class="company_address">
		    	<div id="top_contact_hours"><a href="/contacto">CONTACTO</a></div>
		    </div>
		<?php
		    }
		?>
    </div>
    <br class="clear"/>
    </div>
</div>
<!-- End top bar -->
<?php
    }
?>