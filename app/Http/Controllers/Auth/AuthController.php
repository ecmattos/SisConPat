<?php

namespace SisConPat\Http\Controllers\Auth;

use SisConPat\Http\Requests;
use Validator;
use SisConPat\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use SisConPat\Http\Requests\Request;

use SisConPat\Repositories\UserRepository;
use SisConPat\User;

use SisConPat\Events\UserNewEvent;

use Auth;
use Session;

class AuthController extends Controller
{
    #protected $redirectPath = "/";

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';

    private $userRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function authenticate(Requests\AuthRequest $request)
    {
        $data = $request->all();

        #dd($data['_token']);

        if (Auth::attempt(['name' => $data['name'], 'password' => $data['password']])) 
        {
            if(Auth::User()->user_status_id == "1")
            {
                Auth::logout();
                return redirect('/')->withInput($request->only('user_status_id'))->withErrors(['name' => 'Sua conta encontra-se em ANALISE ! Favor aguardar notificacao.']);
            }

            if(Auth::User()->user_status_id == "2")
            {
                Auth::logout();
                return redirect('/')->withInput($request->only('user_status_id'))->withErrors(['name' => 'Conta encontra-se AGUARDANDO a sua confirmacao ! Favor verificar seus e-mails.']);
            }

            if(Auth::User()->user_status_id == "3")
            {
                return redirect()->intended($this->redirectPath());
            }
            
            if(Auth::User()->user_status_id == "4")
            {
                Auth::logout();
                return redirect('/')->withInput($request->only('user_status_id'))->withErrors(['name' => 'Sua conta está DESATIVADA !']);
            }
        }
        else
        {
            #dd(Auth::attempt(['name' => $data['name'], 'password' => $data['password']]));

            return redirect('/')->withInput()->withErrors(['error' => '<b>Autenticação CANCELADA</b> >> Não foi possível confirmar suas credenciais !']); 
        }
    }

    
    protected function validator(array $data)
    {
        $messages = 
        [
            'name.required' => '<b>Usuário</b> >> Preenchimento obrigatório.',
            'name.max' => '<b>Usuário</b> >> MÀXIMO 50 caracteres.',
            'name.unique' => '<b>Usuário</b> >> Indisponível.',
            'email.required' => '<b>E-mail</b> >> Preenchimento obrigatório.',
            'email.max' => '<b>E-mail</b> >> MÀXIMO 50 caracteres.',
            'email.unique' => '<b>E-mail</b> >> Indisponível.',
            'password.required' => '<b>Senha</b> >> Preenchimento obrigatório.',
            'password.min' => '<b>Senha</b> >> MÍNIMO 6 caracteres.',
            'password.confirmed' => '<b>Senhas</b> >> DEVEM ser iguais.'
        ];

        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ], $messages);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function postRegister(Requests\UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['user_status_id'] = 1;
        
        $user = $this->userRepository->storeUser($data);

        $user = $this->userRepository->lastUser();

        event(new UserNewEvent($user));

        Session::flash('flash_message_success', 'Parabéns, a sua conta foi cadastrada com sucesso ! Favor aguarde nossa notificacao quanto a ativação de sua conta.');

        return redirect('/');
    }
}
