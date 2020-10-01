<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\alumni;
use App\alumniofthemonth;
use App\listofthemonth;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Hashids;
use App\activities;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $alumni = alumni::select(['id', 'nama', 'sco', 'batch', 'image', 'updated_at']);

            return Datatables::of($alumni)
                ->addColumn('action', function ($alumni) {
                    return view('datatables._action', [
                        'model' => $alumni,
                        'id' => Hashids::encode($alumni->id),
                        'form_url' => 'admin/alumni/destroy/' . Hashids::encode($alumni->id),
                        'confirm_message' => 'Yakin ingin menghapus ' . $alumni->nama . ' ?'
                    ]);
                })
                ->toJson();
        }

        $alumnilist = alumni::orderBy('nama', 'asc')->pluck('nama', 'id');
        $now = alumniofthemonth::all() ? alumniofthemonth::first() : '';
        if (empty($now)) {
            $now = new alumni;
            $now->author = 'Admin';
            $now->description = '';
        }
        // dd($alumnilist);
        $path = $request->root() . '/images/Alumni/';
        $html = $htmlBuilder
            ->Columns([
                ['data' => 'nama', 'name' => 'nama', 'title' => 'Nama'],
                ['data' => 'sco', 'name' => 'sco', 'title' => 'SCO'],
                ['data' => 'batch', 'name' => 'batch', 'title' => 'Batch'],
                ['data' => 'image', 'name' => 'image', 'title' => 'Foto', 'render' => '"<img src=\"' . $path . '"+data+"\" height=\"50\"/>"'],
                [
                    'data' => 'action', 'name' => 'action', 'title' => 'Action',
                    'orderable' => 'false', 'searchable' => 'false'
                ]
            ]);

        return view('admin.pages.alumni')->with(compact('alumnilist'))->with(compact('now'));
    }

    public function showAlumni(Request $request, Builder $htmlBuilder)
    {
        $alumni = alumni::select(['nama', 'sco', 'batch', 'image'])->paginate(10);

        return view('about.alumni.alumni-directory')->with(compact('alumni'));
    }

    public function showAlumniOfTheMonth(Request $request)
    {
        $alumniotm = alumniofthemonth::first();
        $alumni = alumni::find($alumniotm->id_alumni);
        if (empty($alumni)) {
            $alumni = new alumni;
            $alumni->image = 'No_image.png';
            $alumni->nama = 'No Alumni Of Period';
            $alumniotm->author = 'Admin';
            $alumniotm->description = 'No Alumni Of Period';
        }

        return view('about.alumni.alumni-otm')->with(compact('alumni'))->with(compact('alumniotm'));
    }

    public function listAlumniOfTheMonth(Request $request, Builder $htmlBuilder)
    {
        // $alumni = alumniofthemonth::select(['id_alumni','description','month','year'])->paginate(10);
        // return view('about.alumni.list-alumni-otm')->with(compact('alumni'));

        $data = [
            'title' => 'List Alumni On Period'
        ];
        $alumnis = listofthemonth::select(['alumni_name', 'author', 'content', 'image', 'updated_at'])->paginate(3);
        // $activities = activities::orderBy('updated_at','desc')->paginate(3);
        // foreach($alumnis as $index=>$alumni){
        //     $id[$index] = Hashids::encode($alumni->id);
        // }
        // return view('activities', compact('data'))->with(compact('activities'))->with(compact('id'));
        // dd($alumnis);

        return view('about.alumni.list-alumni-otm', compact('data'))->with(compact('alumnis'));
    }

    public function showAlumniOtm(Request $request, Builder $htmlBuilder)
    {
        $alumnilist = alumni::orderBy('nama', 'asc')->pluck('nama', 'id');
        $now = alumniofthemonth::first();

        if (empty($now)) {
            $now = new alumni;
            $now->author = 'Admin';
            $now->description = '';
        } else {
            $alumni = alumni::find($now->id_alumni);
        }

        // return $alumnilistotm;
        return view('admin.pages.list-alumni-otm')->with(compact('alumnilist'))->with(compact('now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showNews()
    {
        $data = [
            'title' => 'Alumni and Senior On Period'
        ];
        $lotm = listofthemonth::orderBy('updated_at', 'desc')->paginate(3);
        foreach ($lotm as $index => $activity) {
            $id[$index] = Hashids::encode($activity->id);
        }

        return view('about.alumni.list-alumni-otm')->with(compact('data'))->with(compact('lotm'))->with(compact('id'));
    }

    public function showNewsDetail($id)
    {
        $id = Hashids::decode($id);
        $lotm = listofthemonth::find($id[0]);
        $recentpost = listofthemonth::orderBy('updated_at', 'desc')->paginate(5);
        foreach ($recentpost as $index => $activity) {
            $id[$index] = Hashids::encode($activity->id);
        }
        if (empty($lotm)) {
            abort(404);
        }
        // return $lotm;
        return view('news-detail')
            ->with(compact('lotm'))
            ->with(compact('recentpost'))
            ->with(compact('id'));
    }

    public function indexListofthemonth(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $activities = listofthemonth::select(['id', 'title', 'updated_at', 'author']);

            return Datatables::of($activities)
                ->addColumn('action', function ($activities) {
                    return view('datatables._action', [
                        'model' => $activities,
                        'id' => Hashids::encode($activities->id),
                        'form_url' => 'admin/destroy-lotm/' . Hashids::encode($activities->id),
                        'confirm_message' => 'Yakin ingin menghapus ' . $activities->title . ' ?'
                    ]);
                })
                ->editColumn('updated_at', function ($activities) {
                    return $activities->updated_at->format('d F Y');
                })
                ->toJson();
        }
        $html = $htmlBuilder
            ->Columns([
                ['data' => 'title', 'name' => 'title', 'title' => 'Title'],
                ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Date'],
                ['data' => 'author', 'name' => 'author', 'title' => 'Author'],
                [
                    'data' => 'action', 'name' => 'action', 'title' => 'Action',
                    'orderable' => 'false', 'searchable' => 'false'
                ]
            ]);

        return view('admin.pages.activities');
    }

    public function storeListofthemonth(Request $request)
    {
        // dd($request);
        $lotm = new listofthemonth;
        $lotm->title = $request->title;
        $lotm->month = $request->month;
        $lotm->year = $request->year;
        $lotm->alumni_name = $request->name;
        $lotm->author = $request->author;
        $lotm->content = $request->content;
        if ($request->hasFile('inputfreqd')) {
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'lotm';
            $uploaded_img[0]->move($destinationPath, $filename);
            $lotm->image = $filename;
        } else {
            Log::info($request->all());
        }
        $lotm->save();

        return redirect()->back();
    }

    public function editListofthemonth(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            $id = Hashids::decode($id);
            $lotm = listofthemonth::find($id[0]);
            $lotm->image = '/images/lotm/' . $lotm->image;
            $previewimage = View::make('layouts._imgpreview', [
                'image' => $lotm->image,
                'name' => $lotm->title
            ]);
            $previewimage = (string) $previewimage;

            return response()->json(['data' => $lotm, 'imgpreview' => $previewimage]);
        } else {
            abort(404);
        }
    }

    public function updateListofthemonth(Request $request, $id)
    {
        //
        $id = Hashids::decode($id);
        $lotm = listofthemonth::find($id[0]);
        $lotm->title = $request->edittitle;
        $lotm->alumni_name = $request->editname;
        $lotm->month = $request->editmonth;
        $lotm->year = $request->edityear;
        $lotm->author = $request->editauthor;
        $lotm->content = $request->editcontent;
        $imgname = $lotm->image;
        if ($request->hasFile('inputfreqd')) {
            $destinationPath = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'lotm';
            $fullpath = $destinationPath . DIRECTORY_SEPARATOR . $imgname;
            try {
                File::delete($fullpath);
            } catch (FileNotFoundException $e) {
                Log::info('File Not Found');

                return redirect()->back();
            }
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'lotm';
            $uploaded_img[0]->move($destinationPath, $filename);
            $lotm->image = $filename;
        } else {
            Log::info($request);
        }
        $lotm->save();

        return redirect()->back();
    }

    public function destroyListofthemonth($id)
    {
        //
        $id = Hashids::decode($id);
        $lotm = listofthemonth::find($id[0]);
        $imgname = $lotm->image;
        if ($lotm->delete()) {
            $destinationPath = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'lotm';
            $fullpath = $destinationPath . DIRECTORY_SEPARATOR . $imgname;
            try {
                File::delete($fullpath);
            } catch (FileNotFoundException $e) {
                Log::info($e);
            }
        }
        $completemessage = 'Activity has been deleted';

        return redirect()->back()->with('completemessage', $completemessage);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create new alumni
        $alumni = new alumni;
        $alumni->nama = $request->nama;
        $alumni->sco = $request->sco;
        $alumni->batch = $request->batch;
        if ($request->hasFile('inputfreqd')) {
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'alumni';
            $uploaded_img[0]->move($destinationPath, $filename);
            $alumni->image = $filename;
        } else {
            Log::info($request->all());
        }
        $alumni->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            $id = Hashids::decode($id);
            $alumni = alumni::find($id[0]);
            $alumni->image = '/images/alumni/' . $alumni->image;
            $previewimage = View::make('layouts._imgpreview', [
                'image' => $alumni->image,
                'name' => $alumni->title
            ]);
            $previewimage = (string) $previewimage;

            return response()->json(['data' => $alumni, 'imgpreview' => $previewimage]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $id = Hashids::decode($id);
        $alumni = alumni::find($id[0]);
        $alumni->nama = $request->editnama;
        $alumni->sco = $request->editsco;
        $alumni->batch = $request->editbatch;
        $imgname = $alumni->image;
        if ($request->hasFile('inputfreqd')) {
            $destinationPath = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'alumni';
            $fullpath = $destinationPath . DIRECTORY_SEPARATOR . $imgname;
            try {
                File::delete($fullpath);
            } catch (FileNotFoundException $e) {
                Log::info('File Not Found');

                return redirect()->back();
            }
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'alumni';
            $uploaded_img[0]->move($destinationPath, $filename);
            $alumni->image = $filename;
        } else {
            Log::info($request);
        }
        $alumni->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete item
        $id = Hashids::decode($id);
        $alumni = alumni::find($id[0]);
        $imgname = $alumni->image;
        if ($alumni->delete()) {
            $destinationPath = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'alumni';
            $fullpath = $destinationPath . DIRECTORY_SEPARATOR . $imgname;
            try {
                File::delete($fullpath);
            } catch (FileNotFoundException $e) {
                Log::info($e);
            }
        }
        $completemessage = 'Alumni has been deleted';

        return redirect()->back()->with('completemessage', $completemessage);
    }

    public function storeUpdateAlumniOfTheMonth(Request $request)
    {
        $alumniofthemonth = alumniofthemonth::first();
        if (empty($alumniofthemonth)) {
            $alumniofthemonth = new alumniofthemonth;
        }
        $alumniofthemonth->id_alumni = $request->nama;
        $alumniofthemonth->description = $request->description;
        $alumniofthemonth->author = $request->author;
        $alumniofthemonth->save();

        return redirect()->back();
    }
}
