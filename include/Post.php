<?php

class Post {
    public string $title, $content, $alt, $url, $authoredBy;
    public int $id, $authoredOn;

    public function __construct(int $id, string $title, string $content, string $alt, string $url, int $authoredOn, string $authoredBy)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->alt = $alt;
        $this->url = $url;
        $this->authoredOn = $authoredOn;
        $this->authoredBy = $authoredBy;

    }
    function getId (){
        return $this->id;
    }
    function getTitle (){
        return $this->title;
    }
    function getAlt (){
        return $this->alt;
    }
    function getUrl (){
        return $this->url;
    }
    function getAuthoredOn (){
        return $this->authoredOn;
    }
    function getAuthoredBy (){
        return $this->authoredBy;
    }
    public function izpisiCeloto()
    {
        echo '<div class="col-sm-12">';
        if (!empty($this->url)) {
            echo '<img src="' . $this->url. '" alt="'.$this->alt.'">';
        }
        echo "<h1>{$this->title}</h1>";
        echo "<p>{$this->content}</p>";
        $date = date('d.m.Y', $this->authoredOn);
        echo "<p><small>{$date}</small>, {$this->authoredBy}</p>";
        echo '</div>';
    }

    public function izpisiOsnutek()
    {
        echo'<div class="col-sm-4">';
        if (!empty($this->url)) {
            echo '<img src="' . $this->url . '" alt="'.$this->alt.'">';
        }
        //echo' <img src="'.$post['image']['url']. '">';

        echo"<h1>{$this->title}</h1>";
        echo substr($this->content, 0, 150)."...";
        echo $this->authoredBy;
        $date= gmdate("d-m-Y", $this->authoredOn);
        echo "<p><small>{$date}</small></p>";
        echo "<a href =\"article.php?id={$this->id}\">Preberi več</a>";
        echo '</div>';
        //echo $content;
        /*$this ->private;
        echo $this->content;*/
    }

    public function izpisiNaslov()
    {
        echo $this->title;
    }
}

?>




