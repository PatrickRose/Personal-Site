<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 18/04/14
 * Time: 22:14
 */

class Blog extends Eloquent {

    protected $fillable = array("title", "content");

    public function makeSlug() {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($this->title));
        $count = Blog::where("slug", "LIKE", $slug)->count();
        if ($count != 0) {
            $count += 1;
            $slug .= "-{$count}";
        }
        return $slug;
    }

    public function getFirstParagraph() {
        $content = $this->content;
        return substr($content, 0, strpos($content, "\n", strpos($content, "\n\n") + 2)) ? : $content;
    }

    public function tags() {
        return $this->belongsToMany("Tag");
    }

    public function getTags() {
        $temp = [];
        foreach($this->tags as $tag) {
            $temp[] = $tag->tag;
        };
        return implode(", ", $temp);
    }

} 