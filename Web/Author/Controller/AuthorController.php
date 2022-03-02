<?php

namespace Web\Author\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Infrastructure\Http\Service\Htmx;

class AuthorController extends Controller {
    public function show(string $url_code): View {
        $data = DB::selectOne("
            SELECT
                a.author_name
            FROM author a
            WHERE a.author_short_url_code = ?
        ", [$url_code]);
        if ($data === null) {
            Htmx::hxRedirect('/author');
        }
        return view('author::show.author', [
            'data' => $data
        ]);
    }

    public function random(): View {
        $res = DB::selectOne("
            SELECT
                a.author_short_url_code, a.author_slug
            FROM author a
            ORDER BY random()
            LIMIT 1
        ");
        Htmx::pushUrl("/author/show/$res->author_short_url_code/$res->author_slug");
        return $this->show($res->author_short_url_code);
    }
}
