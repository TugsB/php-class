<?php
include 'include/Post.php';

function databaseConnection(){
    $user = 'root'; //root
    $password = '';//" "
    $db  = 'tecaj';  //ime baze
    $host = 'localhost'; //localhost
    $con = "mysql:host=$host; dbname=$db";

    $pdo = new PDO($con, $user, $password);
    return $pdo;

}
function allPosts(){

    $pdo = databaseConnection();
    $structuredPosts  = FALSE;

    $query = 'SELECT posts.ID, posts.title, posts.content, posts.created, image.url, image.alt, users.name, users.surname FROM posts
        LEFT JOIN users ON users.id = posts.author
        LEFT JOIN image ON image.id = posts.image';
    $statement = $pdo->query($query);

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    if($posts){
        $structuredPosts = structurePostsArray($posts);
    }
    return $structuredPosts;

}

function getPost($id){
    $pdo = databaseConnection();
    $post  =FALSE;
    $sql = "SELECT p.ID, p.title, p.content, p.created, u.name, u.surname, i.alt, i.url, i.id as fid FROM posts p " .
        "LEFT JOIN users u ON u.id = p.author " .
        "LEFT JOIN image i ON i.id = p.image " .
        "WHERE p.ID = :id";
    $query = $pdo->prepare($sql);
    $query->execute(array(':id' => $id));

    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    if($posts) {
        return structurePost($posts);//pravilno strukturiran post;
    }
    return $post;

}

/*function RojstniDan(string $ime, string $priimek, int $Rdan = 1970){
    echo "$ime $priimek $Rdan";
}*/


/*function prosimDelaj(){
    echo 'Prosim delaj';
}*/

function podatki(){
    $pdo = databaseConnection();

    $query = 'SELECT * FROM posts
        LEFT JOIN users ON users.id = posts.author
        LEFT JOIN image ON image.id = posts.image';
    $statement = $pdo->query($query);
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    $posts = structurePostsArray($posts);
    //var_dump($posts);
}

function structurePostsArray($postsFromDb){
    $structuredPosts = [];
    //$i = 1;

    foreach ($postsFromDb as $post){

        $alt = $post['alt'] ?? '';
        $url = $post['url'] ?? '';
        $authoredBy = $post['name']. ' '.$post['surname'];
        $structuredPosts[$post['ID']] = new Post(
            $post['ID'],
            $post['title'],
            $post['content'],
            $alt,
            $url,
            $post['created'],
            $authoredBy
        );
       // $i++;
    }
    return $structuredPosts;
}

function structurePost(array $posts){
    $structuredPost = [];
    foreach ($posts as $post){
        $alt = $post['alt'] ?? '';
        $url = $post['url'] ?? '';
        $authoredBy = $post['name']. ' '.$post['surname'];
        $structuredPost = new Post(
            $post['ID'],
            $post['title'],
            $post['content'],
            $alt,
            $url,
            $post['created'],
            $authoredBy
        );

    }
    return $structuredPost;
}