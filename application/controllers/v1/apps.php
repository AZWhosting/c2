<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
* name: applications
*
*
*/

require APPPATH.'/libraries/REST_Controller.php';

    class Apps extends REST_Controller 
    {
        function __construct()
        {
            parent::__construct();
            // get user id from header
            $uid = $this->input->get_request_header('Uid');
            if(!isset($uid) || $uid == 0 || $uid == " ") {
                $this->json('could not find user identification in the header', 500);
            }
            $user = new User();
            $user->select('role');
            $user->where('id', $uid);
            $user->get();
            if($user->exists() && $user->role != 1)
            {
                $this->json('No sufficient previledge to access', 500);
            }
        }

        public function index_get($id = NULL)
        {
            $filter 	= $this->get("filter");
            $page 		= $this->get('page') == TRUE ? $this->get('page'): 1;
            $limit 		= $this->get('limit') == TRUE ? $this->get('limit'): 50;
            $sort 	 	= $this->get("sort");
            $modules    = NULL;
            $data       = array();
            $timeLapse  = NULL;
            $this->benchmark->mark('query_start');
            $modules = new Module();
            if(isset($id)) 
            {
                $modules->where('id', $id);   
            }
            $modules->where('is_core', 'false');
            $modules->get_paged_iterated($page, $limit);
            foreach($modules as $app)
            {
                $contact = $app->user->select('id', 'first_name', 'last_name')->get();
                $data[] = array(
                    'id' => $app->id,
                    'name' => $app->name,
                    'summary' => $app->summary,
                    'discription' => $app->description,
                    'image' => $app->image_url,
                    'home' => base_url()."$app->href",
                    'url' => base_url()."v1/apps/index/{$app->id}",
                    'developer' => array(
                        'id' => $contact->id,
                        'name' => $contact->first_name. ' ' .$app->last_name,
                        'url' => base_url().'contact/index/'.$contact->id
                    )
                );
            }
            $this->benchmark->mark('query_end');
            $result = array(
                'results'   => $data,
                'totalRow'  => $modules->paged->total_rows,
                'totalPage' => $modules->paged->total_pages,
                'numberOnPage' => $modules->paged->items_on_page,
                'timeLapse' => $this->benchmark->elapsed_time('query_start', 'query_end')
            );
            $this->json($result, 200);       
        }

        public function images_get($moduleId = NULL)
        {
            $data       = array();
            $timeLapse  = NULL;

            $this->benchmark->mark('query_start');
            $images = new Module_image();
            $images->where('module_id', $moduleId);
            $images->get_iterated();

            if($images->exists())
            {
                foreach($images as $image)
                {
                    $data[] = array(
                        'url' => $image->url
                    );
                }
                $this->benchmark->mark('query_end');
                $result = array(
                    'results'   => $data,
                    'totalRow'  => count($data),
                    'timeLapse' => $this->benchmark->elapsed_time('query_start', 'query_end')
                );
                $this->json($result, 200);
            }
            else
            {
                $this->json("no images found", 404);
            }
        }

        protected function json($data, $httpCode)
        {
            $this->response($data, $httpCode);
        }
    }