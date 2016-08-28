<?php

namespace SisConPat\Listeners;

use SisConPat\Events\UserNewEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

use SisConPat\Repositories\UserRepository;

class UserNewEmailEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the event.
     *
     * @param  UserNewEvent  $event
     * @return void
     */
    public function handle(UserNewEvent $event)
    {
        $user = $event->getUser();

        Mail::send('emails.users.new_touser', ['user' => $user], function ($msg) use ($user)
        {
            $msg->from('contato.spmtec@gmail.com', 'CEASA: SisConPat - Contato');
            $msg->to($user->email, $user->name)->subject('SisConPat: Solicitacao de nova conta de usuário');
        });
    }
}
