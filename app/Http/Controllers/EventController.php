<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Desejo;
use App\Models\User;


class EventController extends Controller
{
    
    public function listando()
    {

        $search = request('search');
        if ($search) {

            $events = Desejo::where([
                ['usuario',  'like', '%' . $search . '%']
            ])->get();
        } else {
            $events = Desejo::all();
        }

        return view('listar', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('cadastrousuario');
    }

    public function dash()
    {

        $events = Desejo::all();

        //$adicionarProduct = $Desejos->adicionarProduct;

        return view('dashboard', ['events' => $events]);
    }

    public function destroy($id)
    {

        Desejo::findOrFail($id)->delete();

        return redirect('dashboard')->with('msg', 'Desejo excluído com sucesso!');
    }




    public function store(Request $request)
    {

        $event = new Desejo;

        $event->usuario = $request->usuario;
        $event->desejo = $request->desejo;

        $user = auth()->user();

        $event->save();

        return view('sucesso');
    }

    public function leaveProduct($id)
    {

        $user = auth()->user();

        $user->adicionarProduct()->detach($id);

        $Desejo = Desejo::findOrFail($id);

        return redirect('/dashboard');
    }
}
