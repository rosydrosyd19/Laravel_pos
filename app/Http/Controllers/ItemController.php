<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Repositories\ItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use File;
use Auth;
use Image;
use Carbon\Carbon;
use DB;


class ItemController extends AppBaseController
{
    /** @var  ItemRepository */
    private $itemRepository;

    public function __construct(ItemRepository $itemRepo)
    {
        $this->itemRepository = $itemRepo;
        $this->path = public_path('images');
    }

    /**
     * Display a listing of the Item.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $items = $this->itemRepository->all();

        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new Item.
     *
     * @return Response
     */
    public function create()
    {
        $categories=\App\Models\Category::pluck('name','id');
        return view('items.create')->with(compact('categories'));
    }

    /**
     * Store a newly created Item in storage.
     *
     * @param CreateItemRequest $request
     *
     * @return Response
     */

    private function saveFile($name, $picture)
    {
        $input = $request->all();

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        $file = $request->file('picture');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($this->path, $fileName);
        $input = $request->all();
        $input['user_id']=Auth::user()->id;
        $input['picture']=$fileName;

    }


    public function store(CreateItemRequest $request)
    {

        if ($request->hasFile('picture')) {
            $input = $request->all();

                if (!File::isDirectory($this->path)) {
                    File::makeDirectory($this->path);
                }
                $file = $request->file('picture');
                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($this->path, $fileName);
                $input = $request->all();
                $input['user_id']=Auth::user()->id;
                $input['picture']=$fileName;
        } else {
            $input = $request->all();
            $photo = null;
        }

        $item = $this->itemRepository->create($input);
        Flash::success('Item saved successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Display the specified Item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified Item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = \App\Models\Category::pluck('name','id');
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.edit')->with('item', $item)->with(compact('categories'));
    }

    /**
     * Update the specified Item in storage.
     *
     * @param int $id
     * @param UpdateItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemRequest $request)
    {
        $item = $this->itemRepository->find($id);
        $input = $request->all();

        if($request->file('picture')){
            $file = $request->file('picture');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $fileName);
            $image_path = public_path('images/'.$item->picture);
            if(File::exists($image_path)){
               File::delete($image_path);
            }
            $input['picture']=$fileName;
        }else{
            $input['picture']=$item->picture;
        }
        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $item = $this->itemRepository->update($request->all(), $id);

        Flash::success('Item updated successfully.');

        return redirect(route('items.index'));
        
    }

    /**
     * Remove the specified Item from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        DB::table('items')->where('id',$id)->delete();

        // $item = $this->itemRepository->find($id);

        // if (empty($item)) {
        //     Flash::error('Item not found');

        //     return redirect(route('items.index'));
        // }

        // $this->itemRepository->delete($id);

        // Flash::success('Item deleted successfully.');

        return redirect(route('items.index'));
    }
    public function search($id){
        $item = $this->itemRepository->find($id);
        return $item;
    }
}