<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Traits\General;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use General;
    public function staticMenu()
    {
        $data['title'] = 'Static Menu List';
        $data['navMenuParentActiveClass'] = 'mm-active';
        $data['subNavStaticMenuIndexActiveClass'] = 'mm-active';
        $data['menus'] = Menu::where('type', 1)->paginate(25);

        return view('admin.menu.static-menu-list', $data);
    }

    public function staticMenuUpdate(Request $request, $slug)
    {
        $menu = Menu::where('slug', $slug)->firstOrFail();
        $menu->name = $request->name;
        $menu->status = $request->status ;
        $menu->save();

        $this->showToastrMessage('success', __('Updated Successful'));
        return redirect()->back();
    }

    public function dynamicMenu()
    {
        $data['title'] = 'Dynamic Menu List';
        $data['navMenuParentActiveClass'] = 'mm-active';
        $data['subNavDynamicMenuIndexActiveClass'] = 'mm-active';
        $data['menus'] = Menu::where('type', 2)->paginate(25);
        $data['urls'] = Page::all();

        return view('admin.menu.dynamic-menu-list', $data);
    }

    public function dynamicMenuStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:menus,name',
        ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->url = $request->url;
        $menu->type = 2;
        $menu->status = $request->status;
        $menu->save();

        $this->showToastrMessage('success', __('Created Successful'));
        return redirect()->back();
    }

    public function dynamicMenuUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:menus,name,' . $id,
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->url = $request->url;
        $menu->type = 2;
        $menu->status = $request->status;
        $menu->save();

        $this->showToastrMessage('success', __('Updated Successful'));
        return redirect()->back();
    }

    public function dynamicMenuDelete($id)
    {
        Menu::findOrFail($id)->delete();

        $this->showToastrMessage('success', __('Deleted Successful'));
        return redirect()->back();
    }


}
