<?php

namespace App\Helpers;

use App\folder;

class FolderHelper
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
