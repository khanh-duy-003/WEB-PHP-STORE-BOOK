<?php

namespace App;

class Phantrang
{
    public static function word_limit($str, $limit = 10)
    {
        $str = strip_tags($str);
        while (strpos($str, '  ')) {
            $str = str_replace('  ', ' ', $str);
        }
        $array = explode(' ', $str);
        $limit = ($limit <= 0) ? count($array) : $limit;
        $limit = ($limit >= count($array)) ? count($array) : $limit;
        $a = array_slice($array, 0, $limit);
        return implode(' ', $a);
    }
    public static function pageCurrent()
    {
        $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $page = (is_numeric($page)) ? $page : 1;
        $page = ($page <= 0) ? 1 : $page;
        return $page;
    }
    public static function pageOffset($page, $limit)
    {
        return ($page - 1) * $limit;
    }
    public static function pageLinks($total, $current, $limit, $url = '')
    {
        if ($total == 0) return '';
        $numPage = floor($total / $limit);
        if (($total / $limit) - $numPage > 0) {
            $numPage += 1;
        }
        $html = "<ul class='pagination justify-content-center'>";
        if ($numPage == 1) {
            return '';
        }
        if ($current == 1) {
            $html .= "<li class='page-item'><a class='page-link'><< </a></li> ";
        } else {
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=" . ($current - 1) . "'><<</a> </li> ";
        }
        if ($current <= 3) {
            for ($i = 1; ($i <= 5) and ($i <= $numPage); $i++) {
                if ($i == $current) {
                    $html .= "<li class='page-item'><a class='page-link'>" . $i . "</a></li>";
                } else {
                    $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a></li>";
                }
            }
        } else {
            if ($numPage >= $current + 2) {
                for ($i = $current - 2; ($i <= $current + 2) and ($i <= $numPage); $i++) {
                    if ($i == $current) {
                        $html .= "<li class='page-item'><a class='page-link'>" . $i . "</a></li>";
                    } else {
                        $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a> </li> ";
                    }
                }
            } else {
                for ($i = $numPage - 4; $i <= $numPage; $i++) {
                    if ($i > 0) {
                        if ($i == $current) {
                            $html .= "<li class='page-item'><a class='page-link'>" . $i . "</a></li>";
                        } else {
                            $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a> </li> ";
                        }
                    }
                }
            }
        }
        if ($current == $numPage) {
            $html .= "<li class='page-item'><a class='page-link'>>> </a></li> ";
        } else {
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=" . ($current + 1) . "'>>></a> </li> ";
        }
        $html .= "</ul>";
        return $html;
    }
}
