<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
* name: Institute
*
*
*/

require APPPATH.'/libraries/REST_Controller.php';

    class Entities extends REST_Controller
    {
        protected $user = NULL;
        protected $inst = NULL;
        function __construct()
        {
            parent::__construct();
            // todo
            // add authorization
        }

         public function index_get($id = NULL, $paramater = NULL)
        {
            $filter 	= $this->get("filter");
            $page 		= $this->get('page') == TRUE ? $this->get('page'): 1;
            $limit 		= $this->get('limit') == TRUE ? $this->get('limit'): 50;
            $modules    = NULL;
            $data       = array();
            $timeLapse  = NULL;
            $user = new User();

            $this->benchmark->mark('query_start');
            // if(isset($filter))
            // {
            //     foreach($filter['filters'] as $f) {
            //         if(isset($f['operator']))
            //         {
            //             $institutes->{$f['operator']}($f['field'], $f['value']);
            //         } else {
            //             $institutes->where($f['field'], $f['value']);
            //         }

            //     }
            // }

            if(isset($id))
            {
                $user->where('id', $id);
                $user->get_paged_iterated($page, $limit);
            }

            if($user->exists())
            {
                if(isset($paramater))
                {
                    $modules = new Module();
                    $modules->where('is_core', 'false');
                    $modules->where_related('user', 'id', $id)->get_iterated();
                    if($modules->exists())
                    {
                        $comp = array();
                        foreach($modules as $app)
                        {
                            $comp[] = array(
                                'id' => $app->id,
                                'name' => $app->name,
                                'summary' => $app->summary,
                                'discription' => $app->description,
                                'image' => $app->image_url,
                                'home' => base_url()."$app->href",
                                'url' => base_url()."v1/apps/index/{$app->id}"
                            );
                        }
                        foreach($user as $row)
                        {
                            $data[] = array(
                                'id' => $row->id,
                                'name' => $row->name,
                                'summary' => $row->summary,
                                'discription' => $row->description,
                                'appSubscribed' => $comp,
                                'numberOfApp'   => count($comp)
                            );
                        }
                    }
                } else
                {
                    foreach($user as $row)
                    {
                        $data[] = array(
                            'id' => $row->id,
                            'name' => $row->name,
                            'summary' => $row->summary,
                            'discription' => $row->description
                        );
                    }
                }
            }
            $this->benchmark->mark('query_end');
            $result = array(
                'results'   => $data,
                'totalRow'  => $user->paged->total_rows,
                'totalPage' => $user->paged->total_pages,
                'numberOnPage' => $user->paged->items_on_page,
                'timeLapse' => $this->benchmark->elapsed_time('query_start', 'query_end')
            );
            $this->json($result, 200);
        }

        public function modules_get($id = NULL)
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
            } else
            {
                if(isset($filter))
                {
                    foreach($filter['filters'] as $f) {
                        if(isset($f['operator']))
                        {
                            $modules->{$f['operator']}($f['field'], $f['value']);
                        } else {
                            $mdoules->where($f['field'], $f['value']);
                        }

                    }
                }
            }
            $modules->where_related('institute', 'id', $this->inst);
            $modules->get_paged_iterated($page, $limit);

            if($modules->exists())
            {
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
            else
            {
                $this->benchmark->mark('query_end');
                $result = array(
                    'results'   => $data,
                    'totalRow'  => $modules->paged->total_rows,
                    'totalPage' => $modules->paged->total_pages,
                    'numberOnPage' => $modules->paged->items_on_page,
                    'timeLapse' => $this->benchmark->elapsed_time('query_start', 'query_end')
                );
                $this->json($result, 404);
            }

        }

        protected function json($data, $httpCode)
        {
            $this->response($data, $httpCode);
        }
    }
