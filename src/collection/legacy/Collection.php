<?php
declare(strict_types=1);

namespace edwrodrig\contento\collection\legacy;


use edwrodrig\contento\type\DefaultElement;


/**
 * Class Collection
 *
 * This is a class to help to retrieve information with legacy contento server
 * @package edwrodrig\contento\collection\legacy
 * @deprecated
 */
class Collection
{
    protected $end_point;
    protected $session = '';

    public function __construct(string $end_point) {
        $this->end_point = $end_point;
    }

    /**
     * Login to the
     * @param string $user
     * @param string $password
     */
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

    /**
     * Get a collection.
     *
     * Get an array of elements of a class from the contento server.
     * The output is suitable to use with {@see Collection::createFromElements()}
     * @see getElement
     * @param string $collection
     * @param string $class
     * @return array An array with elements of a class
     */
    public function getCollection(string $collection, string $class = DefaultElement::class) : array {
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
            /** @noinspection PhpUndefinedMethodInspection */
            $elements[] = $class::createFromArray($data['data']);
        }
        return $elements;
    }

    /**
     * Add an element to a collection
     * @param string $collection
     * @param array $data
     * @return array
     */
    public function addElement(string $collection, array $data) : array {
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

    /**
     * Update an element from a collection
     *
     * The data must have a id key
     * @param string $collection
     * @param array $data
     * @return bool|string
     */
    public function updateElement(string $collection, array $data) : array {
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


    /**
     * Get images collection.
     *
     * This not retrieve the image data just the reference to the file and other id data.
     * @param string $class
     * @return array An array with image elements
     */
    public function getImages(string $class = DefaultElement::class) : array
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
            /** @noinspection PhpUndefinedMethodInspection */
            $elements[] = $class::createFromArray($data);
        }
        return $elements;
    }

    /**
     * Get the image data.
     *
     * Get the actual image data
     * @param string $id
     * @return string
     */
    public function getImage(string $id) : string {
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

    /**
     * Get files collection.
     *
     * This not retrieve the image data just the reference to the file and other id data.
     * @param string $class
     * @return array An array with image elements
     */
    public function getFiles(string $class = DefaultElement::class) : array
    {
        $result = file_get_contents($this->end_point, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'action' => 'file_by',
                    'session' => $this->session
                ])
            ]
        ]));

        $result = json_decode($result, true)['data'];

        $elements = [];

        foreach ( $result as $data) {
            /** @noinspection PhpUndefinedMethodInspection */
            $elements[] = $class::createFromArray($data);
        }
        return $elements;
    }

    /**
     * Get the image data.
     *
     * Get the actual image data
     * @param string $id
     * @return string
     */
    public function getFile(string $id) : string {
        return file_get_contents($this->end_point, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'action' => 'file_by_id',
                    'id' => $id,
                    'session' => $this->session
                ])
            ]
        ]));
    }


    /**
     * Get an singleton element
     *
     * Singleton is a collection with only one element.
     * @param string $collection
     * @param string $class
     * @return array|null
     */
    public function getSingleton(string $collection, string $class = DefaultElement::class) : array {
         $data = $this->getCollection($collection, $class);

         if ( count($data) > 0 ) {
             return $data[0];
         } else
             return null;
    }
}