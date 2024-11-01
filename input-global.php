<div class="page-header">
	<h1>Theme Options - iTech Avengers<span class="pull-right"> :)</span></h1>
</div>
<div class="wrap">
    <div id="avengersthemeoptionswrap" class="avengersthemeoptionswrap background__grey">
        <?php do_action('disable_comments_notice'); ?>
        <div class="theme__option_block">
            <div class="theme__option__nav__wrap">
                <p class="plugin__version">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/images/company-logo.png" alt="iTech Avengers Logo">
				</p>
                <ul class="theme__option__nav">
                    <li id="GlobalSettingsNav" class="theme__option__nav__item active">
                        <a href="#AvengersGlobalSetting" class="theme__option__nav__link">Global Settings</a>
                    </li>
                    <li id="SocialLinksNav" class="theme__option__nav__item">
                        <a href="#AvengersSocialLinks" class="theme__option__nav__link">Social Links</a>
                    </li>
					<li id="HelpGuideNav" class="theme__option__nav__item">
                        <a href="#HelpGuide" class="theme__option__nav__link">Help Guide</a>
                    </li>
                </ul>
            </div>
            <div class="av-row">
                <div class="av-col-lg-9">
					<form method="post" action="options.php">
						<?php settings_fields( 'avengers_options' ); ?>
						<?php $options = get_option( 'avengers_theme_options' ); ?>
						<div class="theme__option__tab">
							<div id="AvengersGlobalSetting" class="theme__option__tab__item show">
								<?php include AVENGERS_PLUGIN_DIR . 'tabs/global_settings.php'; ?>
							</div>
							<div id="AvengersSocialLinks" class="theme__option__tab__item">
								<?php include AVENGERS_PLUGIN_DIR. 'tabs/social_links.php'; ?>
							</div>
							<div id="HelpGuide" class="theme__option__tab__item">
								<?php include AVENGERS_PLUGIN_DIR . 'tabs/help.php'; ?>
							</div>
						</div>
					</form>
                </div>
                <div class="av-col-lg-3">
                    <?php include AVENGERS_PLUGIN_DIR . 'tabs/sidebar.php'; ?>
                </div>
            <div>
        </div>
        <?php include AVENGERS_PLUGIN_URL . 'tabs/footer.php'; ?>
    </div>
</div>
		
		<script>
			jQuery(document).ready(function(){
				jQuery(".theme__option__nav li.active").click(); 

				jQuery(".theme__option__nav li").click(function(e){
					e.preventDefault();
					jQuery(".theme__option__nav li").removeClass('active');
					jQuery(this).addClass('active');
					let tid=  jQuery(this).find('a').attr('href');
					console.log("ID:"+tid);
					jQuery('.theme__option__tab__item').removeClass('show');
					jQuery(tid).addClass('show');
				});
			});
		</script>
		
