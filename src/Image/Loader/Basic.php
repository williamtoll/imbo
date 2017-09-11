<?php
/**
 * This file is part of the Imbo package
 *
 * (c) Christer Edvartsen <cogo@starzinger.net>
 *
 * For the full copyright and license information, please view the LICENSE file that was
 * distributed with this source code.
 */

namespace Imbo\Image\Loader;

/**
 * Basic image loader / fallback image loader
 *
 * @author Mats Lindh <mats@lindh.no>
 * @package Image\Loaders
 */
class Basic implements LoaderInterface {
    public function getMimeTypeCallbacks() {
        return [
            'image/png' => [
                'extension' => 'png',
                'callback' => [$this, 'load'],
            ],
            'image/jpeg' => [
                'extension' => 'jpg',
                'callback' => [$this, 'load'],
            ],
            'image/gif' => [
                'extension' => 'gif',
                'callback' => [$this, 'load'],
            ],
        ];
    }

    public function load($blob) {
        $imagick = new \Imagick();
        $imagick->readImageBlob($blob);
        return $imagick;
    }
}