<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\alumni;
use App\articles;
use App\activities;
use App\catalogs;
use Hashids;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countArticles = articles::count();
        $countActivities = activities::count();
        $countAlumni = alumni::count();
        $countCatalogs = catalogs::count();
        return view('admin.pages.dashboard')
            ->with(compact('countArticles'))
            ->with(compact('countActivities'))
            ->with(compact('countAlumni'))
            ->with(compact('countCatalogs'));
    }

    public function home(Request $request)
    {
        $title = 'HOME';
        $articles = articles::orderBy('id', 'desc')->first();
        // dd($request->root());
        if (isset($articles)) {
            $articles->image = $request->root() . "/images/articles/" . $articles->image;
            $articlesid = Hashids::encode($articles->id);
        } else {
            $articles = new articles;
            $articles->image = $request->root() . "/img/No_image.png";
            $articles->title = "No Title";
            $articles->content = "No Content";
            $articlesid = "";
        }
        $activities = activities::orderBy('id', 'desc')->first();
        if (isset($activities)) {
            $activities->image = $request->root() . "/images/activities/" . $activities->image;
            $activitiesid = Hashids::encode($activities->id);
            // dd($activities);
        } else {
            $activities = new activities;
            $activities->image = $request->root() . "/img/No_image.png";
            $activities->title = "No Title";
            $activities->content = "No Content";
            $activitiesid = "";
        }
        $catalogs = catalogs::orderBy('id', 'desc')->first();
        if (isset($catalogs)) {
            $catalogs->image = $request->root() . "/images/catalogs/" . $catalogs->image;
            $catalogsid = Hashids::encode($catalogs->id);
        } else {
            $catalogs = new catalogs;
            $catalogs->image = $request->root() . "/img/No_image.png";
            $catalogs->name = "No Title";
            $catalogs->description = "No Content";
            $catalogsid = "";
        }
        return view('homepage')
            ->with(compact('title'))
            ->with(compact('articles'))
            ->with(compact('articlesid'))
            ->with(compact('activities'))
            ->with(compact('activitiesid'))
            ->with(compact('catalogs'))
            ->with(compact('catalogsid'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
