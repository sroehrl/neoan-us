<?php
/* Generated by neoan3-cli */

namespace Neoan3\Components;

use Neoan3\Apps\Curl;
use Neoan3\Core\Unicore;
use Neoan3\Frame\Neoan3;

class Home extends Unicore
{
    private $gitHubActivity;
    private $totalGithubRepos;

    function init()
    {
        $this->uni('neoan3')
//             ->callback($this, 'youTube')
             ->callback($this, 'gitHub')
             ->hook('header', 'header')
             ->hook('main', 'home', [
                 'gitHub' => $this->gitHubActivity,
                 'gitHubCount' => $this->totalGithubRepos
             ])
             ->output();
    }

    function gitHub(Neoan3 $uni)
    {
        $token = $uni->getCredentials('github');

        $repos = Curl::get('https://api.github.com/search/repositories', ['q' => 'user:sroehrl'], $token, 'token');

        $this->totalGithubRepos = $repos['total_count'];

        $this->gitHubActivity = Curl::get('https://api.github.com/users/sroehrl/events', [], $token, 'token');

        foreach ($this->gitHubActivity as $i => $activity) {
            $this->gitHubActivity[$i]['created'] = substr($activity['created_at'], 0, 10);
        }

    }


}
