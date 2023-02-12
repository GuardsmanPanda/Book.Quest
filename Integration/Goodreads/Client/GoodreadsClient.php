<?php declare(strict_types=1);

namespace Integration\Goodreads\Client;

use Carbon\Carbon;
use DOMDocument;
use Illuminate\Support\Facades\Http;

final class GoodreadsClient {
    /**
     * @param string $url
     * @return array<string, string>
     */
    public static function getDataFromAuthorURL(string $url): array {
        $res = [];
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML(Http::get($url)->body());
        foreach ($doc->getElementsByTagName('span') as $span) {
            if ($span->getAttribute('itemprop') === 'name') {
                $res['author_name'] = trim($span->textContent);
                break;
            }
        }
        foreach ($doc->getElementsByTagName('div') as $span) {
            if ($span->getAttribute('itemprop') === 'birthDate') {
                $res['birth_date'] = Carbon::parse(trim($span->textContent))->format('Y-m-d');
            }
            if ($span->getAttribute('itemprop') === 'deathDate') {
                $res['death_date'] = Carbon::parse(trim($span->textContent))->format('Y-m-d');
            }
        }
        return $res;
    }
}
