<?php
/**
 * Created by PhpStorm.
 * User: odranhusson
 * Date: 7/22/18
 * Time: 11:08 AM
 */

namespace App\Http\Controllers;


class serverAdminController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function askForRestart() {
        return response()->json((new \App\serverAdmin())->askForRestart());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function isHomebridgeOnline() {
        return response()->json((new \App\serverAdmin())->isHomebridgeOnline());
    }
}