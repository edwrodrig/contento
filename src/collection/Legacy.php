<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 27-03-18
 * Time: 11:49
 */

namespace edwrodrig\contento\collection;


use edwrodrig\contento\type\DefaultElement;

class Legacy
{
    protected $end_point;
    protected $session = '';

    public function __construct(string $end_point) {
        $this->end_point = $end_point;
    }

    public function login(string $user, string $password) {
        $result = file_get_contents($this->end_point, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'action' => 'user_login',
                    'username' => $user,
                    'password' => $password
                ])
            ]
        ]));

        $this->session = json_decode($result, true)['data']['session'];
    }

    public function get_data(string $collection, string $class = DefaultElement::class) {
        $result = file_get_contents($this->end_point, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'action' => 'contento_data_by_collection',
                    'collection' => $collection,
                    'short' => false,
                    'session' => $this->session
                ])
            ]
        ]));

        $result = json_decode($result, true)['data'];

        $elements = [];

        foreach ( $result as $data) {
            $elements[] = $class::create_from_array($data['data']);
        }
        return $elements;
    }

    public function add_data(string $collection, array $data) {
        $result = file_get_contents($this->end_point, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'action' => 'contento_data_add',
                    'collection' => $collection,
                    'session' => $this->session,
                    'data' => $data
                ])
            ]
        ]));

        return $result;

    }

    public function update_data(string $collection, array $data) {
        $result = file_get_contents($this->end_point, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'action' => 'contento_data_update',
                    'collection' => $collection,
                    'session' => $this->session,
                    'name' => $data['id'],
                    'data' => $data
                ])
            ]
        ]));

        return $result;

    }

    public function get_images(string $class = DefaultElement::class)
     {
        $result = file_get_contents($this->end_point, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'action' => 'image_by',
                    'session' => $this->session
                ])
            ]
        ]));

        $result = json_decode($result, true)['data'];

        $elements = [];

        foreach ( $result as $data) {
            $elements[] = $class::create_from_array($this, $data);
        }
        return $elements;
    }

    public function get_image($id) {
        return file_get_contents($this->end_point, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'action' => 'image_file_by_id',
                    'id' => $id,
                    'session' => $this->session
                ])
            ]
        ]));
    }


    public function get_single_data(string $collection, string $class = DefaultElement::class) {
         $data = $this->get_data($collection, $class);

         if ( count($data) > 0 ) {
             return $data[0];
         } else
             return null;
    }
}