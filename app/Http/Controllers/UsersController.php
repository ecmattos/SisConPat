<?php

namespace SisConPat\Http\Controllers;

//use Illuminate\Http\Request;

//use Illuminate\Foundation\Auth\ResetsPasswords;

#use Auth;
#use Mail;

use Session;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\UserRepository;

use SisConPat\Events\UserEnabledEvent;
use SisConPat\Events\UserDisabledEvent;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function showProfile(Request $request, $id)
    {
        $value = $request->session()->get('key');

        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository
            ->AllUsers()
            ->all();
        
        return view('users.index', compact('users'));
        //
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    #public function store(Requests\UserRequest $request)
    #{
        #$input = $request->all();

        #$input['password'] = bcrypt('123456');
        #$input['confirmation_code'] = str_random(100);
        
        #$user = $this->userRepository->storeUser($input);

        #$user = $this->userRepository->lastUser();

        #event(new UserNewEvent($user));

        #Mail::send('emails.users.welcome', ['user' => $user], function ($m) use ($user)
        #{
        #    $m->from('contato.spmtec@gmail.com', 'CEASA: SisConPat - Contato');
        #    $m->to($user->email, $user->name)->subject('SisConPat: Ativação da sua conta');
        #});

        #return redirect('users');
    #}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findUserById($id);
        
        return view('users.edit', compact('user'));
    }

    public function update(Requests\UserEditRequest $request, $id)
    {
        $input = $request->all();

        $input['name'] = strtoupper($input['name']);
        $input['email'] = strtolower($input['email']);

        $user = $this->userRepository->findUserById($id);
        $user->update($input);

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    }

    public function enable($id)
    {
        $user = $this->userRepository->enableUserById($id);

        $user = $this->userRepository->findUserById($id);

        event(new UserEnabledEvent($id));

        Session::flash('flash_message_success', 'Usuário ativado com sucesso ! Encaminhado e-mail para o usuário.');

        return redirect('/users');
    }

    public function disable($id)
    {
        $user = $this->userRepository->disableUserById($id);

        $user = $this->userRepository->findUserById($id);

        event(new UserDisabledEvent($id));

        Session::flash('flash_message_success', 'Usuário desativado com sucesso ! Encaminhado e-mail para o usuário.');

        return redirect('/users');
    }

    public function access_denied()
    {
        return view('users.access_denied');
    }
}