<?php

namespace App\Controllers;

use App\Models\Page;

use TitanII\Request;
use TitanII\Response;

class PagesController extends AbstractController
{
    /**
     * Fields to Expose for CRUD. 
     */
    const FIELDS_TO_EXPOSE = [
        'slug' => "URL Slug", 
        'title' => "Page Title", 
        'body' => "Page Body"
    ];

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
     * `
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

    /**
     * Create a Page in the CMS. 
     * 
     * @param string Action. 
     * 
     * @return Response TitanII/Response
     */
    public function add(?string $action = null): Response
    {
        if (empty($_SESSION['Page']) || !($_SESSION['Page'] instanceof Page)) {
            $_SESSION['Page'] = new Page;
        }

        $page = $_SESSION['Page'];
        $fields = self::FIELDS_TO_EXPOSE;
        $query = $this->request->getQuery();

        $response = new Response();

        if (!empty($action)) {
            if (array_key_exists($action, $fields)) {
                if (!empty($query)) {
                    // Process Input`
                    $_SESSION['Page']->{$action} = urldecode($query);
                } else {
                    // No Input, so prompt for it. 
                    $response->setCode(10);
                    $response->setContent($fields[$action]);

                    return $response;
                }
            } else {
                switch ($action) {
                    case "save":
                        if ($_SESSION['Page']->save()) {
                            
                            $response->setCode(30);
                            $response->setMeta('/view/' . $_SESSION['Page']->id);

                            $_SESSION['Page'] = null;
                        } else {
                            $response->setCode(30);
                            $response->setContent("Could not save Page!");
                        }
                        break;
                    default:
                        $response->setCode(30);
                        $response->setMeta('/add');
                        break;
                }

                return $response;
            }      
        }

        ob_start();

        require(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'add.php'); 

        $content = ob_get_clean();

        $response->setMeta('text/gemini');
        $response->setContent($content);

        return $response;
    }
}