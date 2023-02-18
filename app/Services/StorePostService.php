<?php
declare(strict_types=1);

namespace App\Services;


use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Website;

class StorePostService
{
    /** @var Website $websiteModel */
    private $websiteModel;

    /** @var Post $postModel */
    private $postModel;

    /**
     * StorePostService constructor.
     */
    public function __construct(Website $website, Post $post)
    {
        $this->websiteModel = $website;
        $this->postModel = $post;
    }

    public function storePost(StorePostRequest $request)
    {
        // TODO add a rule in StorePostRequest to validate domain
        $domain = parse_url($request->domain)['host'] ?? null;
        try {
            $website = $this->websiteModel->firstOrCreate(['domain' => $domain]);
            $post = $website->posts()->create(['title' => $request->title, 'description' => $request->description ]);
        } catch (\Exception $exception) {
            abort(500);
        }
        // Next, I want to use an event that will accept the website and post model.
        // find subscribed users by the website and send them an email with a new article
        return;
    }
}
