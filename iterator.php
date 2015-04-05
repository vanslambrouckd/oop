<?php

class Post
{
    private $title;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    private $content;

    function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }
}

class Posts implements Iterator
{
    private $posts = [];

    public function __construct(Array $posts)
    {
        $this->posts = $posts;
    }

    public function current()
    {
        return current($this->posts);

    }

    public function next()
    {
        return next($this->posts);

    }

    public function key()
    {
        return key($this->posts);
    }

    public function valid()
    {
        $key = key($this->posts);

        return ($key !== false && $key !== null);
    }

    public function rewind()
    {
        reset($this->posts);
    }
}

$arrPosts = [];
for ($x = 1; $x < 10; $x++){
    $arrPosts[$x] = new Post('Post '.$x, 'Content '.$x);
}

$posts = new Posts($arrPosts);
foreach($posts as $post) {
    echo $post->getTitle();
    echo '<br />';
    echo $post->getContent();
    echo '<hr />';
}