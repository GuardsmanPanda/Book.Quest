<?php

namespace Web\Author\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Infrastructure\Auth\Service\Auth;
use Infrastructure\Http\Service\Htmx;

class AuthorController extends Controller {
    public function show(string $url_code): View {
        $author = DB::selectOne("
            SELECT
                a.id, a.author_name, a.followers,
                au.status
            FROM author a
            LEFT JOIN author_user au on au.author_id = a.id AND au.user_id = ?
            WHERE a.author_short_url_code = ?
        ", [Auth::id(), $url_code]);
        if ($author === null) {
            Htmx::hxRedirect('/author');
        }
        return view('author::show.author', [
            'author' => $author
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
