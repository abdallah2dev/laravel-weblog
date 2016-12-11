<?php namespace GeneaLabs\LaravelWeblog\Http\Requests;

use GeneaLabs\LaravelWeblog\Post;

class PostUpdateRequest extends Request
{
    public function authorize() : bool
    {
        return auth()->check();
    }

    public function rules() : array
    {
        return [
            // 'title' => 'required|min:5|unique:posts,id,' . $this->get('posts'),
            // 'content' => 'sometimes|min:5',
            // 'tags' => 'sometimes|string',
        ];
    }

    public function process() : Post
    {
        $post = $this->route('post');
        $post->fill($this->except('_token', 'tags'));

        if ($this->has('tags')) {
            $post->tag(explode(',', $this->input('tags')));
        }

        $post->save();

        return $post;
    }
}
