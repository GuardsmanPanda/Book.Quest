<?php

namespace Web\Login\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Infrastructure\Http\Service\Req;
use Service\User\Service\UserFromTwitchDataService;
use Web\Login\Utility\LoginUtility;

class TwitchLoginController extends Controller {
    // Redirect to Twitch oauth2 endpoint
    public function redirect(): RedirectResponse {
        $state = Str::random(40);
        session()->put('oauth2state', $state);
        $ref = Req::header('referer', true);
        if ($ref !== null && str_starts_with($ref, env('app.url'))) {
            session()->put('oauth2ref', $ref);
        }
        $url = "https://id.twitch.tv/oauth2/authorize?client_id=" . config('app-settings.twitch_client_id') . "&state=$state&redirect_uri=" . config('app.url') . "login/twitch/callback&response_type=code&scope=user:read:email";
        return new RedirectResponse($url, 302);
    }

    // Callback from Twitch oauth2 endpoint
    public function callback(): RedirectResponse {
        $state = session()->pull('oauth2state');
        if ($state === null || $state !== Req::getString('state')) {
            abort(401, 'Invalid state');
        }
        $code = Req::getString('code');
        $url = "https://id.twitch.tv/oauth2/token?client_id=" . config('app-settings.twitch_client_id') . "&client_secret=" . config('app-settings.twitch_client_secret') . "&code=$code&grant_type=authorization_code&redirect_uri=" . config('app.url') . "login/twitch/callback";
        $response = Http::post($url);
        if ($response->failed()) {
            abort(401, 'Invalid code');
        }
        $token = $response->json()['access_token'];
        $resp = Http::withToken($token)
            ->withHeaders(['Client-ID' => config('app-settings.twitch_client_id')])
            ->get("https://api.twitch.tv/helix/users");
        if ($resp->failed()) {
            abort(401, 'Invalid token');
        }
        $user = UserFromTwitchDataService::findOrCreate($resp->json()['data'][0]);
        return LoginUtility::loginAndRedirect($user);
    }
}