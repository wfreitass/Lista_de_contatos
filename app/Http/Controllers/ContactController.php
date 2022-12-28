<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contact->all();

        return view('contact.home', [
            "contacts" => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {

        try {
            $data = $request->all();
            if ($this->contact->where('email', $data['email'])->first()) {
                // dd($this->contact->where('email', $data['email'])->first());
                flash('Email já Cadastrado');
                return back();
            } else if ($this->contact->where('contact', $data['contact'])->first()) {
                flash('Contato já Cadastrado');
                return back();
            }
            $data = $this->contact->create($data);
            return redirect()->route('contacts')->with('msg', 'contato criado com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('contacts')->with('msg', $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $contact = $this->contact->where('id', $id)->first();
        return view('contact.show', [
            "contact" => $contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $contact = $this->contact->where('id', $id)->first();
        return view('contact.edit', [
            "contact" => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request,  $id)
    {
        try {
            $data = $request->all();
            $contact = $this->contact->find($id);
            $contact = $contact->update($data);
            return redirect()->route('contacts')->with('msg', 'contato Atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('contacts')->with('msg', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            if ($this->contact->where('id', $id)->delete()) {
                return redirect()->route('contacts')->with('msg', 'contato excluido com sucesso');
            }
        } catch (\ErrorException $e) {
            return redirect()->route('contacts')->with('msg', $e);
        }
    }
}
