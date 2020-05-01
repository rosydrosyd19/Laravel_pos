<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Repositories\PurchaseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use PDF;

class PurchaseController extends AppBaseController
{
    /** @var  PurchaseRepository */
    private $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepo)
    {
        $this->purchaseRepository = $purchaseRepo;
    }

    /**
     * Display a listing of the Purchase.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $purchases = $this->purchaseRepository->all();

        return view('purchases.index')
            ->with('purchases', $purchases);
    }
    public function cetak_pdf($id)
    {
    	$purchases = $this->purchaseRepository->find($id);
 
    	$pdf = PDF::loadview('purchases.purchase_pdf',['purchase'=>$purchases]);
    	return $pdf->download('Nota Pembelian.pdf');
    }

    /**
     * Show the form for creating a new Purchase.
     *
     * @return Response
     */
    public function create()
    {
        $suppliers = \App\Models\Supplier::pluck('name','id');
        $items = \App\Models\Item::pluck('name','id');
        return view('purchases.create')->with(compact('items'))->with(compact('suppliers'));
    }

    /**
     * Store a newly created Purchase in storage.
     *
     * @param CreatePurchaseRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseRequest $request)
    {
        DB::beginTransaction();
        try{
        $input = $request->all();
        $input['user_id']=\Auth::user()->id;
        $purchase = $this->purchaseRepository->create($input);
        foreach ($input['item_id'] as $key => $row){
            $purchase_detail = new \App\Models\PurchaseDetail();
            $item = \App\Models\Item::find($input['item_id'][$key]);
            $purchase_detail->item_id = $item->id;
            $purchase_detail->qty = $input['qty'][$key];
            $purchase_detail->sub_total = $input['sub_total'][$key];
            $purchase_detail->purchase_id = $purchase->id;
            $purchase_detail->save();

            $new_stok = (int)$item->stock + (int)$input['qty'][$key];
            $item->stock = $new_stok;
            $item->save();
        }
        $result = $purchase->id;
        DB::commit();

        Flash::success('Pembelian berhasil disimpan.');
    }catch(Exception $e){
        DB::rollBack();
    }
        return redirect(route('purchases.show',$result));
    }

    /**
     * Display the specified Purchase.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error('Pembelian tidak ditemukan');

            return redirect(route('purchases.index'));
        }

        return view('purchases.show')->with('purchase', $purchase);
    }

    /**
     * Show the form for editing the specified Purchase.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error('Pembelian tidak ditemukan');

            return redirect(route('purchases.index'));
        }

        return view('purchases.edit')->with('purchase', $purchase);
    }

    /**
     * Update the specified Purchase in storage.
     *
     * @param int $id
     * @param UpdatePurchaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseRequest $request)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error('Pembelian tidak ditemukan');

            return redirect(route('purchases.index'));
        }

        $purchase = $this->purchaseRepository->update($request->all(), $id);

        Flash::success('Pembelian berhasil diperbarui.');

        return redirect(route('purchases.index'));
    }

    /**
     * Remove the specified Purchase from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        DB::table('purchases')->where('id',$id)->delete();

        // $purchase = $this->purchaseRepository->find($id);

        // if (empty($purchase)) {
        //     Flash::error('Pembelian tidak ditemukan');

        //     return redirect(route('purchases.index'));
        // }

        // $this->purchaseRepository->delete($id);

        Flash::success('Pembelian berhasil dihapus.');

        return redirect(route('purchases.index'));
    }
}
