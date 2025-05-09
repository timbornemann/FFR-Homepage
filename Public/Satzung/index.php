<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/PageBuilder.php';

$page = new PageBuilder(
    title: 'Satzungen | Feuerwehr Reichenbach',
    description: 'Laden Sie hier die aktuellen Satzungen der Freiwilligen Feuerwehr Waldems und des Fördervereins der Freiwilligen Feuerwehr Reichenbach herunter.',
    keywords: 'Satzungen Feuerwehr, Feuerwehr Satzung Waldems, Satzung Förderverein Feuerwehr, Downloads Satzungen, Feuerwehr Reichenbach, Waldems, Vereinssatzung, Feuerwehrrecht, Dokumente Feuerwehr Reichenbach',
    canonicalUrl: 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    
);

// Füge das Navbar Include hinzu (obwohl renderFullPage dies standardmäßig tut, fügen wir es hier hinzu,
// um der Struktur des Original-HTML im Body zu entsprechen)
// $page->addContent($page->renderInclude('../assets/includes/navbar.php')); // renderFullPage handles this

// Füge den Abschnitt für die Satzungen (Titel, Beschreibung, Download-Karten) hinzu
$page->addContent($page->renderDocumentDownloadCards(
    id: 'content5-1',
    cidSuffix: 'Download-Cards',
    title: 'Satzungen',
    description: 'Hier finden Sie die aktuellen Satzungen zum Download:',
    documents: [
        [
            'title' => 'Feuerwehr Satzung',
            'description' => 'Feuerwehr Satzung nach GVE vom 16.09.2024 Waldems',
            'href' => '/assets/files/FW_Satzung_nach-GVE_16.09.2024_Waldems.pdf',
            'button' => 'Herunterladen',
        ],
        [
            'title' => 'Förderverein Satzung',
            'description' => 'Vereinssatzung des Fördervereins der Freiwilligen Feuerwehr',
            'href' => '/assets/files/Vereinssatzung des Fördervereins der Freiwilligen Feuerwehr .pdf',
            'button' => 'Herunterladen',
        ],
    ],
    // Lasse textColorClass weg, da der Standardtext im Original-HTML weiß ist und
    // die Methode dies handhaben sollte oder Bootstrap-Klassen verwendet werden.
    // Prüfe die Methode, um sicherzustellen, dass 'text-white' korrekt angewendet wird,
    // oder entferne es, wenn es nicht als Parameter unterstützt wird.
    // Die Methode renderDocumentDownloadCards hat textColorClass als Parameter.
    textColorClass: 'text-white' // Passe die Textfarbe an das Original an
));

// Füge die Footer Includes hinzu (renderFullPage handhabt diese standardmäßig)
// $page->addContent($page->renderInclude('../assets/includes/socialFooter.php'));
// $page->addContent($page->renderInclude('../assets/includes/footer.php'));

// Rendere die vollständige Seite inklusive Head, Includes und Scripts
echo $page->renderFullPage();

?>