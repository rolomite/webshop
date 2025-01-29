<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller{
    public function index(Setting $setting){
        $settings = Setting::all()->keyBy('key')->toArray();
        return view('settings.index', [
            'settings' => $settings
        ]);
    }

    public function store(Request $request){
      $configs = collect(config('settings'));
      $rules = $configs->map(fn($config) => $config['rules'])->toArray();
      $data = $request->validate($rules);
      
      $configs->each(function($config, $key) use($request){
        Setting::query()->create([
            'key' => $key,
            'value' => $request->input($key),
          ]);
      });

      return redirect()->route('admin.settings.index')->with('success', 'Setting added successfully');
    }
}