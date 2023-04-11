<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{


    public function index()
    {
        $services = Service::all();
        $categories = Category::all();
        return view('admin.service.show_services', compact('services', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.service.add-service', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        $logoImage = $request->logo;
        $logoPath = Storage::put('/public/image', $logoImage);

        $image = $request->image;
        $imagePath = Storage::put('public/image', $image);

        $service = new Service;
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->logo = $logoPath;
        $service->image = $imagePath;
        $service->link_to_service = $request->link_to_service;
        $service->excerpt = $request->excerpt;
        $service->main_content = $request->main_content;
        $service->developer = $request->developer;
        $service->release_date = $request->release_date;
        $service->is_published = $request->is_published;
        $service->category_id = $request->category_id;

        $service->save();

        return redirect()->route('show-services')->with('success', 'Новий сервіс збережено');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $categories = Category::all();
        return view('admin.service.edit_service', compact('service', 'categories'));
    }

    public function update($id, ServiceRequest $request)
    {
        $service = Service::find($id);

        if ($request->logo) {
            $logoImage = $request->logo;
            $logoPath = Storage::put("/public/image", $logoImage);
            $service->logo = $logoPath;
        }

        if ($request->image) {
            $image = $request->image;
            $imagePath = Storage::put("/public/image", $image);
            $service->image = $imagePath;
        }

        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->link_to_service = $request->link_to_service;
        $service->excerpt = $request->excerpt;
        $service->main_content = $request->main_content;
        $service->developer = $request->developer;
        $service->release_date = $request->release_date;
        $service->is_published = $request->is_published;
        $service->category_id = $request->category_id;

        $service->save();

        return redirect()->route('show-services')->with('success', 'Зміни збережені');
    }

    public function delete($id)
    {
        Service::find($id)->delete();
        return back();
    }
}
