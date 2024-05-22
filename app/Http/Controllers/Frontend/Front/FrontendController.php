<?php

namespace App\Http\Controllers\Frontend\Front;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\Fotografia;
use App\Models\Noticia;
use App\Models\Programa;
use App\Models\Servicio;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    // Metodo para cargar informacion en pagina Index Publica
    public function index(){

        $slider = Slider::orderBy('posicion', 'ASC')->get();

        $programas = Programa::orderBy('id','ASC')->take(4)->get();

        $servicios = Servicio::where('estado', 1)
                                ->orderBy('id', 'DESC')
                                ->take(6)
                                ->get();

        $fotografia = Fotografia::orderBy('id', 'DESC')->take(8)->get();

        $serviciosMenu = $this->getServiciosMenu();

        foreach($fotografia  as $secciones){
            $noticia = Noticia::where('id', $secciones->noticia_id)->first();
            $secciones->nombre = $noticia->nombrenoticia;
            $secciones->fecha = $noticia->fecha;
        }

        $noticia = $this->getRecentNew(5);

        return view('frontend.principal.vistaprincipal',compact(['slider','programas','servicios','noticia','fotografia','serviciosMenu']));
    }


    public function getServiciosMenu(){
        return Servicio::where('estado', 1)
                ->orderBy('id', 'ASC')
                ->take(4)
                ->get();
    }

    public function getRecentNew($filtro){
        $noticiaReciente = Noticia::orderBy('fecha', 'DESC')->take($filtro)->get();

        foreach ($noticiaReciente  as $secciones) {
            $foto = Fotografia::where('noticia_id', $secciones->idnoticia)->pluck('nombrefotografia')->first();
            $secciones->nombrefotografia = $foto;
        }
        return $noticiaReciente;
    }


    public function obtenerTodosServicios(){
        $servicios = Servicio::where('estado', 1)
                ->orderBy('nombreservicio', 'ASC')
                ->get();

        $serviciosMenu = $this->getServiciosMenu();
        return view('frontend.paginas.servicio.vistaservicios', compact('servicios','serviciosMenu'));
    }

    public function serviciosPorNombre($slug){

        if($servicio =  Servicio::where('slug', $slug)
                               ->where('estado', 1)
                               ->first()){
            $serviciosMenu = $this->getServiciosMenu();
            $documentos = Documento::where('servicio_id', $servicio->idservicio)->get();
            return view('frontend.paginas.servicio.vistaservicio',compact(['servicio','serviciosMenu','documentos']));
        }
        else{
            return view('errors.404');
        }
    }


    public function paginaContravencional(){
        $serviciosMenu = $this->getServiciosMenu();
        return view('frontend.paginas.contravencional.vistacontravencional',compact('serviciosMenu'));
    }


    public function descargaContravencional($nameFile){
        $file="storage/archivos/".$nameFile;
        $headers = array('Content-Type: application/pdf',);
        return response()->download($file, $nameFile, $headers);
    }

    public function todasFotografias(Request $request){

        $fotografias = Fotografia::orderBy('noticia_id', 'DESC')->paginate(6);
        $serviciosMenu = $this->getServiciosMenu();
        return view('frontend.paginas.galeria.vistagaleria', compact(['fotografias','serviciosMenu']));
    }


    public function todasNoticias(){

        $noticias = Noticia::orderBy('fecha', 'DESC')
            ->where('estado', 1)
            ->paginate(3);

        foreach($noticias  as $dato){
            $foto = Fotografia::where('noticia_id', $dato->id)->first();
            $dato->nombrefotografia = $foto;
        }

        $serviciosMenu = $this->getServiciosMenu();
        return view('frontend.paginas.noticias.vistanoticias', compact(['serviciosMenu','noticias']));
    }


    public function noticiaPorNombre($slug){

        if($noticia =  Noticia::where('slug', $slug)->where('estado', 1)->first()){

            $fotoInicial = Fotografia::where('noticia_id', $noticia->id)->first();

            // Forget se utiliza para eliminar el primer elemento de una coleccion
            $fotografias = Fotografia::where('noticia_id', $noticia->id)->get()->forget(0);
            $noticia->nombrefotografia = $fotoInicial;
            $noticiaReciente = $this->getRecentNew(3);
            $serviciosMenu = $this->getServiciosMenu();

            return view('frontend.paginas.noticias.vistanoticiaslug',compact(['noticia','serviciosMenu','noticiaReciente','fotografias']));
        }else{
            return view('errors.404');
        }
    }


    public function descargarArchivo($nameFile){

        $file="storage/archivos/".$nameFile;
        $headers = array('Content-Type: application/pdf',);
        return response()->download($file, $nameFile, $headers);
    }


    public function todosLosProgramas(){
        $programas = Programa::where('estado', 1)->orderBy('nombreprograma', 'ASC')->get();
        $serviciosMenu = $this->getServiciosMenu();

        return view('frontend.paginas.programas.vistaprogramas',compact('programas','serviciosMenu'));
    }


    public function programaPorNombre($slug){

        if($programa = Programa::where('slug', $slug)->where('estado', 1)->first()){
            $serviciosMenu = $this->getServiciosMenu();

            return view('frontend.paginas.programas.vistaprogramaslug',compact(['programa','serviciosMenu']));
        }else{
            return view('errors.404');
        }
    }


    public function paginaHistoria(){

        $serviciosMenu = $this->getServiciosMenu();
        return view('frontend.paginas.historia.vistahistoria',compact('serviciosMenu'));
    }


    public function paginaGobierno(){
        $serviciosMenu = $this->getServiciosMenu();
        return view('frontend.paginas.gobierno.vistagobierno',compact('serviciosMenu'));
    }





}
