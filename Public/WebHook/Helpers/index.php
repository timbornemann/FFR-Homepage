<?php
/**
 * Kategorien-Update Tool (Frontend + Logik in einer Datei)
 */
require_once __DIR__ . '/helpers.php';
// Nur auf POST-Anfragen mit korrekt gesetztem Referer/CSRF-Check reagieren (optional erweiterbar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: text/html; charset=utf-8');
    try {
        // Eingabe prüfen
        if (isset($_POST['action']) && $_POST['action'] === 'reset') {
            // Kategorien zurücksetzen
            $db = Database::getInstance();
            $conn = $db->getConnection();
            $resetCount = resetAllKategorien($conn);
            echo "<h3>Zurücksetzen abgeschlossen</h3>";
            echo "<p>Kategorien für {$resetCount} Einsätze wurden zurückgesetzt.</p>";
            exit;
        } else {
            // Normales Update
            $overwriteExisting = isset($_POST['overwriteExisting']) && $_POST['overwriteExisting'] === '1';
            // Datenbankverbindung abrufen
            $db = Database::getInstance();
            $conn = $db->getConnection();
            // Kategorien aktualisieren
            [$updatedCount, $message] = updateAllKategorien($conn, !$overwriteExisting);
            echo "<h3>Aktualisierung abgeschlossen</h3>";
            echo "<p>{$message}</p>";
            exit;
        }
    } catch (Exception $e) {
        echo "<h3>Fehler</h3>";
        echo "<p>Ein technischer Fehler ist aufgetreten. Bitte versuchen Sie es später erneut oder kontaktieren Sie den Administrator.</p>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorien Aktualisierung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.6;
        }

        h1 {
            color: #d32f2f;
            text-align: center;
        }

        .container {
            background-color: #f5f5f5;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn {
            background-color: #d32f2f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #b71c1c;
        }

        .options {
            margin: 20px 0;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 4px;
            background-color: #e8f5e9;
            display: none;
        }

        .loading {
            display: none;
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Kategorien Aktualisierung</h1>
        <div class="options">
            <form id="updateForm">
                <div>
                    <label>
                        <input type="radio" name="updateMode" value="all" checked>
                        Alle Kategorien aktualisieren (bestehende überschreiben)
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="updateMode" value="new">
                        Nur neue Kategorien hinzufügen (bestehende nicht überschreiben)
                    </label>
                </div>
                <button type="submit" class="btn">Aktualisierung starten</button>
            </form>
            <hr style="margin: 20px 0;">
            <form id="resetForm">
                <p><strong>Achtung:</strong> Diese Aktion setzt alle Kategorien zurück (auf NULL).</p>
                <button type="submit" class="btn" style="background-color: #ff5722;">Alle Kategorien zurücksetzen</button>
            </form>
        </div>
        <div class="loading" id="loading">
            <p>Aktualisierung läuft, bitte warten...</p>
        </div>
        <div class="result" id="result"></div>
    </div>
    <?php
    // Generate a unique nonce for CSP
    $webhookNonce = base64_encode(random_bytes(16));
    ?>
    <script nonce="<?php echo $webhookNonce; ?>">
        document.getElementById('updateForm').addEventListener('submit', function (e) {
            e.preventDefault();
            document.getElementById('loading').style.display = 'block';
            document.getElementById('result').style.display = 'none';
            const updateMode = document.querySelector('input[name="updateMode"]:checked').value;
            const overwriteExisting = updateMode === 'all';
            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'overwriteExisting=' + (overwriteExisting ? '1' : '0')
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('loading').style.display = 'none';
                    const resultElement = document.getElementById('result');
                    resultElement.innerHTML = data;
                    resultElement.style.display = 'block';
                })
                .catch(error => {
                    document.getElementById('loading').style.display = 'none';
                    const resultElement = document.getElementById('result');
                    resultElement.innerHTML = 'Fehler bei der Aktualisierung: ' + error;
                    resultElement.style.display = 'block';
                    resultElement.style.backgroundColor = '#ffebee';
                });
        });

        document.getElementById('resetForm').addEventListener('submit', function (e) {
            e.preventDefault();
            if (confirm('Sind Sie sicher, dass Sie alle Kategorien zurücksetzen möchten? Dies kann nicht rückgängig gemacht werden.')) {
                document.getElementById('loading').style.display = 'block';
                document.getElementById('result').style.display = 'none';
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=reset'
                })
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('loading').style.display = 'none';
                        const resultElement = document.getElementById('result');
                        resultElement.innerHTML = data;
                        resultElement.style.display = 'block';
                        resultElement.style.backgroundColor = '#fff3e0';
                    })
                    .catch(error => {
                        document.getElementById('loading').style.display = 'none';
                        const resultElement = document.getElementById('result');
                        resultElement.innerHTML = 'Fehler beim Zurücksetzen: ' + error;
                        resultElement.style.display = 'block';
                        resultElement.style.backgroundColor = '#ffebee';
                    });
            }
        });
    </script>
</body>

</html>