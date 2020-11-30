<?php

namespace App\Controllers;

use App\Classes\Application;
use App\Classes\Controller;
use App\Classes\Request;
/**
 * undocumented class
 */
class SiteNavController extends Controller
{
    /**
     * undocumented function summary
     * @return type\
     **/
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        // exit;
        return 'Handling submited data';
    }

    /**
     * undocumented function summary
     * @return type\
     **/
    public function contact()
    {
        //method from Controller
        return $this->render('contact');
    }

    public function home()
    {
        $params = [
            'name' => 'John Doe'
        ];

        //method from Controller
        return $this->render('home', $params);

    }
}
