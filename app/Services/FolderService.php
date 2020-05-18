<?php

namespace App\Services;

use App\folder;

class FolderService
{

    public static function update($id, $cv, $coverletter, $screenshot, $bulletin)
    {
        $folder = Folder::find($id);
        $folder->update([
            'cv' => $cv,
            'coverletter' => $coverletter,
            'screenshot' => $screenshot,
            'bulletin' => $bulletin,
        ]);
    }
}
