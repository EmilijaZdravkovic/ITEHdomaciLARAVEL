<?php

namespace App\Http\Controllers;

use App\Http\Resources\KnjigaResurs;
use App\Models\Knjiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KnjigaController extends HandleController
{
    public function index()
    {
        $knjige = Knjiga::all();
        return $this->success(KnjigaResurs::collection($knjige), 'Vraceni svi podaci o knjigama!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv' => 'required',
            'autor' => 'required',
            'zanrId' => 'required',
            'procitano' => 'required',
            'ocena' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $knjiga = Knjiga::create($input);

        return $this->success(new KnjigaResurs($knjiga), 'Nova knjiga je kreirana.');
    }


    public function show($id)
    {
        $knjiga = Knjiga::find($id);
        if (is_null($knjiga)) {
            return $this->error('Knjiga sa zadatim id-em ne postoji.');
        }
        return $this->success(new KnjigaResurs($knjiga), 'Knjiga sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $knjiga = Knjiga::find($id);
        if (is_null($knjiga)) {
            return $this->error('Knjiga sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv' => 'required',
            'autor' => 'required',
            'zanrId' => 'required',
            'procitano' => 'required',
            'ocena' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $knjiga->naziv = $input['naziv'];
        $knjiga->autor = $input['autor'];
        $knjiga->zanrId = $input['zanrId'];
        $knjiga->procitano = $input['procitano'];
        $knjiga->ocena = $input['ocena'];
        $knjiga->save();

        return $this->success(new KnjigaResurs($knjiga), 'Knjiga je azurirana.');
    }

    public function destroy($id)
    {
        $knjiga = Knjiga::find($id);
        if (is_null($knjiga)) {
            return $this->error('Knjiga sa zadatim id-em ne postoji.');
        }

        $knjiga->delete();
        return $this->success([], 'Knjiga je obrisana.');
    }
}
