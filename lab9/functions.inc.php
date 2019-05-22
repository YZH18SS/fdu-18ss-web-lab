<?php

function generateLink($url, $label, $class) {
   $link = '<a href="' . $url . '" class="' . $class . '">';
   $link .= $label;
   $link .= '</a>';
   return $link;
}


function outputPostRow($number)  {
    include("travel-data.inc.php");
    echo '<li>';
   echo '<a href="detail.php?id='.$number["id"].'" class="img-responsive">';
   echo '<img src="images/square/'.$number["path"].'" alt="'.$number["title"].'">';
   echo '<div class="caption">' ;
   echo '<div class="blur"></div>';
   echo '<div class="caption-text">';
   echo '<h1>'.$number["title"].'</h1>';
   echo '</div></div></a></li>';

}

/*
  Function constructs a string containing the <img> tags necessary to display
  star images that reflect a rating out of 5
*/
function constructRating($rating) {
    $imgTags = "";
    
    // first output the gold stars
    for ($i=0; $i < $rating; $i++) {
        $imgTags .= '<img src="images/star-gold.svg" width="16" />';
    }
    
    // then fill remainder with white stars
    for ($i=$rating; $i < 5; $i++) {
        $imgTags .= '<img src="images/star-white.svg" width="16" />';
    }    
    
    return $imgTags;    
}

?>