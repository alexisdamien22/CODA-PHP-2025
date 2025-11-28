<?php
class Post
{
    private ?int $id = null;
    private array $categories = [];

    public function __construct(private string $title, private string $excerpt, private string $content, private int $author, private string $time)
    {
        
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getExcerpt() : string
    {
        return $this->excerpt;
    }

    public function setExcerpt(string $excerpt) : void
    {
        $this->excerpt = $excerpt;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function setContent(string $content) : void
    {
        $this->content = $content;
    }

    public function getAuthor() : int
    {
        return $this->author;
    }

    public function setAuthor(int $author) : void
    {
        $this->author = $author;
    }

    public function getTime() : string
    {
        return $this->time;
    }

    public function setTime(string $time) : void
    {
        $this->time = $time;
    }

    public function getCategories() : string
    {
        return $this->categories;
    }

    public function setCategories(string $categories) : void
    {
        $this->categories = $categories;
    }

    public function addCategory(Category $category) : void
    {
        $this->categories[] = $category;
    }

    public function removeCategory(Category $category) : void
    {
        foreach($this->categories as $key => $type)
    	{
    		if($type === $category)
    		{
    			unset($this->categories[$key]);
    		}
    	}
    }
}
?>