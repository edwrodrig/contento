<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 09-04-18
 * Time: 15:04
 */

namespace edwrodrig\contento\collection;

use DateTime;

class LegacyImage extends \edwrodrig\static_generator\cache\ImageItem
{
    public $server;
    protected $last_modification_date;

    protected $source_filename = null;

    public function __construct($server, $data) {
        $this->server = $server;
        $this->last_modification_date = new DateTime($data['time']);
        $this->id = $data['id'];
        $this->filename = $this->id;

    }

    public static function create_from_array($server, $data) {
        return new self($server, $data);
    }

    public function get_id() : string {
        return $this->id;
    }

    public function get_source_filename() : string {
        if ( is_null($this->source_filename) ) {
            $this->source_filename = tempnam('/tmp','li_');
            file_put_contents($this->source_filename, $this->server->get_image($this->id));
            $type = mime_content_type($this->source_filename);
            if ( $type == 'image/jpeg')
                $this->extension = 'jpg';
            else if ( $type = 'image/png' )
                $this->extension = 'png';
        }
        return $this->source_filename;
    }

    public function get_last_modification_time() : DateTime {
        return $this->last_modification_date;
    }

    public function get_cached_file() : string {
        $this->get_source_filename();
        return parent::get_cached_file();
    }

}