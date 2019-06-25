<?php
namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class Google_API
{
    private $client;

    public function __construct()
    {
        $client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENTID'));
        $client->setClientSecret(env('GOOGLE_SECRET'));
        $client->setRedirectUri(env('GOOGLE_CALLBACK'));
        $client->setAccessType('offline');
        $credentialsPath = public_path(env('GOOGLE_DRIVE_FILE_CREDENTIALS'));
        if (Session::has('google_token')) {
            $accessToken = json_encode(Session::get('google_token'));
        } else {
            auth()->logout();
            Redirect::to('/auth/google')->send();
        }
        $client->setAccessToken($accessToken);

        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
            $client->refreshToken($client->getRefreshToken());
            //file_put_contents($credentialsPath, $client->getAccessToken());
        }
        $this->client = $client;
    }

    public function uploadFile($documents, $folder)
    {
        $service = new \Google_Service_Drive($this->client);
        $folder = $folder->google_drive_id != null ? $folder : $this->createFolder($service, $folder);

        foreach ($documents as $document) {
            $file = new \Google_Service_Drive_DriveFile();
            $file->title = $document->getClientOriginalName();
            $my_parent = new \Google_Service_Drive_ParentReference();
            $my_parent->setId($folder->google_drive_id);
            $file->setParents(array($my_parent));
            $file->setFileSize($document->getSize());
            $request = $service->files->insert($file, array(
                'data' => file_get_contents($document->getRealPath()),
                'mimeType' => $document->getMimeType(),
                'uploadType' => 'media'
            ));
            $my_file = new File();
            $my_file->google_drive_id = $request->id;
            $my_file->folder_id = $folder->id;
            $my_file->link = $request->getAlternateLink();
            $my_file->name = $document->getClientOriginalName();
            $my_file->save();
        }

        return true;
    }

    public function createFolder($service, $folder)
    {
        $client = $folder->client;
        if ($client->google_drive_id == null) {
            $parent_directory = new \Google_Service_Drive_DriveFile();
            $parent_directory->setTitle($folder->client->name);
            $parent = new \Google_Service_Drive_ParentReference();
            $parent->setId(env('GOOGLE_DRIVE_MAIN_FOLDER'));
            $parent_directory->setParents(array($parent));
            $parent_directory->setMimeType('application/vnd.google-apps.folder');
            $client_folder = $service->files->insert($parent_directory);
            $client->google_drive_id = $client_folder->getId();
            $client->save();
        }

        $new_folder = new \Google_Service_Drive_DriveFile();
        $new_folder->setTitle($folder->folder_name . $folder->folder_number);
        $my_parent = new \Google_Service_Drive_ParentReference();
        $my_parent->setId($client->google_drive_id);
        $new_folder->setParents(array($my_parent));
        $new_folder->setMimeType('application/vnd.google-apps.folder');
        $current_folder = $service->files->insert($new_folder);
        $folder->google_drive_id = $current_folder->getId();
        $folder->save();

        return $folder;
    }

    public function deleteFile($file_id)
    {
        $service = new \Google_Service_Drive($this->client);
        try {
            $service->files->delete($file_id);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function deleteFolder($folder)
    {
        $service = new \Google_Service_Drive($this->client);
        $files = $folder->files;
        foreach ($files as $file) {
            if ($file->google_drive_id && $file->google_drive_id != '') {
                $service->files->delete($file->google_drive_id);
            }
        }
        if ($folder->google_drive_id)
            $service->files->delete($folder->google_drive_id);

        return true;
    }

}