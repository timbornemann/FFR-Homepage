<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/PageBuilder.php';

$page = new PageBuilder(
  title: 'Veranstaltungen & Termine | Feuerwehr Reichenbach',
  description: 'Bleiben Sie informiert über die Veranstaltungen und Termine der Freiwilligen Feuerwehr Reichenbach in Waldems. Erfahren Sie, wann unser nächstes Hähnchengrillen stattfindet oder wann unsere Übungsabende sind.',
  keywords: 'Veranstaltungen Feuerwehr Reichenbach, Feuerwehr Termine Waldems, Feuerwehr Feste, Hähnchengrillen Reichenbach, Feuerwehr Aktuelles, Nachrichten Feuerwehr, Events Feuerwehr Waldems, Freiwillige Feuerwehr Reichenbach, Waldems',
    canonicalUrl: 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    
);

// Füge den Fullscreen Hero Abschnitt hinzu
$page->addContent($page->renderFullscreenHero(
    id: 'header17-3p',
    cidSuffix: 'Hero-Veranstaltungen',
    title: 'Veranstaltungen',
    subtitle: '', // Kein Untertitel im ursprünglichen Header
    buttonText: 'Erfahre mehr!',
    buttonHref: '#article11-4q', // Link zum ersten Inhaltsblock
    jarallaxSpeed: 0.8,
    overlayOpacity: 0.5,
    overlayColor: 'rgb(0, 0, 0)',
    btnClass: 'btn-white-outline' // Passe die Button-Klasse an
));



include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/neuigkeiten.php';
// Starte Output Buffering
ob_start();

// Neuigkeiten anzeigen (wird in den Output Buffer geschrieben)
showNeuigkeiten();

// Inhalt aus dem Buffer holen und Buffer beenden
$neuigkeitenHTML = ob_get_clean();

// HTML-Wrapper + eingebettete Neuigkeiten
$page->addContent('
<section data-bs-version="5.1" class="article11 cid-ukzEavxMa7" id="article11-4q">
  <div class="container">'
    . $neuigkeitenHTML .
  '</div>
</section>
');



// Rendere die vollständige Seite inklusive Head, Includes und Scripts
echo $page->renderFullPage();

?>