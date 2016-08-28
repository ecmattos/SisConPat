<?php

namespace SisConPat\Listeners;

use SisConPat\Events\UserDisabledEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

use SisConPat\Repositories\UserRepository;

class UserDisabledEmailEventListener
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
    public function handle(UserDisabledEvent $event)
    {
        $user = $event->getUser();

        $user = $this->userRepository->findUserById($user);

        Mail::send('emails.users.disabled', ['user' => $user], function ($msg) use ($user)
        {
            $msg->from('contato.spmtec@gmail.com', 'CEASA: SisConPat - Contato');
            $msg->to($user->email, $user->name)->subject('SisConPat: Desativação de sua conta.');
        });
    }
}