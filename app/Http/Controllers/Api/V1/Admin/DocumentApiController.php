<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Http\Resources\Admin\DocumentResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class DocumentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentResource(Document::with(['project'])->get());
    }

    public function store(StoreDocumentRequest $request)
    {
        $document = Document::create($request->validated());

        if ($request->input('document_file', false)) {
            $filename = $this->sanitizeMediaFilename($request->input('document_file'));
            $filepath = storage_path('tmp/uploads/' . $filename);
            abort_if(!$filename || !file_exists($filepath), Response::HTTP_UNPROCESSABLE_ENTITY, 'Invalid file reference.');
            $document->addMedia($filepath)->toMediaCollection('document_file');
        }

        return (new DocumentResource($document))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentResource($document->load(['project']));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $document->update($request->validated());

        if ($request->input('document_file', false)) {
            if (!$document->document_file || $request->input('document_file') !== $document->document_file->file_name) {
                $filename = $this->sanitizeMediaFilename($request->input('document_file'));
                $filepath = storage_path('tmp/uploads/' . $filename);
                abort_if(!$filename || !file_exists($filepath), Response::HTTP_UNPROCESSABLE_ENTITY, 'Invalid file reference.');
                $document->addMedia($filepath)->toMediaCollection('document_file');
            }
        } elseif ($document->document_file) {
            $document->document_file->delete();
        }

        return (new DocumentResource($document))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
