<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use Ilovepdf\Ilovepdf;
use JonnyW\PhantomJs\Client;
use PhantomPdf\PdfGenerator;

class ProofsController extends Controller
{
    /**
     * @param UploadRequest $request
     */
    public function upload(UploadRequest $request){
        $name = $request->input('proof_name');
        $images = $request->file('images');
        $paper = $request->input('paper_size');
        $orientation = $request->input('landscape');
        $margin = $request->input('margin_size');
        $dir = 'users/' . auth()->user()->id . '/' . $name;
        $pub_dir = 'users\\' . auth()->user()->id . '\\' . $name;

        if($request->hasFile('images')) {
            foreach ($images as $image) {
                $image->store($dir);
                $store = storage_path('app/' . $dir);
            }
        }
        $view = view('pdf', ['name' => $name]);
            $client = Client::getInstance();
            $client->getEngine()->setPath('C:\Users\Novateur\Documents\vproof\vendor\bin\phantomjs.exe');
            $client->getEngine()->addOption('--load-images=true');
            $client->getEngine()->addOption('--ignore-ssl-errors=true');
            $client->isLazy();
            $request = $client->getMessageFactory()->createPdfRequest('http://localhost:8001/home/pdf/' . $name, 'GET');
            $request->setOutputFile( $name . '.pdf');
            $request->setFormat($paper);
            $request->setOrientation($orientation);
            $request->setMargin($margin . 'cm');

            $response = $client->getMessageFactory()->createResponse();

            $client->send($request, $response);

            if ($response->getStatus() === 200){
                return redirect()->back()->with('success', 'your pdf was generated successfully');
            }
        return redirect()->back()->with('error', 'your pdf couldn\'t be generated at the moment');
    }

    //
}
