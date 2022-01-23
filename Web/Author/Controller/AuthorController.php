<?php

namespace Web\Author\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Infrastructure\Http\Service\Htmx;
use Infrastructure\Http\Service\Req;
use Integration\Goodreads\Client\AuthorScraper;
use Service\Author\Crud\AuthorCreationService;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller {
    public function createDialog(): View {
        $goodreads_url = Req::input('goodreads_url');
        return view('author::dialog.add-author', [
            'goodreads_url' => $goodreads_url,
            'goodreads_data' => $goodreads_url === null ? [] : AuthorScraper::getDataFromAuthorURL($goodreads_url),
        ]);
    }

    public function create(): Response {
        AuthorCreationService::createAuthor(Req::input());
        return Htmx::hxRedirect('/author');
    }
}