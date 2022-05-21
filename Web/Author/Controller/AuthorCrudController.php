<?php

namespace Web\Author\Controller;

use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Service\Req;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Infrastructure\Http\Service\Htmx;
use Integration\Goodreads\Client\AuthorScraper;
use Service\Author\Crud\AuthorCreationService;
use Symfony\Component\HttpFoundation\Response;

class AuthorCrudController extends Controller {
    public function createDialog(): View {
        $goodreads_uri = Req::has('goodreads_uri') ? Req::getString('goodreads_uri') : null;
        return view('author::create.create-author', [
            'goodreads_uri' => $goodreads_uri,
            'goodreads_data' => $goodreads_uri === null ? [] : AuthorScraper::getDataFromAuthorURL($goodreads_uri),
        ]);
    }

    public function create(): Response {
        AuthorCreationService::createFromRequest();
        return Htmx::hxRedirect('/author');
    }

    public function update(Author $author): View {
        return view('author::update.update-author', [
            'author' => $author,
        ]);
    }
}