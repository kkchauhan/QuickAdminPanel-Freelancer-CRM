<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

trait MediaUploadingTrait
{
    public function storeMedia(Request $request)
    {
        // Server-enforced validation — never trust client-supplied limits
        $request->validate([
            'file' => [
                'required',
                'file',
                'max:10240', // 10 MB hard limit
                'mimes:pdf,doc,docx,xls,xlsx,csv,txt,jpg,jpeg,png,gif,webp,svg,zip',
            ],
        ]);

        $path = storage_path('tmp/uploads');

        try {
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        } catch (\Exception $e) {
            abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Unable to create upload directory.');
        }

        $file = $request->file('file');

        // Sanitize filename: strip directory separators and null bytes to prevent path traversal
        $originalName = str_replace(['/', '\\', "\0"], '', trim($file->getClientOriginalName()));
        $name = uniqid() . '_' . $originalName;

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $originalName,
        ]);
    }

    /**
     * Sanitize a document_file input to prevent path traversal.
     * Returns the basename only, stripping any directory components.
     */
    protected function sanitizeMediaFilename(?string $filename): ?string
    {
        if (empty($filename)) {
            return null;
        }

        // Strip directory traversal sequences and null bytes
        $filename = str_replace(["\0"], '', $filename);
        $filename = basename($filename);

        // Reject empty or dot-only filenames
        if (in_array($filename, ['', '.', '..'], true)) {
            return null;
        }

        return $filename;
    }
}
