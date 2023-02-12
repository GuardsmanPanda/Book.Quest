<?php declare(strict_types=1);

namespace Web\Author\Controller;

use Domain\Author\Crud\AuthorCreator;
use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Htmx;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Resp;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Integration\Goodreads\Client\GoodreadsClient;
use Symfony\Component\HttpFoundation\Response;

final class AuthorCrudController extends Controller {
    public function createDialog(): View {
        $goodreads_uri = Req::getString(key: 'goodreads_uri', defaultIfMissing: null);
        return Resp::view(view: 'author::author-create-dialog', data: [
            'goodreads_uri' => $goodreads_uri,
            'goodreads_data' => $goodreads_uri === null ? [] : GoodreadsClient::getDataFromAuthorURL(url: $goodreads_uri),
        ]);
    }

    public function create(): Response {
        $author = AuthorCreator::create(
            author_name: Req::getString(key: 'author_name'),
            birth_date: Req::getDate(key: 'birth_Date'),
            birth_country_iso2_code: Req::getString(key: 'birth_country_iso2_code'),
            death_date: Req::getDate(key: 'death_date'),
            primary_language_iso2_code: Req::getString(key: 'primary_language_iso2_code'),
        );
        return Htmx::redirect(url: "/author/details/$author->author_short_url_code/$author->author_slug");
    }

    public function update(Author $author): View {
        return Resp::view(view: 'author::update.update-author', data: [
            'author' => $author,
        ]);
    }
}
