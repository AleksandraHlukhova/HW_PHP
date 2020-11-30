<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Classes\Request;
use App\Models\RegisterModel;
/**
 * undocumented class
 */
class AuthController extends Controller
{
    /**
     * undocumented function summary
     * @return type
     **/
    public function login(Request $request)
    {
        // $this->setLayout('auth');
        if($request->isPost())
        {
            return 'handle submited data';
        }

        return $this->render('login');
    }

    /**
     * undocumented function summary
     * @return type
     **/
    public function register(Request $request)
    {
        // $this->setLayout('auth');
        $registerModel = new RegisterModel();
        
        if($request->isPost())
        {
            // var_dump($request->getBody());
            // exit;
            $registerModel->loadData($request->getBody());

            if($registerModel->validate() && $registerModel->register())
            {
                return 'Success';
            }
            // var_dump($registerModel->errors);
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }

        // var_dump($registerModel);
        // exit;
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}
