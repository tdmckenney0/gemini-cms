<?php

namespace App;

use App\AbstractController;
use Models\Page;

use TitanII\Request;
use TitanII\Response;

class PagesController extends AbstractController
{
    /**
     * View a list of Pages.
     * 
     * @return Response TitanII/Response
     */
    public function index(): Response
    {
        $pages = Page::all();

        ob_start();

        require(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'index.php'); 

        $content = ob_get_clean();

        $response = new Response();

        $response->setMeta('text/gemini');
        $response->setContent($content);

        return $response;
    }

    /**
     * View a Page.
     * 
     * @param int The Page ID
     * 
     * @return Response TitanII/Response
     */
    public function view(int $id): Response
    {
        $page = Page::find($id);

        ob_start();

        require(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'view.php'); 

        $content = ob_get_clean();

        $response = new Response();

        $response->setMeta('text/gemini');
        $response->setContent($content);

        return $response;
    }
}