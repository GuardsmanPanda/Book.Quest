<?php

namespace Web\Author\Controller;

use Domain\Author\Enum\AuthorUserStatus;
use Domain\Author\Model\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Infrastructure\Auth\Service\Auth;
use Infrastructure\Http\Service\Htmx;
use Infrastructure\Http\Service\Req;
use Service\Author\Crud\AuthorUserCrudService;

class AuthorController extends Controller {
    public function show(string $url_code): View {
        $author = DB::selectOne("
            SELECT
                a.id, a.author_name, a.followers, a.birth_year, a.birth_date, a.death_date,
                au.status,
                ( SELECT COUNT(*)
                    FROM author_user
                    WHERE author_id = a.id AND au.status ='FOLLOW'
                ) AS follow_count
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


    public function userStatus(Author $author): View {
        $status = AuthorUserStatus::from(Req::getString('status'));
        AuthorUserCrudService::crud($author, $status);
        return view('author::show.author-follow-button', [
            'author_id' => $author->id,
            'status' => $status->value,
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
