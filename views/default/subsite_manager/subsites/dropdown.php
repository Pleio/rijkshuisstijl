<?php $base_url = elgg_get_site_url(); ?>
<div class="rhs-dropdown">
	<a data-dropdown-trigger href="#" title="Pleio" class="rhs-top-navigation__link rhs-top-navigation__link--left rhs-dropdown__trigger">Pleio</a>
	<div class="rhs-dropdown__wrapper">
	<?php
	if(subsite_manager_on_subsite()){
		// link back to parent site
		$parent = elgg_get_config("site")->getOwnerEntity();
		$base_url = $parent->url;
		echo elgg_view("output/url", array(
			"href" => $base_url,
			"text" => $parent->name,
			"is_trusted" => true,
			"class" => "rhs-dropdown__link"
		));
	}

	$sites = subsite_manager_get_user_subsites();
	if($sites){
		// list subsites
		foreach($sites as $site){
			if($site->url != elgg_get_site_url()){
				echo elgg_view("output/url", array(
					"href" => $site->url,
					"text" => $site->name,
					"is_trusted" => true,
					"class" => "rhs-dropdown__link"
				));
			}
		}
	}

	echo elgg_view("output/url", array(
		"href" => $base_url . "subsites",
		"text" => elgg_echo("subsite_manager:menu:subsites:all"),
		"class" => "rhs-dropdown__link elgg-quiet",
		"is_trusted" => true
	));

	if($sites){
		echo elgg_view("output/url", array(
			"href" => $base_url . "subsites/mine",
			"text" => elgg_echo("subsite_manager:menu:subsites:mine"),
			"class" => "rhs-dropdown__link elgg-quiet",
			"is_trusted" => true
		));
	}
	?>
	</div>
</div>
