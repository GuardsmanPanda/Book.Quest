<?php

namespace Web\Author\Controller;

use Domain\Author\Enum\AuthorUserStatus;
use Domain\Author\Model\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Infrastructure\Auth\Service\Auth;
use Infrastructure\Http\Middleware\Initiate;
use Infrastructure\Http\Service\Htmx;
use Infrastructure\Http\Service\Req;
use Service\Author\Crud\AuthorUserCrudService;

class AuthorController extends Controller {
    public function show(string $url_code): View {
        if ($url_code === '0') {
            Initiate::$headers['X-Clacks-Overhead'] = 'GNU Terry Pratchett';
        }
        $author = DB::selectOne("
            SELECT
                a.id, a.author_name, a.followers, a.birth_year, a.birth_date, a.death_date,
                c.country_name, l.language_name,
                au.status,
                ( SELECT COUNT(*)
                    FROM author_user
                    WHERE author_id = a.id AND au.status ='FOLLOW'
                ) AS follow_count
            FROM author a
            LEFT JOIN author_user au on au.author_id = a.id AND au.user_id = ?
            LEFT JOIN country c on a.birth_country_id = c.id
            LEFT JOIN language l on l.id = a.primary_language_id
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
