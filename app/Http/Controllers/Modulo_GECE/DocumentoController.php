<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Models\Modulo_GECE\Documento;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DocumentoController extends Controller
{
    public function store(Request $request)
    {
        foreach ($request->documentos as $documento)
        {
            if ($documento->isValid())
            {
                $nombre_hash = $documento->store('deposito');

                $registrodocumento = new Documento();
                $registrodocumento->deposito_id = $request->deposito_id;
                $registrodocumento->nombre = $documento->getClientOriginalName();
                $registrodocumento->nombre_hash = $nombre_hash;
                $registrodocumento->mime = $documento->getClientMimeType();
                $registrodocumento->save();

            }
        }

        return redirect()->route('deposito.index', $request->deposito_id)->with(['mensaje' => 'Documentos cargados satisfactoriamente!']);
    }


    public function descargar(Documento $documento)
    {
        $header = ['Content-Type' => $documento->mime];
        return Storage::download($documento->nombre_hash, $documento->nombre, $header);
    }
}
