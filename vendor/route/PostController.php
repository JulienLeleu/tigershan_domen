<?php

namespace Posts\Controller;


class PostsController
{
    public function show($slug,$id,$page = 1){
        echo "Je suis l'article N:$id ayant pour titre $slug et je suis a la page $page";
    }
}
?>
