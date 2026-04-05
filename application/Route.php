<?php

namespace Src;

class Route
{
    public static function route_site()
    {
        $pathView = "views/sites/";
        if(isset($_REQUEST['opt'])){ 
            $pathView.=$_REQUEST['opt']; 
            if(isset($_REQUEST['slug'])) { 
                $pathView .='-detail.php'; 
            }else { 
                if(isset($_REQUEST['cat'])) { 
                    $pathView .='-category.php'; 
                }else { 
                    $pathView .='.php'; 
                } 
            } 
        }else { 
            $pathView .= 'home.php'; 
        } 
        require_once($pathView); 
    }
    
    public static function route_admin()
    {
        $pathView ='../views/admin/'; 
        if(isset($_REQUEST['opt'])) { 
            $pathView .=$_REQUEST['opt'] . '/'; 
            if (isset($_REQUEST['cat'])) { 
                $pathView .=$_REQUEST['cat'] . '.php'; 
            } else { 
                $pathView .='index.php'; 
            } 
        }else { 
            $pathView .='dashboard/index.php'; 
        } 
        require_once($pathView);
    }
}
