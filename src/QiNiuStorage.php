<?php
/**
 * QiNiuStorage.php.
 *
 * This file is part of the laravel-ueditor.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Wenqing\LaravelEdit;

use Exception;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class QiNiuStorage.
 */
class QiNiuStorage implements StorageInterface
{

    public function store(UploadedFile $file, $filename)
    {
        try{
            $locFile = $file->getPathname();
            $auth = new Auth(config('ueditor.qiniu.accessKey'),config('ueditor.qiniu.secretKey'));
            $token = $auth->uploadToken(config('ueditor.qiniu.bucket'));
            $uploadMgr = new UploadManager();
            list($ret, $err) = $uploadMgr->putFile($token, $filename, $locFile);
            if ($err !== null) {
                abort(400,'qiniu error');
            } else {
                return true;
            }
        }catch (Exception $e){

        }
    }

    /**
     * List files of path.
     *
     * @param string $path
     * @param int    $start
     * @param int    $size
     * @param array  $allowFiles
     *
     * @return array
     */
    public function lists($path, $start, $size = 20, array $allowFiles = [])
    {
        // TODO: Implement lists() method.
    }

    /**
     * Make the url of file.
     *
     * @param $filename
     *
     * @return mixed
     */
    public function getUrl($filename)
    {
        return config('ueditor.qiniu.url').'/'.$filename;
    }
}
