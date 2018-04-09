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

    public function __construct($server, $data) {
        $this->server = $server;
        $this->last_modification_date = DateTime::createFromFormat('Y-m-d h:i:s', $data['time']);
        $this->id = $data['id'];
        $this->filename = $this->id;

    }

    public static function create_from_array($server, $data) {
        return new self($server, $data);
    }

    public function get_id() : string {
        return $this->id;
    }

    public function get_last_modification_time() : DateTime {
        return $this->last_modification_date;
    }

    public function cache_generate(\edwrodrig\static_generator\cache\Cache $cache) {
        $this->last_cache_used = $cache;

        $filename = tempnam('/tmp','li_');
        file_put_contents($filename, $this->server->get_image($this->id));

        $img = \edwrodrig\image\Image::optimize($filename, $this->size_hint);
        if ( $this->mode == 'contain' ) {
            $img = \edwrodrig\image\Image::contain($img, $this->width, $this->height);

        } else if ( $this->mode == 'cover' ) {
            $img = \edwrodrig\image\Image::cover($img, $this->width, $this->height);
        }
        $img->writeImage($cache->cache_filename($this->get_cached_file()));
        $cache->update_cache($this);
    }

}