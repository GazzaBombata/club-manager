<?php

namespace App\Services;

use App\Models\Club;
use Google\Client as GoogleClient;

class GoogleCalendarService
{
public static function getClientForClub(Club $club): ?GoogleClient
{
$account = $club->googleAccount;

if (!$account) return null;

$client = new GoogleClient();
$client->setClientId(config('services.google.client_id'));
$client->setClientSecret(config('services.google.client_secret'));
$client->setAccessToken([
'access_token' => $account->access_token,
'refresh_token' => $account->refresh_token,
'expires_in' => $account->token_expires_at->diffInSeconds(now()),
]);

if ($client->isAccessTokenExpired()) {
$client->fetchAccessTokenWithRefreshToken($account->refresh_token);
$newToken = $client->getAccessToken();

$account->update([
'access_token' => $newToken['access_token'],
'token_expires_at' => now()->addSeconds($newToken['expires_in']),
]);
}

return $client;
}
}
