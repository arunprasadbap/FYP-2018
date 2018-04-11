<?php

function pagination($page,$limit,$adjacents,$total_pages,$targetpage,$k){
    if ($page == 0)
        $page = 1;                                              //if no page var is given, default to 1.
        $prev = $page - 1;                                      //previous page is page - 1
        $next = $page + 1;                                      //next page is page + 1
        $lastpage = ceil($total_pages / $limit);                //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;
    /*end of setup page var for display*/

    $pagination = "";

    if ($lastpage > 1) {
        $pagination .= "<ul class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination.= "<li><a href=\"$targetpage?page=$prev&limit=$limit\"><i class=\"fa fa-chevron-left\"></i></a></li>";
        else
            $pagination.= "<li class=\"disabled\"><a href=\"#\"><i class=\"fa fa-chevron-left\"></i></a></li>";

        //pages
        if ($lastpage < 7 + ($adjacents * 2)) {        //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li class=\"active\"><span class=\"\">$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?k=$k&page=$counter&limit=$limit\">$counter</a></li>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) {        //enough pages to hide some
            //close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li class=\"active\"><span class=\"\">$counter</span></li>";
                    else
                        $pagination.= "<li><a href=\"$targetpage?k=$k&page=$counter&limit=$limit\">$counter</a></li>";
                }
                $pagination.= "<li><a href=\"#\">...</a></li>";
                $pagination.= "<li><a href=\"$targetpage?k=$k&page=$lpm1&limit=$limit\">$lpm1</a></li>";
                $pagination.= "<li><a href=\"$targetpage?k=$k&page=$lastpage&limit=$limit\">$lastpage</a></li>";
            }
            //in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li><a href=\"$targetpage?k=$k&page=1&limit=$limit\">1</a></li>";
                $pagination.= "<li><a href=\"$targetpage?k=$k&page=2&limit=$limit\">2</a></li>";
                $pagination.= "<li><a href=\"#\">...</a></li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li class=\"active\"><span class=\"\">$counter</span></li>";
                    else
                        $pagination.= "<li><a href=\"$targetpage?k=$k&page=$counter&limit=$limit\">$counter</a></li>";
                }
                $pagination.= "<li><a href=\"#\">...</a></li>";
                $pagination.= "<li><a href=\"$targetpage?k=$k&page=$lpm1&limit=$limit\">$lpm1</a></li>";
                $pagination.= "<li><a href=\"$targetpage?k=$k&page=$lastpage&limit=$limit\">$lastpage</a></li>";
            }
            //close to end; only hide early pages
            else {
                $pagination.= "<li><a href=\"$targetpage?k=$k&page=1&limit=$limit\">1</a></li>";
                $pagination.= "<li><a href=\"$targetpage?k=$k&page=2&limit=$limit\">2</a></li>";
                $pagination.= "<li><a href=\"#\">...</a></li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li class=\"active\"><span class=\"\">$counter</span></li>";
                    else
                        $pagination.= "<li><a href=\"$targetpage?k=$k&page=$counter&limit=$limit\">$counter</a></li>";
                }
            }
        }
        //next button
        if ($page < $counter - 1)
            $pagination.= "<li><a href=\"$targetpage?k=$k&page=$next&limit=$limit\"><i class=\"fa fa-chevron-right\"></i></a></li>";
        else
            $pagination.= "<li class=\"disabled\"><a href=\"#\"><i class=\"fa fa-chevron-right\"></i></a></li>";
        $pagination.= "</ul>\n";

        return $pagination;
    }
}

?>
