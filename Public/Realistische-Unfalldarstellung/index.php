<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/PageBuilder.php';

$page = new PageBuilder(
    title: 'Realistische Unfalldarstellung (RUD) | Feuerwehr Reichenbach',
    description: 'Die RUD-Gruppe der Freiwilligen Feuerwehr Reichenbach in Waldems bietet realistische Unfallsimulationen für Feuerwehren und Hilfsorganisationen im Rheingau-Taunus-Kreis und darüber hinaus zur optimalen Einsatzvorbereitung.',
    keywords: 'Realistische Unfalldarstellung, RUD, Feuerwehr Training, Notfalldarstellung, Verletzungsdarstellung, Feuerwehr Übung, Erste Hilfe Training, Feuerwehr Reichenbach, Waldems, Rheingau-Taunus-Kreis, Hilfsorganisationen Training, Rettungsdienst Training, Unfallsimulation',
    canonicalUrl: 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    
);

$page->addContent('<div class="page-content">');

// Füge den Fullscreen Hero Abschnitt hinzu
$page->addContent($page->renderFullscreenHero(
    id: 'header17-3a',
    cidSuffix: 'Hero-RUD',
    title: 'Realistische Unfalldarstellung',
    subtitle: '', // Kein Untertitel im ursprünglichen Header
    buttonText: 'Erfahre mehr!',
    buttonHref: '#image08-3b', // Link zum ersten Inhaltsblock
    jarallaxSpeed: 0.8,
    overlayOpacity: 0.5,
    overlayColor: 'rgb(0, 0, 0)',
    btnClass: 'btn-white-outline' // Passe die Button-Klasse an
));

// Füge den Abschnitt "R(ealistische)U(nfall)D(arstellung)" (Bild rechts, Text links) hinzu
$page->addContent($page->renderImageInfoBlock(
    id: 'image08-3b',
    cidSuffix: 'Image-Info-Image-Right',
    title: 'R(ealistische)U(nfall)D(arstellung)',
    subtitle: 'Um für Einsätze gewappnet zu sein, üben unsere Einsatzkräfte selbstverständlich regelmäßig. Damit dies möglichst realitätsnah ist, haben wir vor einigen Jahren unsere R(ealistische)U(nfall)D(arstellungs)-Gruppe gegründet.',
    imageSrc: '../assets/images/img20240706082638-1.webp',
    imageAlt: 'Realistische Unfalldarstellung Training' // Füge einen beschreibenden Alt-Text hinzu
));

// Füge den Call-to-Action Banner (Parallax) mit Untertitel hinzu
$page->addContent($page->renderCTAHeaderTextButtonBanner(
    id: 'header14-56',
    cidSuffix: 'CTA-RUD',
    title: 'Bereit für realistische Einsätze?',
    text: 'Unsere RUD-Gruppe bietet Ihnen die Möglichkeit, realistische Trainingsszenarien zu erleben, die Ihre Einsatzkräfte optimal vorbereiten.', // Verwende den Textparameter für den Untertitel
    buttonLabel: 'Jetzt Kontakt aufnehmen',
    buttonHref: '#image08-55',
    buttonClass: 'btn-primary'
    // Parallax background und Overlay werden durch die Methode gehandhabt
));

// Füge den Abschnitt "Für authentisches Training" (Bild rechts, Text links) hinzu
$page->addContent($page->renderImageInfoBlock(
    id: 'image08-3c',
    cidSuffix: 'Image-Info-Image-Left',
    title: 'Für authentisches Training',
    subtitle: 'Die RUD-Gruppe schminkt unterschiedliche Arten von Wunden und mimt Betroffene, sodass die Einsatzkräfte unter fast realen Einsatzbedingungen lernen, richtig zu reagieren.<div><br></div>', // Behalte die Zeilenumbrüche bei
    imageSrc: '../assets/images/img-20231117-wa0015.webp',
    imageAlt: 'RUD-Gruppe schminkt Wunden' // Füge einen beschreibenden Alt-Text hinzu
));

// Füge den Abschnitt "Einsatzbereitschaft über Reichenbach hinaus" (Bild rechts, Text links) hinzu
$page->addContent($page->renderImageInfoBlock(
    id: 'image08-3d',
    cidSuffix: 'Image-Info-Image-Right',
    title: 'Einsatzbereitschaft über Reichenbach hinaus',
    subtitle: '<div>Mittlerweile ist unser Team nicht nur für die Fw Reichenbach im Einsatz, sondern ist überall bei unterschiedlichen Hilfsorganisationen oder auch für den RTK im Einsatz.</div>', // Behalte die div-Struktur bei
    imageSrc: '../assets/images/img20240706125716.webp',
    imageAlt: 'RUD-Gruppe bei einem Einsatz' // Füge einen beschreibenden Alt-Text hinzu
));

// Füge den Abschnitt "Wir unterstützen Ihre Übungen" (Bild rechts, Text links) mit E-Mail-Link hinzu
$page->addContent($page->renderImageInfoBlock(
    id: 'image08-55',
    cidSuffix: 'Image-Info-Image-Left',
    title: 'Wir unterstützen Ihre Übungen',
    subtitle: '<div><span style="font-size: 1.4rem;">Solltet ihr Interesse daran haben, eine Übung realistisch zu planen und durchzuführen, könnt ihr euch gerne&nbsp;an&nbsp;uns&nbsp;wenden.</span></div><br><div><span style="font-size: 1.4rem;"><em><a style="color: #007bff;" href="mailto:rud@feuerwehr-waldems-reichenbach.de">ru<!--|-->d@fe<!--|--><!--|-->uerwehr-<!--|--><!--|-->wal<!--|-->dem<!--|-->s-re<!--|-->iche<!--|-->nb<!--|-->ach<!--|-->.de</a></em><br></span><br></div>', // Behalte die HTML-Struktur bei
    imageSrc: '../assets/images/img20240825115127.webp',
    imageAlt: 'RUD-Gruppe Kontakt' // Füge einen beschreibenden Alt-Text hinzu
));

// Füge die Galerie mit Lightbox anstelle des Sliders hinzu
$page->addContent($page->renderGalleryWithLightbox(
    id: 'gallery01-5b', // Verwende eine passende ID für die Galerie mit Lightbox
    cidSuffix: 'Image-Gallery-Grid-With-Modal', // Behalte das ursprüngliche CID-Suffix bei
    title: 'Sieht echt aus, ist es aber nicht!', // Füge einen Titel für die Galerie hinzu
    images: [
        ['src' => '../assets/images/img20240706082638-1.webp', 'alt' => 'RUD Demonstration Bild 1'],
        ['src' => '../assets/images/img20240706125716.webp', 'alt' => 'RUD Demonstration Bild 2'],
        ['src' => '../assets/images/img20241115183014.webp', 'alt' => 'RUD Demonstration Bild 3'],
        ['src' => '../assets/images/img20240706091207.webp', 'alt' => 'RUD Demonstration Bild 4'],
        ['src' => '../assets/images/img20241115183225.webp', 'alt' => 'RUD Demonstration Bild 5'],
        ['src' => '../assets/images/img20241115171343.webp', 'alt' => 'RUD Demonstration Bild 6'],
        ['src' => '../assets/images/img20240825112331.webp', 'alt' => 'RUD Demonstration Bild 7'],
        ['src' => '../assets/images/img20240825115142.webp', 'alt' => 'RUD Demonstration Bild 8'],
        ['src' => '../assets/images/img-20231117-wa0009.webp', 'alt' => 'RUD Demonstration Bild 9'],
        ['src' => '../assets/images/jf770-o1coi.webp', 'alt' => 'RUD Demonstration Bild 10'],
        ['src' => '../assets/images/IMG-20231117-WA0005.webp', 'alt' => 'RUD Demonstration Bild 11'],
        ['src' => '../assets/images/IMG-20231117-WA0007.webp', 'alt' => 'RUD Demonstration Bild 12'],
        ['src' => '../assets/images/IMG-20240706-WA0059.webp', 'alt' => 'RUD Demonstration Bild 13'],
        ['src' => '../assets/images/IMG-20240706-WA0075.webp', 'alt' => 'RUD Demonstration Bild 14'],
        ['src' => '../assets/images/IMG20240706080125.webp', 'alt' => 'RUD Demonstration Bild 15'],
        ['src' => '../assets/images/IMG20240706091034.webp', 'alt' => 'RUD Demonstration Bild 16'],
        ['src' => '../assets/images/IMG20240825115200.webp', 'alt' => 'RUD Demonstration Bild 17'],
        ['src' => '../assets/images/IMG20240922151125.webp', 'alt' => 'RUD Demonstration Bild 18'],
        ['src' => '../assets/images/IMG20240929101545.webp', 'alt' => 'RUD Demonstration Bild 19'],
        ['src' => '../assets/images/IMG20240929105230.webp', 'alt' => 'RUD Demonstration Bild 20'],

    ]
));

$page->addContent('</div>');


$page->addContent(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/warningModal.php'));

$page->addStyle('assets/gallery/style.css');
// Rendere die vollständige Seite inklusive Head, Includes und Scripts
echo $page->renderFullPage();



?>