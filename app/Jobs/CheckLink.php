<?php

namespace App\Jobs;
use App\{App};
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Redis;

class CheckLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $frag;


    public function __construct($frag)
    {
        $this->frag = $frag;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('CheckLink')->allow(200)->every(300)->then(function () {
            // Job logic...
            $api_url = "https://store.steampowered.com/api/appdetails?appids=";
            $json = file_get_contents($api_url . $this->frag);
            $app_page = collect(json_decode($json,true));
            $data['name'] = $app_page[$this->frag]['data']['name'];
            $data['path_int'] = $this->frag;
            $data['path_slug'] = str_limit(str_slug($data['name']), 128);
            if(isset($app_page[$this->frag]['data']['short_description'])) {
                $data['description'] = $app_page[$this->frag]['data']['short_description'];
            }
            if(isset($app_page[$this->frag]['data']['pc_requirements']['minimum'])) {
                $data['pc_min_spec'] = $app_page[$this->frag]['data']['pc_requirements']['minimum'];
            }
            if(isset($app_page[$this->frag]['data']['pc_requirements']['recommended'])) {
                $data['pc_recom_spec'] = $app_page[$this->frag]['data']['pc_requirements']['recommended'];
            }
            if(isset($app_page[$this->frag]['data']['linux_requirements']['minimum'])) {
                $data['linux_min_spec'] = $app_page[$this->frag]['data']['linux_requirements']['minimum'];
            }
            if(isset($app_page[$this->frag]['data']['linux_requirements']['recommended'])) {
                $data['linux_recom_spec'] = $app_page[$this->frag]['data']['linux_requirements']['recommended'];
            }
            if($app_page[$this->frag]['data']['release_date']['coming_soon'] == false) {
                if(isset($app_page[$this->frag]['data']['release_date']['date'])) {
                    $data['release_date'] = $app_page[$this->frag]['data']['release_date']['date'];
                }
            } else {
                $data['release_date'] = "Coming soon";
            }
            $app = App::create($data);
        }, function () {
            // Could not obtain lock...
        
            return $this->release(10);
        });
    }
}
