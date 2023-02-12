<?php declare(strict_types=1);

namespace Web\Series\Controller;

use Domain\Universe\Model\Universe;
use GuardsmanPanda\Larabear\Service\Req;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Infrastructure\Http\Service\Htmx;
use Service\Series\Crud\SeriesCrud;
use Symfony\Component\HttpFoundation\Response;

final class SeriesCreationController extends Controller {
    public function createDialog(): View {
        return view('series::create.create-series');
    }

    public function universeSearch(): View {
        $search = Req::getString('universe_search');
        $result = DB::select("
            SELECT u.id, u.universe_name, u.world_type
            FROM universe u
            WHERE u.universe_name ILIKE ?
            ORDER BY u.universe_name LIMIT 10
        ", ['%'.$search.'%']);
        return view('series::create.universe-search', ['result' => $result]);
    }

    public function universeSearchResult(Universe $universe): View {
        return view('series::create.universe-search-result', ['universe' => $universe]);
    }

    public function create(): Response {
        $series = SeriesCrud::createFromRequest();
        return Htmx::hxRedirect('/series/show/' . $series->series_short_url_code . '/' . $series->series_slug);
    }
}
