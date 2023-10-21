<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FruitController extends BaseController
{

    public function index()
    {
        $fruit = model('Fruit');
        $data = $fruit->findAll();
        return view('component/navbar').view('fruits/index', compact('data'));
    }
    public function create()
    {
        return view('component/navbar').view('fruits/create');
    }
    public function store()
    {
        $validation = $this->validate([
            'name'=>'required',
            'price'=>'required|is_numeric',
            'description'=>'required'
        ]);
        if(!$validation) dd($this->validator->getErrors());
        $validData = $this->validator->getValidated();
        $image = $this->request->getFile('image');
        if($image->guessExtension())
        $imageName = $image->getRandomName();
        $imageURL = 'image/'.$imageName;
        if(!$image->move(FCPATH.'image/',$imageName)) dd(':(');
        $validData['image'] = $imageURL;
        $fruit = model('Fruit');
        $fruit->insert($validData);
        return redirect()->route('index');
    }
    public function edit($id)
    {
        $fruit = model('Fruit')->find($id);
        return view('component/navbar').view('fruits/edit',compact('fruit'));
    }
    public function update($id)
    {
        $fruit = model('Fruit');
        $validation = $this->validate([
            'name'=>'required',
            'price'=>'required|is_numeric',
            'description'=>'required'
        ]);
        if(!$validation) dd($this->validator->getErrors());
        $validData = $this->validator->getValidated();
        $image = $this->request->getFile('image');
        if($image)
        {
            if($image->guessExtension())
            $imageName = $image->getRandomName();
            $imageURL = 'image/'.$imageName;
            if(!$image->move(FCPATH.'image/',$imageName)) dd(':(');
            $validData['image'] = $imageURL;
        }
        $fruit = model('Fruit');
        $fruit->update($id,$validData);
        return redirect()->route('index');
    }
    public function delete($id)
    {
        $fruit = model('Fruit');
        if($image = $fruit->find($id)['image'])
        {
            unlink(FCPATH.$image);
        }
        $fruit->delete($id);
        return redirect()->route('index');
    }
}
