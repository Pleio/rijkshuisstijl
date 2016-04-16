<?php
/**
 * Bulletin index
 *
 */

global $CONFIG;

/*$site = elgg_get_site_entity();

$options = array(
	'type' => 'user',
	'site_guids' => false,
	'relationship' => 'member_of_site',
	'relationship_guid' => $site->getGUID(),
	'inverse_relationship' => true,
	'full_view' => false,
	'count' => true
);


$num_members = elgg_get_entities_from_relationship($options);

$title = elgg_echo('Bulletin');


switch ($vars['page']) {
	case 'popular':
		$options['relationship'] = 'friend';
		$options['inverse_relationship'] = false;
		unset($options['relationship_guid']);
		
		$options["joins"] = array("JOIN " . elgg_get_config("dbprefix") . "entity_relationships r2 ON e.guid = r2.guid_one");
		$options["wheres"] = array("(r2.guid_two = " . $site->getGUID() . " AND r2.relationship = 'member_of_site')");
		
		$content = elgg_list_entities_from_relationship_count($options);
		break;
	case 'online':
		$content = get_online_users();
		break;
	case 'newest':
		$content = elgg_list_entities_from_relationship($options);
		break;	
	case 'alpha':
	default:
		$options["joins"] = array("INNER JOIN {$CONFIG->dbprefix}users_entity o ON (e.guid = o.guid)");
		$options["order_by"] = "o.name";
		$content = elgg_list_entities_from_relationship($options);
		break;
}

if(empty($content)) {
	$content = elgg_echo("notfound");
}


$params = array(
	'content' => $content,
	'sidebar' => elgg_view('bulletin/sidebar'),
	'title' => $title . " ($num_members)",
	'filter_override' => elgg_view('bulletin/nav', array('selected' => $vars['page'])),
);

$body = elgg_view_layout('content', $params);*/

$body = '<div class="rhs-lead rhs-lead--bulletin">
        <div style="background-image:url(\'asset/image/lead--theme.jpg\');" class="rhs-lead__background"></div>
        <div class="rhs-container">
          <h1 class="rhs-bulletin__title">Prikbord</h1>
          <div class="rhs-row">
            <div class="rhs-col-md-10 rhs-col-lg-7">
              <p class="rhs-bulletin__description">Welkom op het prikbord. Een informele plek om uw nieuws of ervaringen te delen, vakgenoten te vinden voor bv specifieke opdrachten, vacatures en gewaardeerde gebruikers, etc. Een prikbord voor niet-fiscale zaken dus.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="rhs-forum-section rhs-forum-section--bulletin">
        <div class="rhs-container">
          <h2 class="rhs-forum__title hidden-md hidden-lg hidden-xl">Prikbord</h2>
          <div class="rhs-row">
            <div class="rhs-col-md-4 rhs-col-lg-3 rhs-col-lg-offset-3 rhs-pull-right"><a href="#" title="Een nieuwe vraag stellen" data-modal-id="#modal-item" class="js-toggleModal rhs-button rhs-button--primary rhs-button--inline rhs-forum-section__button">+ <span>Plaats een bericht</span></a></div>
            <div class="rhs-col-md-4 rhs-col-lg-3">
              <div class="rhs-forum__filter">
                <div class="selecter  closed" tabindex="0"><select tabindex="-1" name="filter" id="filter" data-label="Filter" class="selecter-default selecter-element">
                  <option value="1" selected="">Alles</option>
                  <option value="2">Meest bekeken</option>
                  <option value="3">Mijn Vragen</option>
                </select><span class="selecter-selected">Alles</span><div class="selecter-options"><span class="selecter-item selected" data-value="1">Alles</span><span class="selecter-item" data-value="2">Meest bekeken</span><span class="selecter-item" data-value="3">Mijn Vragen</span></div></div>
              </div>
            </div>
            <div class="rhs-col-md-4 rhs-col-lg-3">
              <div class="rhs-forum__filter">
                <div class="selecter  closed" tabindex="0"><select tabindex="-1" name="thema" id="thema" data-label="Alle thema\'s" class="selecter-default selecter-element">
                  <option value="" selected="">Alle thema\'s</option>
                  <option value="5">Inkomstenbelasting</option>
                  <option value="4">Loonheffingen</option>
                  <option value="3">Omzetbelasting</option>
                  <option value="2">Toeslagen</option>
                  <option value="1">Vennootschapsbelasting</option>
                </select><span class="selecter-selected">Alle thema\'s</span><div class="selecter-options"><span class="selecter-item selected" data-value="">Alle thema\'s</span><span class="selecter-item" data-value="5">Inkomstenbelasting</span><span class="selecter-item" data-value="4">Loonheffingen</span><span class="selecter-item" data-value="3">Omzetbelasting</span><span class="selecter-item" data-value="2">Toeslagen</span><span class="selecter-item" data-value="1">Vennootschapsbelasting</span></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="rhs-forum-section rhs-forum-section--grey rhs-last-section">
        <div class="rhs-container" style="max-width: 102rem;">
          <div class="rhs-row">
            <div class="rhs-col-md-12">
              <div class="rhs-card-topic"><a href="/profile-public.html" title="Ga naar profielpagina" class="rhs-card-topic__profile-picture"><img src="asset/image/profile-picture.png"></a>
                <div class="rhs-card-topic__content"><a href="forum-item.html" title="..." class="rhs-card-topic__title">Beëindiging van een koop- en licentieovereenkomst</a>
                  <div class="rhs-card-topic__info"><span class="rhs-hidden-mobile">Gesteld door:</span> <a href="/profile-public.html" title="Ga naar profielpagina">AiMingOei</a> 5 min geleden <span class="rhs-hidden-mobile">in</span> <a href="#" class="rhs-hidden-mobile">Inkomstenbelasting </a></div>
                  <div class="rhs-card-topic__description">DGA staat op de loonlijst en ontvangt vanuit zijn werkmaatschappij € 57.500,- bruto loon. De medewerker met het hoogste salaris in de werkmaatschappij verdient</div>
                </div>
                <div class="rhs-card-topic__aside">
                  <div class="rhs-card-topic__views"><span>24</span></div><a href="#" title="Vraag volgen" class="rhs-card-topic__follow">Vraag volgen</a><a href="forum-item.html" title="Vraag antwoorden" class="rhs-card-topic__answers"><span>16</span> antwoorden</a>
                </div>
              </div>
            </div>
            <div class="rhs-col-md-12">
              <div class="rhs-card-topic"><a href="/profile-public.html" title="Ga naar profielpagina" class="rhs-card-topic__profile-picture"><img src="asset/image/profile-picture.png"></a>
                <div class="rhs-card-topic__content"><a href="forum-item.html" title="..." class="rhs-card-topic__title">Beëindiging van een koop- en licentieovereenkomst</a>
                  <div class="rhs-card-topic__info"><span class="rhs-hidden-mobile">Gesteld door:</span> <a href="/profile-public.html" title="Ga naar profielpagina">AiMingOei</a> 5 min geleden <span class="rhs-hidden-mobile">in</span> <a href="#" class="rhs-hidden-mobile">Inkomstenbelasting </a></div>
                  <div class="rhs-card-topic__description">DGA staat op de loonlijst en ontvangt vanuit zijn werkmaatschappij € 57.500,- bruto loon. De medewerker met het hoogste salaris in de werkmaatschappij verdient</div>
                </div>
                <div class="rhs-card-topic__aside">
                  <div class="rhs-card-topic__views"><span>24</span></div><a href="#" title="Vraag volgen" class="rhs-card-topic__follow">Vraag volgen</a><a href="forum-item.html" title="Vraag antwoorden" class="rhs-card-topic__answers"><span>16</span> antwoorden</a>
                </div>
              </div>
            </div>
            <div class="rhs-col-md-12">
              <div class="rhs-card-topic"><a href="/profile-public.html" title="Ga naar profielpagina" class="rhs-card-topic__profile-picture"><img src="asset/image/profile-picture.png"></a>
                <div class="rhs-card-topic__content"><a href="forum-item.html" title="..." class="rhs-card-topic__title">Beëindiging van een koop- en licentieovereenkomst</a>
                  <div class="rhs-card-topic__info"><span class="rhs-hidden-mobile">Gesteld door:</span> <a href="/profile-public.html" title="Ga naar profielpagina">AiMingOei</a> 5 min geleden <span class="rhs-hidden-mobile">in</span> <a href="#" class="rhs-hidden-mobile">Inkomstenbelasting </a></div>
                  <div class="rhs-card-topic__description">DGA staat op de loonlijst en ontvangt vanuit zijn werkmaatschappij € 57.500,- bruto loon. De medewerker met het hoogste salaris in de werkmaatschappij verdient</div>
                </div>
                <div class="rhs-card-topic__aside">
                  <div class="rhs-card-topic__views"><span>24</span></div><a href="#" title="Vraag volgen" class="rhs-card-topic__follow">Vraag volgen</a><a href="forum-item.html" title="Vraag antwoorden" class="rhs-card-topic__answers"><span>16</span> antwoorden</a>
                </div>
              </div>
            </div>
            <div class="rhs-col-md-12">
              <div class="rhs-card-topic"><a href="/profile-public.html" title="Ga naar profielpagina" class="rhs-card-topic__profile-picture"><img src="asset/image/profile-picture.png"></a>
                <div class="rhs-card-topic__content"><a href="forum-item.html" title="..." class="rhs-card-topic__title">Beëindiging van een koop- en licentieovereenkomst</a>
                  <div class="rhs-card-topic__info"><span class="rhs-hidden-mobile">Gesteld door:</span> <a href="/profile-public.html" title="Ga naar profielpagina">AiMingOei</a> 5 min geleden <span class="rhs-hidden-mobile">in</span> <a href="#" class="rhs-hidden-mobile">Inkomstenbelasting </a></div>
                  <div class="rhs-card-topic__description">DGA staat op de loonlijst en ontvangt vanuit zijn werkmaatschappij € 57.500,- bruto loon. De medewerker met het hoogste salaris in de werkmaatschappij verdient</div>
                </div>
                <div class="rhs-card-topic__aside">
                  <div class="rhs-card-topic__views"><span>24</span></div><a href="#" title="Vraag volgen" class="rhs-card-topic__follow">Vraag volgen</a><a href="forum-item.html" title="Vraag antwoorden" class="rhs-card-topic__answers"><span>16</span> antwoorden</a>
                </div>
              </div>
            </div>
            <div class="rhs-col-md-12">
              <div class="rhs-card-topic"><a href="/profile-public.html" title="Ga naar profielpagina" class="rhs-card-topic__profile-picture"><img src="asset/image/profile-picture.png"></a>
                <div class="rhs-card-topic__content"><a href="forum-item.html" title="..." class="rhs-card-topic__title">Beëindiging van een koop- en licentieovereenkomst</a>
                  <div class="rhs-card-topic__info"><span class="rhs-hidden-mobile">Gesteld door:</span> <a href="/profile-public.html" title="Ga naar profielpagina">AiMingOei</a> 5 min geleden <span class="rhs-hidden-mobile">in</span> <a href="#" class="rhs-hidden-mobile">Inkomstenbelasting </a></div>
                  <div class="rhs-card-topic__description">DGA staat op de loonlijst en ontvangt vanuit zijn werkmaatschappij € 57.500,- bruto loon. De medewerker met het hoogste salaris in de werkmaatschappij verdient</div>
                </div>
                <div class="rhs-card-topic__aside">
                  <div class="rhs-card-topic__views"><span>24</span></div><a href="#" title="Vraag volgen" class="rhs-card-topic__follow">Vraag volgen</a><a href="forum-item.html" title="Vraag antwoorden" class="rhs-card-topic__answers"><span>16</span> antwoorden</a>
                </div>
              </div>
            </div>
          </div>
          <div class="forum__pagination">
            <div class="rhs-pagination"><a href="#" title="Volgende pagina" class="rhs-pagination__previous disabled"><span class="rhs-icon-angle-left rhs-pagination__icon"></span></a>
              <form action="#" class="rhs-pagination__form">
                <input name="page-number" id="page-number" value="1" class="rhs-pagination__input"><span class="rhs-pagination__maximum">van 64</span>
              </form><a href="#" title="Volgende pagina" class="rhs-pagination__next"><span class="rhs-icon-angle-right rhs-pagination__icon"></span></a>
            </div>
          </div>
        </div>
      </div>';

echo elgg_view_page($title, $body);
?>