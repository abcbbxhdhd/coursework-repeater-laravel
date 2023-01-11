<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function all()
    {
        $collections = Collection::all();

        return view('allCollections', ['collections' => $collections]);
    }

    public function getCreate()
    {
        return view('createCollection');
    }

    public function postCreate(Request $request)
    {
        $name = $request['coll_name'];
        $collection = new Collection();
        $collection->name = $name;
        $collection->save();

        return redirect('/collection/all');
    }

    public function delete(Collection $collection)
    {
        $collection->delete();

        return redirect('/collection/all');
    }

    public function show(Collection $collection)
    {
        $requests = $collection->requests;
        $neutralRequests = \App\Models\Request::all()->whereNull('collection_id');

        return view('collection', ['collection' => $collection, 'requests' => $requests, 'neutralRequests' => $neutralRequests]);
    }

    public function removeRequestFromCollection(Collection $collection, \App\Models\Request $request)
    {
        $request->collection_id = null;
        $request->save();

        return redirect('/collection/' . $collection->id);
    }

    public function addRequestToCollection(Collection $collection, Request $request)
    {
        $selectedRequestId = $request->input('selected_request');
        $selectedRequest = \App\Models\Request::all()->find($selectedRequestId);

        $selectedRequest->collection_id = $collection->id;
        $selectedRequest->save();

        return redirect('/collection/' . $collection->id);
    }
}
