<?php declare(strict_types=1);

namespace Integration\GoogleBooks\Client;

use Illuminate\Support\Facades\Http;

final class GoogleBooksClient {
    /**
     * @param string $id
     * @return array<string, mixed>
     */
    public static function lookupBook(string $id): array {
        $resp = Http::get("https://www.googleapis.com/books/v1/volumes/" . $id)->json();
        $vol = $resp['volumeInfo'];
        $tmp = [
            'google_books_id' => $resp['id'],
            'book_title' => $vol['title'] ?? '',
            'page_count' => $vol['pageCount'] ?? 0,
            'maturity' => $vol['maturityRating'] ?? 'NOT_MATURE',
            'book_description_html' => $vol['description'] ?? '',
        ];
        foreach ($vol['industryIdentifiers'] ?? [] as $ident) {
            if ($ident['type'] === 'ISBN_10') {
                $tmp['isbn_10'] = $ident['identifier'];
            }
            if ($ident['type'] === 'ISBN_13') {
                $tmp['isbn_13'] = $ident['identifier'];
            }
        }
        return $tmp;
    }

    /**
     * @param string $query
     * @return array<int, array<string,string>>
     */
    public static function searchBook(string $query): array {
        $query = urlencode($query);
        $resp = Http::get("https://www.googleapis.com/books/v1/volumes?q=$query&showPreorders=true&langRestrict=en")->json();
        $result = [];
        foreach ($resp['items'] as $res) {
            $vol = $res['volumeInfo'];
            $tmp = [
                'id' => $res['id'],
                'title' => $vol['title'],
                'subtitle' => $vol['subtitle'] ?? ''
            ];
            $result[] = $tmp;
        }
        return $result;
    }
}
