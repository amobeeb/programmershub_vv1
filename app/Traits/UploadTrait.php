<?php
namespace App\Traits;
/**
 *
 */
trait UploadTrait
{
    protected function file_upload($filenamext,$pathxt)
    {
        /*
         *@param $request global variable
         * return filename
         * */
        global $request;
         if($request->hasFile($filenamext))
        {
            $filenameWithExt = $request->file($filenamext)->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get Extsion();
            $extension = $request->file($filenamext)->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file($filenamext)->storeAs($pathxt, $fileNameToStore);
        }else
        {
            $fileNameToStore = 'noaimage.jpg';
        }
        return  $fileNameToStore;
    }
}
