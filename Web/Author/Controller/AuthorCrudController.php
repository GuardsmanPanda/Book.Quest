<?php declare(strict_types=1);

namespace Web\Author\Controller;

use Domain\Author\Crud\AuthorCreator;
use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Htmx;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Integration\Goodreads\Client\GoodreadsClient;
use Symfony\Component\HttpFoundation\Response;

class AuthorCrudController extends Controller {
    public function createDialog(): View {
        $goodreads_uri = Req::has('goodreads_uri') ? Req::getString('goodreads_uri') : null;
        return view('author::create.create-author', [
            'goodreads_uri' => $goodreads_uri,
            'goodreads_data' => $goodreads_uri === null ? [] : GoodreadsClient::getDataFromAuthorURL($goodreads_uri),
        ]);
    }

    public function create(): Response {
        $author = AuthorCreator::create(
            author_name: Req::getString('author_name'),
            birth_date: Req::getDate('birth_Date'),
            birth_country_iso2_code: Req::getString('birth_country_iso2_code'),
            death_date: Req::getDate('death_date'),
            primary_language_iso2_code: Req::getString('primary_language_iso2_code'),
        );
        return Htmx::redirect("/author/details/$author->author_short_url_code/$author->author_slug");
    }

    public function update(Author $author): View {
        return view('author::update.update-author', [
            'author' => $author,
        ]);
    }
}