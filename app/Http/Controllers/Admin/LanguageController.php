<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class LanguageController extends Controller
{
    private $key;
    private $value;
    private $path;
    private $arrayLang = array();



    public function languageSetting(){
        $languages = Language::all();
        return view('Admin.pages.languageSetting',compact(['languages']));
    }

    public function languageEdit($language){
        $files =[];

        foreach( glob( base_path().'/resources/lang/'.$language.'/*.php') as $file ){

            $filearray = explode('/',$file);
            $array_key_last = array_key_last($filearray);
            array_push($files,$filearray[$array_key_last]);
        }

        return view('Admin.pages.languageFilesEdit',compact(['files','language']));
    }

    public function getlangfile(Request $request){
        $file = $request->file ;
        $lang = $request->lang ;

        if ($lang == '') $lang = App::getLocale();
        $path = base_path().'/resources/lang/'.$lang.'/'.$file.'.php';
        $arrayLang = Lang::get($file);
        if (gettype($arrayLang) == 'string') $arrayLang= array();
        return $arrayLang;

    }

    public function editlangfile(Request $request)
    {

        try {

            $lang = $request->lang;
            $file = $request->file;

            $arrayLangdata = array_combine($request->key,$request->value);

            $content = "<?php\n\nreturn\n[\n";

            foreach ($arrayLangdata as $key => $value)
            {
                $content .= "\t'".$key."' => '".$value."',\n";
            }

            $content .= "];";
            $path = base_path().'/resources/lang/'.$lang.'/'.$file.'.php';
            file_put_contents($path, $content);

            $feedbackdata = ['title' => 'Başarılı !',
                'text' => 'Dil məlumatları uğurla redaktə edildi',
                'icon' => 'success',
                'button' => 'Bağla',];
            return back()->with('feedback', $feedbackdata);

            }catch (\Exception $e){
                $feedbackdata = ['title' => 'Başarısız !',
                    'text' => 'Dil məlumatları redaktə edilerkən bir xəta baş verdi.',
                    'icon' => 'success',
                    'button' => 'Bağla',];
                return back()->with('feedback', $feedbackdata);
            }
    }

}
