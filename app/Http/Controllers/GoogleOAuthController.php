<?php

namespace App\Http\Controllers;

use Google\Client as GoogleClient;
use App\Models\Club;
use App\Models\GoogleAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GoogleOAuthController extends Controller
{
    public function redirectToGoogle()
    {
        $client = $this->getClient();
        $authUrl = $client->createAuthUrl();

        return redirect($authUrl);
    }

    public function handleCallback()
    {
        $client = $this->getClient();

        $token = $client->fetchAccessTokenWithAuthCode(request('code'));

        // 🔍 Optional: refresh se manca refresh_token
        if (isset($token['error'])) {
            throw new \Exception('Errore nel token: ' . $token['error_description']);
        }

        // ✅ IMPOSTA manualmente il token
        $client->setAccessToken($token);

        // ✅ Ora hai un client valido con access_token
        $oauth = new \Google\Service\Oauth2($client);
        $googleUser = $oauth->userinfo->get(); // qui dovrebbe funzionare

        $club = auth()->user()->clubs->first();

        if ($club->google_email && $club->google_email !== $googleUser->email) {
            throw new \Exception('Devi collegare il calendario con l’indirizzo email ufficiale del club: ' . $club->google_email);
        }

        $club->googleAccount()->updateOrCreate([], [
            'email' => $googleUser->email,
            'access_token' => $token['access_token'],
            'refresh_token' => $token['refresh_token'] ?? null,
            'token_expires_at' => now()->addSeconds($token['expires_in']),
        ]);

        return redirect()->route('dashboard')->with('success', 'Google Calendar connesso!');
    }


    private function getClient(): GoogleClient
    {
        $client = new GoogleClient();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setScopes([
            'https://www.googleapis.com/auth/calendar',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile',
        ]);
        return $client;
    }
}
