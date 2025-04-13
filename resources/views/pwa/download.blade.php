<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Scarica l'app Clubberly</title>
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0f766e">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Aggiungi anche questo per forzare l’install prompt --}}
    <script>
        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            document.getElementById('install-button').style.display = 'block';
        });

        function installApp() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                    }
                    deferredPrompt = null;
                });
            }
        }
    </script>
</head>
<body style="font-family: sans-serif; padding: 2rem;">
<h1>Installa Clubberly sul tuo dispositivo</h1>

<p>Per un accesso più veloce, puoi installare l'app direttamente sul tuo telefono come se fosse un'app nativa.</p>

<button id="install-button" onclick="installApp()" style="display: none; padding: 1rem; font-size: 1rem; background: #0f766e; color: white; border: none; border-radius: 8px;">
    Installa l'app
</button>

<p style="margin-top: 2rem;">
    Se non vedi il pulsante, tocca il menu del tuo browser e scegli "Aggiungi alla schermata Home".
</p>

<script src="/js/service-worker-register.js"></script>
</body>
</html>
